<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use DB;
use File;
use App\Application as Application;
use App\Job as Job;
use App\Profile as Profile;
use App\Comment as Comment;

class ApplicationController extends Controller
{
    public function view($id)
    {
        $application = Application::joinJobsAndApplicationsOnID($id);
        $profile = Profile::findProfile($application->user_id);
        $comments = Application::sqlComments($id);

        return view('applications.application') ->with('application', $application)
                                                ->with('profile', $profile)
                                                ->with('comments', $comments);
    }

    public function viewOwn()
    {
        $applications = Auth::user()->getApplications();

        //May need job info here as well?

        return view('applications.my-applications')->with('applications', $applications);
    }

    public function viewAll()
    {
        $appInfo = Application::joinJobsAndApplicationsAndProfiles();

                //Return this data to the jobs view
                return view('applications.index')->with(compact('appInfo', $appInfo));
    }

    public function create($id)
    {
        $job = Job::find($id);
        $profile = Auth::User()->profile;

        return view('applications.apply')->with('job', $job)
                                         ->with('profile', $profile);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $application = Application::create($input);
        $application->user_id = Auth::user()->id;

        if($request->hasFile('resume') && $request->file('resume')->isValid()) {
                $application->resume_filename = $request->file('resume')->getClientOriginalName();
                $md5 = md5(time());
                $application->resume_md5 = $md5;
                $request->file('resume')->move('uploads/resumes/', $md5);
        }

        if($request->hasFile('coverletter') && $request->file('coverletter')->isValid()) {
                $application->coverletter_filename = $request->file('coverletter')->getClientOriginalName();
                $md5 = md5(time());
                $application->coverletter_md5 = $md5;

                $request->file('coverletter')->move('uploads/coverletters/', $md5);
        }

        $application->save();

        $profile = Auth::User()->profile;
        $profile->update($input);
        $profile->save();

        return redirect('/my-applications');
    }

    public function approveOrDeny(Request $request, $id) {

            $user_flag = Auth::user()->flag;

                if($request->get('approve') && $user_flag == 3)
                        $this->approveApplicant($id);
                else if($request->get('deny') && $user_flag == 3)
                        return $this->denyApplicant($id);
                else if($request->get('dl_resume') && ($user_flag == 1 || $user_flag == 2 || $user_flag == 3))
                        return $this->downloadResume($id);
                else if($request->get('dl_coverletter') && ($user_flag == 1 || $user_flag == 2 || $user_flag == 3))
                        return $this->downloadCoverLetter($id);
                else if($request->get('post_comment') && ($user_flag == 1 || $user_flag == 2 || $user_flag == 3))
                        $this->postComment($request, $id);
                else if($request->get('edit_comment'))
                        $this->editComment($request, $id);

                return $this->view($id);
    }

    private function editComment($request, $id) {

            $input = $request->all();



    }

    private function postComment($request, $id) {

            //$comments = Application::find($id)->getComments();
            $input = $request->all();

            $comment = new Comment;
            $comment->application_id = $id;
            $comment->author_id = Auth::User()->id;
            $comment->body = $input['commentText'];

            $comment->save();
    }

    private function downloadResume($id) {

            $app = Application::find($id);

            $file = public_path().'/uploads/resumes/'.$app->resume_md5;

            return Response::download($file, $app->resume_filename);
    }

    private function downloadCoverLetter($id) {

            $app = Application::find($id);

            $file = public_path().'/uploads/coverletters/'.$app->coverletter_md5;

            return Response::download($file, $app->coverletter_filename);
    }

    private function approveApplicant($id) {

            $app = Application::find($id);
            $app->status = "Accepted";
            $app->save();

            //Email Applicant and tell him he got the job.
    }

    private function denyApplicant($id) {

            $app = Application::find($id);

            //Email Applicant tell him he doesnt have the job.

            //Delete his cover letter and resume
            File::delete(public_path().'/uploads/resumes/'.$app->resume_md5);
            File::delete(public_path().'/uploads/coverletter/'.$app->coverletter_md5);

            //Delete all respective comments.
            DB::table('comments')
                ->where('application_id', '=', $id)
                ->delete();

            //Delete the application finally.
            DB::table('applications')
                ->where('id', '=', $id)
                ->delete();


            return $this->viewAll();
    }
}
