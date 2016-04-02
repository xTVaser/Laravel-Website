<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use DB;
use File;
use Mail;
use App\Application as Application;
use App\Job as Job;
use App\Profile as Profile;
use App\Comment as Comment;

//Handles all tasks related to creating or maintaining applications.
class ApplicationController extends Controller
{
    //View a specific application
    public function view($id)
    {
        //Get the joined job table, the profile for the applicant, and the comments for the page.
        $application = Application::joinJobsAndApplicationsOnID($id);
        $profile = Profile::findProfile($application->user_id);
        $comments = Application::sqlComments($id);

        //Return the page with those variables to be used on the page.
        return view('applications.application') ->with('application', $application)
                                                ->with('profile', $profile)
                                                ->with('comments', $comments)
                                                ->with('currentUser', Auth::User()->id);
    }

    //For the applicant to view their own applications
    public function viewOwn()
    {
        //Get the joined job and application table and the users profile.
        $applications = Application::joinJobsAndApplicationsOnUserID(Auth::User()->id);
        $profile = Auth::User()->profile;

        //Return the view with those variables.
        return view('applications.my-applications') ->with('applications', $applications)
                                                    ->with('profile', $profile);
    }

    //To view all of the current applications.
    public function viewAll()
    {
        //Get the joined job and application table.
        $appInfo = Application::joinJobsAndApplicationsAndProfiles();

        //Return this data to the jobs view
        return view('applications.index')->with(compact('appInfo', $appInfo));
    }

    //Used to apply for a specific job.
    public function create($id)
    {
        //Find the job and the user profile.
        $job = Job::find($id);
        $profile = Auth::User()->profile;

        //Return this data to the view.
        return view('applications.apply')->with('job', $job)
                                         ->with('profile', $profile);
    }

    //Used to process and submit a new application.
    public function store(Request $request)
    {
        //Validation on the form
        $this->validate($request, [
            'job_id' => 'required',
            'resume_filename' => 'required',
            'coverletter_filename' => 'required'
        ]);

        //Get all of hte form input
        $input = $request->all();
        //Create a new application and set it's foreign key right away.
        $application = Application::create($input);
        $application->user_id = Auth::user()->id;

        //Don't allow huge resumes
        if($request->hasFile('resume') && $request->file('resume')->getMaxFilesize() < 5242880)
            return redirect('home');

        if($request->hasFile('coverletter') && $request->file('coverletter')->getMaxFilesize() < 5242880)
            return redirect('home');


        //Get the resume
        if ($request->hasFile('resume') && $request->file('resume')->isValid()) {

            $application->resume_filename = $request->file('resume')->getClientOriginalName();
            $md5 = md5(time());
            $application->resume_md5 = $md5;
            $request->file('resume')->move('uploads/resumes/', $md5);
        }

        //Get the cover letter
        if ($request->hasFile('coverletter') && $request->file('coverletter')->isValid()) {
            $application->coverletter_filename = $request->file('coverletter')->getClientOriginalName();
            $md5 = md5(time());
            $application->coverletter_md5 = $md5;

            $request->file('coverletter')->move('uploads/coverletters/', $md5);
        }

        //Save the application and update the user's profile on whatever input.
        $application->save();
        $profile = Auth::User()->profile;
        $profile->update($input);
        $profile->save();

        //Redirect to the personal application listing page.
        return redirect('/my-applications');
    }

    //Main function to handle all input on the individual application page.
    public function approveOrDeny(Request $request, $id)
    {
        //Find out the users permissions.
        $user_flag = Auth::user()->flag;

        if ($request->get('approve') && $user_flag == 3) {
            $this->approveApplicant($id);
        } elseif ($request->get('deny') && $user_flag == 3) {
            return $this->denyApplicant($id);
        } elseif ($request->get('dl_resume') && ($user_flag == 1 || $user_flag == 2 || $user_flag == 3)) {
            return $this->downloadResume($id);
        } elseif ($request->get('dl_coverletter') && ($user_flag == 1 || $user_flag == 2 || $user_flag == 3)) {
            return $this->downloadCoverLetter($id);
        } elseif ($request->get('post_comment') && ($user_flag == 1 || $user_flag == 2 || $user_flag == 3)) {
            $this->postComment($request, $id);
        } elseif ($request->get('edit_comment') && ($user_flag == 1 || $user_flag == 2 || $user_flag == 3)) {
            $this->editComment($request->all());
        } elseif ($request->get('reply_comment') && ($user_flag == 1 || $user_flag == 2 || $user_flag == 3)) {
            $this->replyComment($request->all(), $id);
        }

        //If we have not redirected to a different page, then refresh the application listing.
        return $this->view($id);
    }

    //Allows for comments to be replied to.
    private function replyComment($input, $app_id)
    {
        //Get the authors comment, as well as the authors profile.
        $author_comment = Comment::find($input['comment_id']);
        $author_profile = Profile::findProfile($author_comment['author_id']);

        //Make a new comment, and start it off with a heading
        $comment = new Comment();
        $comment->application_id = $app_id;
        $comment->author_id = Auth::User()->id;
        $comment->body = $comment->body = 'In response to '.$author_profile->first_name.' '.$author_profile->last_name."'s Comment: ".$input['commentBody'];

        //Save it
        $comment->save();
    }

    //Edits an existing comment
    private function editComment($input)
    {
        $comment = Comment::find($input['comment_id']);
        $comment->body = $input['commentBody'];
        $comment->update();
    }

    //Creates a new comment and saves it to the database
    private function postComment($request, $id)
    {
        $input = $request->all();

        $comment = new Comment();
        $comment->application_id = $id;
        $comment->author_id = Auth::User()->id;
        $comment->body = $input['commentText'];

        $comment->save();
    }

    private function downloadResume($id)
    {
        //Find the file via it's md5.
        $app = Application::find($id);
        $file = public_path().'/uploads/resumes/'.$app->resume_md5;
        return Response::download($file, $app->resume_filename);
    }

    private function downloadCoverLetter($id)
    {
        //Find the file via it's md5
        $app = Application::find($id);
        $file = public_path().'/uploads/coverletters/'.$app->coverletter_md5;
        return Response::download($file, $app->coverletter_filename);
    }

    private function approveApplicant($id)
    {
        //Mark the application as accepted
        $app = Application::find($id);
        $app->status = 'Accepted';
        $app->save();

        $profile = Profile::findProfile($app->user_id);

            //Email Applicant and tell him he got the job.
            Mail::send('emails.grats', ['profile' => $profile], function ($message) use ($profile) {
            $message->from('chair@algomau.ca', 'Hiring Chair');
            $message->to($profile->contact_email);
            $message->subject('Applcation Approved');
        });
    }

    private function denyApplicant($id)
    {
        //Find the application and user profile to email them.
        $app = Application::find($id);
        $profile = Profile::findProfile($app->user_id);

            //Email Applicant and tell him he got the job.
            Mail::send('emails.rekt', ['profile' => $profile], function ($message) use ($profile) {
            $message->from('chair@algomau.ca', 'Hiring Chair');
            $message->to($profile->contact_email);
            $message->subject('Application Denial');
        });

        //Delete his cover letter and resume
        File::delete(public_path().'/uploads/resumes/'.$app->resume_md5);
        File::delete(public_path().'/uploads/coverletters/'.$app->coverletter_md5);

        //Delete all respective comments.
        DB::table('comments')
            ->where('application_id', '=', $id)
            ->delete();

        //Delete the application finally.
        DB::table('applications')
            ->where('id', '=', $id)
            ->delete();

        //Redirect to the application listing page.
        return $this->viewAll();
    }
}
