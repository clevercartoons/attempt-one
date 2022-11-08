@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">

                    <div></div>
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Profile Edit</h2>

                        <div class="row match-height">
                                <div class="card"><br><br><br>

                                    <div class="card-body">
                                        <div class="row">
                                                <div class="col-12">
                                                    <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                                        @csrf
                                                            <center>
                                                                <img id="showImage" class="avatar avatar-lg" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="200" height="200">
                                                            </center><br>
                                                        <p>
                                                            <code>Hey {{ Auth::user()->name }}, This is the current information that is currently available about your profile:</code>
                                                        </p>
                                                        <div class="form-group">
                                                            <label for="defaultInput">Your Name:</label>
                                                            <br>
                                                            <input name="name" class="form-control" type="text" value="{{ $editData->name }}"  id="example-text-input">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="defaultInput">Your Email:</label>
                                                            <input name="email" class="form-control" type="text" value="{{ $editData->email }}"  id="example-text-input">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="defaultInput">Your Username:</label>
                                                            <input name="username" class="form-control" type="text" value="{{ $editData->username }}"  id="example-text-input">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="defaultInput">Your Profile Image:</label>
                                                            <input name="profile_image" class="form-control" type="file"  id="image">
                                                        </div>
                                                        <center>
                                                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                                                        </center>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>

        </div>
    </div>
</div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
