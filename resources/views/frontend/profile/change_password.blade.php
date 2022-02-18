@extends('frontend.main_master')
@section('content')
	<div class="body-content">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<br>
          <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty(Auth::user()->profile_photo_path))? url('upload/user_images/'. Auth::user()->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%">

					<ul class="list-group list-group-flush">
						<a href="{{ route('dashboard') }}" class="btn btn-primary btn-primary btn-sm btn-block">Home</a>
						<a href="{{ route('user.profile') }}" class="btn btn-primary btn-primary btn-sm btn-block">Profile Update</a>
						<a href="{{ route('change.password') }}" class="btn btn-primary btn-primary btn-sm btn-block">Change Password</a>
						<a href="{{ route('user.logout') }}" class="btn btn-danger btn-danger btn-sm btn-block">Logout</a>
					</ul>
           			
           		</div>
           		<div class="col-md-2">

           			
           		</div>
           		<div class="col-md-6">
           				<div class="card">
           						<h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{ Auth::user()->name }} Change Password</strong></h3>
                      <div class="card-body">

                          <form method="post" action="{{ route('user.password.update') }}">

                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Current Password <span></span></label>

                                <input type="password" for="" class="form-control unicase-form-control text-input" id="current_password" name="oldpassword" value="" >

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">New Password <span></span></label>

                                <input type="password" for="email" class="form-control unicase-form-control text-input" id="password" name="password" value="" >

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password Confirmation <span></span></label>

                                <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation" >

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update Password</button>

                            </div>
                          </form>
                      </div>
           				</div> 
           		</div>
           	</div>
         </div>
    </div>

@endsection