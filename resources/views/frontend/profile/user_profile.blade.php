@extends('frontend.main_master')
@section('content')
	<div class="body-content">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<br>
					<img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%">

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
           						<h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{ Auth::user()->name }} Update Your Profile</strong></h3>
                      <div class="card-body">
                          <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Name <span></span></label>

                                <input type="text" for="" class="form-control unicase-form-control text-input" id="name" name="name" value="{{ $user->name }}" >

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Email <span></span></label>

                                <input type="email" for="email" class="form-control unicase-form-control text-input" id="email" name="email" value="{{ $user->email }}" >

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">User Image <span></span></label>

                                <input type="file" class="form-control unicase-form-control text-input" id="image" name="profile_photo_path" >

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>

                            </div>
                          </form>
                      </div>
           				</div> 
           		</div>
           	</div>
         </div>
    </div>

@endsection