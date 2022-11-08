@extends('admin.admin_master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div></div>
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Profile View</h2>
                            <div class="col-xl-12">
                                <div class="card"><br><br><br>
                                    <center>
                                                <img id="showImage" class="avatar avatar-lg" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="200" height="200">
                                    </center>

                                    <div class="card-body">
                                        <h4 class="card-title">Name : {{ $adminData->name }} </h4>
                                        <hr>
                                        <h4 class="card-title">User Email : {{ $adminData->email }} </h4>
                                        <hr>
                                        <h4 class="card-title">User Name : {{ $adminData->username }} </h4>
                                        <hr>
                                        <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light" > Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
