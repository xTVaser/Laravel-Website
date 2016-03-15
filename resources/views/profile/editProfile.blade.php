@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <div class="panel-body">

                        <form class="form-horizontal">
                        <fieldset>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="firstName">First Name</label>
                          <div class="col-md-4">
                          <input id="firstName" name="firstName" placeholder="John" class="form-control input-md" type="text">
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="middleName">Middle Name</label>
                          <div class="col-md-4">
                          <input id="middleName" name="middleName" placeholder="M." class="form-control input-md" type="text">
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="lastName">Last Name</label>
                          <div class="col-md-4">
                          <input id="lastName" name="lastName" placeholder="Smith" class="form-control input-md" type="text">
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="contactEmail">Contact Email</label>
                          <div class="col-md-4">
                          <input id="contactEmail" name="contactEmail" placeholder="jsmith@algomau.ca" class="form-control input-md" type="text">
                          </div>
                        </div>

                        <!-- Appended Input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="linkedin">LinkedIn Profile</label>
                          <div class="col-md-4">
                            <div class="input-group">
                              <input id="linkedin" name="linkedin" class="form-control" placeholder="jsmith" type="text">
                              <span class="input-group-addon"><i class="fa fa-linkedin"></i>
                        </span>
                            </div>
                          </div>
                        </div>
                        <!-- Textarea -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="description">Description</label>
                          <div class="col-md-4">
                            <textarea class="form-control" id="description" name="description"></textarea>
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="jobTitle">Job Title</label>
                          <div class="col-md-4">
                          <input id="jobTitle" name="jobTitle" placeholder="Associate Professor" class="form-control input-md" type="text">
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="company">Company</label>
                          <div class="col-md-4">
                          <input id="company" name="company" placeholder="Algoma University" class="form-control input-md" type="text">
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="department">Department</label>
                          <div class="col-md-4">
                          <input id="department" name="department" placeholder="Computer Science" class="form-control input-md" type="text">
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="birthdate">Birthdate</label>
                          <div class="col-md-4">
                          <input id="birthdate" name="birthdate" placeholder="Replace this!" class="form-control input-md" type="text">
                          </div>
                        </div>

                        <!-- Multiple Radios (inline) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="gender">Gender</label>
                          <div class="col-md-4">
                            <label class="radio-inline" for="gender-0">
                              <input name="gender" id="gender-0" value="male" checked="checked" type="radio">
                              Male
                            </label>
                            <label class="radio-inline" for="gender-1">
                              <input name="gender" id="gender-1" value="female" type="radio">
                              Female
                            </label>
                            <label class="radio-inline" for="gender-2">
                              <input name="gender" id="gender-2" value="other" type="radio">
                              Other
                            </label>
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-floppy-o"></i>Save Changes
                                </button>
                            </div>
                        </div>

                        </fieldset>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
