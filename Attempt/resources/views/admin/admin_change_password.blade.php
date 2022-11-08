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
                            <h2 class="content-header-title float-left mb-0">Change Password</h2>

                            <div class="row match-height">
                                    <div class="card"><br><br><br>

                                        <div class="card-body">
                                            <div class="row">
                                                    <div class="col-12">
                                                        <form method="post" action="{{ route('update.password') }}" enctype="multipart/form-data">
                                                            @csrf

                                                            <p>
                                                                <code>Hey {{ Auth::user()->name }}, This is where  you may update your password details rom:</code>
                                                            </p>
                                                            <div class="form-group">
                                                                <label for="defaultInput">Enter old password:</label>:</label>
                                                                <br>
                                                                <input name="oldpassword" class="form-control" type="pasword" id="oldpassword">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="defaultInput">Enter new password:</label>:</label>
                                                                <input name="newpassword" class="form-control" type="password" id="newpassword">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="defaultInput">Confirm new password:</label>
                                                                <input name="confirm_password" class="form-control" type="password" id="confirm_password">
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
