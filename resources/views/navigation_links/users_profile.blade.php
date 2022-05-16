@extends('layouts.home')
@section('content')
    <div id="content">
        @include('layouts.includes.topnavbar')
        <div class="row no-margin-padding">
            <div class="col-md-12 d-flex flex-row justify-content-between">
                <h3 class="block-title">Manage Account</h3>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row mng-acc align-items-center d-flex">
                <!--PROFILE PICTURE-->
                <div class="chooseprofile col-md-4 m-2 justify-content-center">
                    <div class="text-center">
                        @if (Auth::User()->profile_image)
                            <img class="image rounded-circle admin_picture"
                                src="{{ asset('images/' . Auth::User()->profile_image) }}" alt="profile_image">
                        @endif
                        <h3 class="profile-username text-center admin_name" style="color: #2e2d2d">
                            {{ Auth::User()->fname }}
                        </h3>
                        @if (Auth::User()->hasRole('admin_admin'))
                            <p class="text-muted text-center">Admin</p>
                        @else
                            <p class="text-muted text-center">Others</p>
                        @endif
                        <input type="file" class="text-center center-block file-upload" name="admin_image" id="admin_image"
                            style="opacity: 0;height:1px;display:none">
                        <a href="javascript:void(0)" class="btn btn-block btn-changepic" id="change_picture_btn">Change
                            Avatar</a>
                    </div>
                </div>

                {{-- User Profile/Information --}}
                <div class="user-info col-md-8 m-2 text-center">
                    <ul class="nav nav-tabs justify-content-center" id="tab-next-prev" role="tablist">
                        <li class="nav-item col-md-6">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personal_info">Personal Information</a>
                        </li>
                        <li class="nav-item col-md-6">
                            <a class="nav-link" data-bs-toggle="tab" href="#account_info">Account Information</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        {{-- PERSONAL INFO --}}
                        <div class="tab-pane active" id="personal_info">
                            <form class="update-profile" action="{{ route('myprofile.update', '$user->id') }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="personal-info" style="background-color: white; padding:10px;">
                                    <div class="input-box">
                                        <input name="user_id" type="hidden" id="user_id" placeholder=""
                                            value="{{ $user->id }}">
                                    </div>

                                    <div class="row row-space">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="fname">First Name:</label>
                                            <input type="text" class="form-control @error('fname') is-invalid @enderror"
                                                name="fname" value="{{ $user->fname }}" disabled>
                                            <span class="text-danger">
                                                @error('firstname')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="lname">Last Name:</label>
                                            <input type="text" class="form-control @error('lname') is-invalid @enderror"
                                                name="lname" value="{{ $user->lname }}" disabled>
                                            <span class="text-danger">
                                                @error('lastname')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row row-space">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="address">Address:</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                                id="address" name="address" value="{{ $user->address }}" disabled>
                                            <span class="text-danger">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="contact">Contact Number:</label>
                                            <input type="text" class="form-control @error('contact') is-invalid @enderror"
                                                id="contact" name="contact" value="{{ $user->contact }}" disabled>
                                            <span class="text-danger">
                                                @error('contact')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row row-space">
                                        <div class="col-6">
                                            <label class="control-label" for="bdate">Birthdate:</label>
                                            <input type="date" class="form-control @error('bdate') is-invalid @enderror"
                                                id="bdate" name="bdate" value="{{ $user->bdate }}" disabled>
                                            <span class="text-danger">
                                                @error('birthdate')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group col-6">
                                            <label class="control-label" for="age">Age:</label>
                                            <input type="text" class="form-control @error('age') is-invalid @enderror"
                                                id="age" name="age" value="{{ $user->age }}" disabled>
                                            <span class="text-danger">
                                                @error('age')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="email">Email Address:</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="changeemail" name="email" value="{{ $user->email }}" disabled>
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="save" class="btn btn-primary m-2" style="display: none;">Save
                                        Changes</button>
                                </div>
                            </form>
                            <button class="btn btn-success m-2" style="width: 300px;" onclick="myFunction()"
                                id="edit">Edit</button>
                        </div>
                        <!--/PERSONAL INFO-->

                        {{-- ACCOUNT INFO --}}
                        <div class="tab-pane fade" id="account_info">
                            <form action="{{ route('profile.change.password') }}" method="post" class="needs-validation"
                                novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3  card">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <h4>Change Password</h4>
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group mt-3">
                                                            <label for="current_password">Old Password:</label>
                                                            <input type="password" name="current_password"
                                                                class="form-control @error('current_password') is-invalid @enderror"
                                                                required placeholder="Enter current password" disabled>
                                                            @error('current_password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group mt-3">
                                                            <label for="new_password ">New Password:</label>
                                                            <input type="password" name="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                required placeholder="Enter the new password" disabled>
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group mt-3">
                                                            <label for="confirm_password">Confirm Password:</label>
                                                            <input type="password" name="confirm_password"
                                                                class="form-control @error('confirm_password') is-invalid @enderror"
                                                                required placeholder="Enter same password" disabled>
                                                            @error('confirm_password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-first mt-4 ml-2">
                                                        <button type="submit" class="btn btn-danger" style="display: none"
                                                            id="formSubmit">Update</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-edit" onclick="myFunction1()" id="editacc">Edit</button>
                        </div>
                        <!--ACCOUNT INFO-->


                    </div>
                    <!---tab-content-->

                </div>
                <!--/user-info-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function myFunction() {
            $("form input[type=text],form input[type=email],form input[type=date]").prop("disabled", true);

            var x = document.getElementById("edit");
            var y = document.getElementById("save");

            if (x.innerHTML === "Edit") {
                x.innerHTML = "Cancel";
                $("form input[type=text],form input[type=email],form input[type=date]").removeAttr("disabled");
                y.style.display = "block";


            } else {
                x.innerHTML = "Edit";
                y.style.display = "none";
            }
        };

        function myFunction1() {
            $("form input[type=email], form input[type=password]").prop("disabled", true);

            var x = document.getElementById("editacc");
            var y = document.getElementById("formSubmit");

            if (x.innerHTML === "Edit") {
                x.innerHTML = "Cancel";
                $("form input[type=email], form input[type=password]").removeAttr("disabled");
                y.style.display = "block";
            } else {
                x.innerHTML = "Edit";
                y.style.display = "none";
            }
        };
    </script>
@endsection
