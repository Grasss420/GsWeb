@extends('layouts.gs')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{route("home")}}" class="windows-button" style="">🏠</a>
                    &#10148; รูปภาพสินค้า
                </div>

                <div class="card-body">
                    
                    <div class="row">
                        <div class="col text-right">
                            <a href="{{route("pics.create")}}" class="btn btn-primary">Upload File</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                            <table class="table" id="piclist-table">
                                <thead>
                                    <tr>
                                        <th>รหัส</th>
                                        <th>ลิงก์</th>
                                        <th>คำอธิบาย</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
    {{--    $table->bigIncrements('id');
            $table->text('url');
            $table->text('description')->nullable(); --}}
                                    @foreach (\Grassstation\Models\ProductPic::orderByDesc("id")->get() as $pp)
                                    <tr>
                                        <td class="picview-preview" style="background-image:url('{{url($pp->getURL())}}')">{{$pp->id}}</td>
                                        <td><a href="{{$pp->getURL()}}" target="_blank">{{$pp->url}}</a></td>
                                        <td>{{$pp->description}}</td>
                                        <td>
                                            <button type="button" class="btn cmdEdit" data-remote="{{route('pics.edit',$pp->id)}}" data-remoteX="{{route('pics.destroy',$pp->id)}}">Edit</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modelEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แก้ไขรูปภาพ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">

                <form id="frmPicEdit" action="{{route('pics.modify')}}" class="form col-sm-9" method="post">
                @csrf
                <input type="hidden" name="editing_id" id="editing_id">
                <div class="container">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-1-12 col-form-label">URL</label>
                            <div class="col-sm-1-12">
                                <input type="text" class="form-control viewswitcher" name="url" id="inputUrl" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-1-12 col-form-label">Description</label>
                            <div class="col-sm-1-12">
                                <input type="text" class="form-control viewswitcher" name="description" id="inputDescr" placeholder="">
                            </div>
                        </div>
                </div>
                </form>
                <div class="col-sm-3">
                    
                    <img src="#" class="img-fluid" alt="Image Preview" id="img-preview">
                    <form action="#" id="frmImgDelete" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-block btn-sm btn-danger">Delete</button>
                    </form>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button form="frmPicEdit" type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('xtrajs')
<script>
    $(document).ready(function () {
        $(".cmdEdit").click(cmdedit);
        $("#frmImgDelete").submit(function (e) { 
            v =confirm("Do you sure you want to Delete this Image?");
            if(!v){e.preventDefault();}
            
        });
    });
    function cmdedit(n){
        let me = $(this);
        $.get(me.data("remote"),
            function (data, textStatus, jqXHR) {
                $("#inputUrl").val(data.url);
                $("#editing_id").val(data.id);
                $("#inputDescr").val(data.description);
                $('#modelEdit').modal("show");
                $("#img-preview").attr("src", data.url2);
                $("#frmImgDelete").attr("action",data.del);
            }
        );
    }
    
    </script>
@endsection