@extends('layouts.gs')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{route("home")}}" class="windows-button" style="">🏠</a>
                    &#10148; <a href="{{route("pics.index")}}">รูปภาพสินค้า</a> &#10148;
                    อัพโหลดรูป
                </div>
                <div class="card-body">
                    <div class="container">
                        <h2>Upload Pictures</h2>
                        <form id="imageUploadForm" action="{{ route('pics.store') }}" method="post" class="dropzone">
                            @csrf
                        </form>
                    </div>
                
                    <script>
                        Dropzone.options.imageUploadForm = {
                            paramName: "file", // Name of the uploaded file
                            maxFilesize: 20, // MB
                            acceptedFiles: "image/*", // Allow only images
                            addRemoveLinks: true, // Add a remove link for uploaded files
                            dictDefaultMessage: "Drop files here or click to upload",
                            init: function () {
                                this.on("success", function (file, response) {
                                    // Handle success, if needed
                                });
                                this.on("removedfile", function (file) {
                                    // Handle file removal, if needed
                                });
                            },
                        };
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('xtrajs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
@endsection