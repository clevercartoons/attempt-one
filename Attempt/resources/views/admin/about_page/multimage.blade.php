@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="app-content content ">

    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Multiple Images</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('store.multi.image') }}" enctype="multipart/form-data" class="form form-horizontal">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="fname-icon">Multiple Images:</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <div class="form-group">
                                            <label for="customFile">Browse</label>
                                            <div class="custom-file">
                                                <input name="multi_image[]" type="file" class="custom-file-input" id="image" multiple="">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <br><br><br>
                                            </div>
                                            <div class="avatar avatar-xl">
                                            <br> <img id="showImage" class="rounded avatar-lg" src="{{url('upload/no_image.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light" value="Upload Slides">Add Images</button>

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
