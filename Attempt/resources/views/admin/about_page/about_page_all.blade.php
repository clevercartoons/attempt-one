@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="app-content content ">

    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">About Us Page</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data" class="form form-horizontal">
                    @csrf

                    <input type="hidden" name="id" value="{{ $aboutpage->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="fname-icon">Title: </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                        </path><circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="text" id="example-text-input" class="form-control" name="title" value="{{ $aboutpage->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="fname-icon">Short Title: </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                        </path><circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="text" id="example-text-input" class="form-control" name="short_title" value="{{ $aboutpage->short_title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="fname-icon">Short Description: </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                        </path><circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                        <textarea required="" name="short_description"  class="form-control" rows="5">
                                            {{ $aboutpage->short_description }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="fname-icon">Long Description: </label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                        </path><circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </span>
                                        </div>
                                        <textarea id="elm1" name="long_description" class="form-control" rows="8">
                                            {{ $aboutpage->long_description }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="fname-icon">About Us Image:</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <div class="form-group">
                                            <label for="customFile">Browse</label>
                                            <div class="custom-file">
                                                <input name="about_image" type="file" class="custom-file-input" id="image">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <br><br><br>
                                            </div>
                                            <div class="avatar avatar-xl">
                                            <br> <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($aboutpage->about_image))? url( $aboutpage->about_image):url('upload/no_image.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light" value="Upload Slides">Update About Page</button>

                        </div>
                    </div>
                </form>
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
