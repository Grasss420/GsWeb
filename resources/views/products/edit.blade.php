@extends('layouts.gs')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{route("home")}}" class="windows-button" style="">🏠</a>
                    &#10148; <a href="{{route("admin.menu")}}" class="windows-button" style="">จัดการเมนูสินค้า</a> &#10148;
                    @if ($editing)
                        แก้ไขรายการสินค้า: <a href="{{route("products.show",$editing->id)}}" target="_blank" rel="noopener noreferrer" title="แสดงตัวอย่าง">{{$editing->name}}</a>
                    @else
                        เพิ่มเมนูใหม่
                    @endif
                    </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
@if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin-bottom:0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('updated'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    บันทึกการแก้ไขข้อมูลสำเร็จ ดูตัวอย่างสินค้าบนหน้าเว็บ<b><a href="{{route("products.show",$editing)}}" target="_blank" rel="noopener noreferrer">ที่นี่</a></b>
</div>
@endif
                    <form class="form" action="{{route("products.store")}}" method="POST" id="frmProductEdit">
                        @csrf
                        @if ($editing)
                            <input type="hidden" name="editing_id" value="{{$editing->id}}">
                        @endif
                        <div class="form-group">
                            <label for="inputname">ชื่อสินค้า</label>
                            <input type="text" name="name" id="inputname" class="form-control" placeholder="" required @if ($editing) value="{{$editing->name}}" @endif>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputinternal_sku">รหัสสต๊อค</label>
                            <input type="text" name="internal_sku" id="inputinternal_sku" class="form-control" required @if ($editing) value="{{$editing->internal_sku}}" @endif>
                        </div>
                        <div class="form-group">
                            
                            <legend class="col-form-label col-sm-2 pt-0">หมวดสินค้า</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kind" id="inputKind1" value="sativa" @if ($editing && $editing->kind=="sativa") checked @endif> 
                                    <label class="form-check-label" for="inputKind1">
                                        Sativa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kind" id="inputKind2" value="sativahybrid" @if ($editing && $editing->kind=="sativahybrid") checked @endif>
                                    <label class="form-check-label" for="inputKind2">
                                        H.Sativa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kind" id="inputKind3" value="hybrid" @if ($editing && $editing->kind=="hybrid") checked @endif>
                                    <label class="form-check-label" for="inputKind3">
                                        Hybrid
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kind" id="inputKind4" value="indicahybrid" @if ($editing && $editing->kind=="indicahybrid") checked @endif>
                                    <label class="form-check-label" for="inputKind4">
                                        H.Indica
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kind" id="inputKind5" value="indica" @if ($editing && $editing->kind=="indica") checked @endif>
                                    <label class="form-check-label" for="inputKind5">
                                        Indica
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kind" id="inputKind6" value=""@if ($editing && $editing->kind=="") checked @endif> 
                                    <label class="form-check-label" for="inputKind6">
                                        Accessories
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="grade">สถานะสินค้า</label>
                            <select class="form-control" name="status" id="status">
                                <option value="in stock" @if ($editing && $editing->status=='in stock') selected @endif>มีสินค้า</option>
                                <option value="out of stock" @if ($editing && $editing->status=='out of stock') selected @endif>สินค้าหมด</option>
                                <option value="hidden" @if ($editing && $editing->status=="hidden") selected @endif>ซ่อน</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price_per_gram">ราคา/กรัม</label>
                            <input type="number" step="any" class="form-control" name="price_per_gram" id="price_per_gram" aria-describedby="ppgHelp" placeholder="0.00" required @if ($editing) value="{{$editing->price_per_gram}}" @endif>
                            <small id="ppgHelp" class="form-text text-muted">ราคาสินค้าต่อกรัม</small>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">Featured</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="feature_flag" id="feature_flag" value="1" @if ($editing && $editing->feature_flag) checked @endif>
                                    <label class="form-check-label" for="feature_flag">
                                        เมนูแนะนำ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputdescription">คำอธิบายสินค้า</label>
                            <textarea name="description" id="inputdescription" class="form-control" placeholder="">@if ($editing){!! $editing->description !!}@endif</textarea>
                        
                        </div>
                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <select class="form-control" name="grade" id="grade">
                                <option value="0" @if ($editing && $editing->grade==0) selected @endif>(ไม่ระบุ)</option>
                                <option value="1" @if ($editing && $editing->grade==1) selected @endif>★</option>
                                <option value="2" @if ($editing && $editing->grade==2) selected @endif>★★</option>
                                <option value="3" @if ($editing && $editing->grade==3) selected @endif>★★★</option>
                                <option value="4" @if ($editing && $editing->grade==4) selected @endif>★★★★</option>
                                <option value="5" @if ($editing && $editing->grade==5) selected @endif>★★★★★</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputwiki_link">Wiki Link</label>
                            <input type="text" name="wiki_link" id="inputwiki_link" class="form-control" @if ($editing) value="{{$editing->wiki_link}}" @endif>
                        </div>
                        
                    </form>
                    
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary" type="submit" form="frmProductEdit">บันทึกข้อมูล</button>
                            @if ($editing)
                            <form action="{{ route('products.destroy', $editing->id) }}" method="post" style="float: right">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Remove Item</button>
                                </form>
                            
                            @endif
                        </div>
                    </div>
                </div>
            <div class="col-md-4">
                <div class="d-block d-sm-none">
                    <hr>
                </div>
                <p class="lead">รูปภาพสินค้า</p>
                    
                @if ($editing)
                
                    <button type="button" class="btn btn-outline-success btn-lg" data-toggle="modal" data-target="#picSrektor">เลือกรูปภาพสินค้า
                    </button>
                @endif
                <div class="product-pics row" id="product-pics">
                    @if ($editing)
                        
                        @empty($editing->product_images)
                            <div class="col text-center bg-light" style="background-image:url('{{url(asset("img/gs_defaultimg.png"))}}')">(ยังไม่ได้เลือกรูปภาพสินค้า)</div>
                        @else
                            @php
                                $pico = 0;
                                $pics = [];
                                $i = 0;
                            @endphp
                            @foreach ($editing->product_images as $imgid) @php
                                
                                    $pic = \Grassstation\Models\ProductPic::find($imgid);
                                    if(!$pic){
                                        continue;
                                    }
                                    $pics[$i] = $pic;
                                @endphp
                                <div class="col img-preview" style="background-image:url('{{url($pic->getURL())}}')" data-picid="{{$imgid}}">{!!$pic->description ?? "&nbsp;"!!}</div>
@php                             //ending loop
                                $i++;
                            @endphp @endforeach
                        @endempty
                    @else
                        <div class="col text-center" style="">สามารถเพิ่มรูปภาพสินค้าได้หลังจากบันทึกข้อมูล</div>
                    @endif

                </div>
            </div>
                </div>{{-- end R1 --}}
            </div>{{-- end card body --}}
        </div>{{-- end card --}}
    </div>
    </div>
</div>{{-- end container --}}


@if ($editing)<!-- ProductPic Modal -->
<div class="modal fade" id="picSrektor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เลือกรูปภาพสินค้า</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                @php
                    $images = \Grassstation\Models\ProductPic::qdfs()->get();
                    $posto = route("products.picup",$editing->id);
                @endphp
                @include('components.picview')
            </div>
            <div class="modal-footer justify-content-between">
                <a target="_blank" class="btn btn-success" href="{{route('pics.create')}}" role="button">อัพโหลดรูปภาพ</a>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>@endif

@endsection

@section('xtrajs')
<script src="https://cdn.tiny.cloud/1/3xtdjxah84em87lw4yrej8bfe8yxqsefopa5q7zj4d7bxw3l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    tinymce.init({
        selector: 'textarea#inputdescription',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount fullscreen',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        advcode_inline: true,
        relative_urls : false,
        remove_script_host : false,
        convert_urls: false
    });
$(document).ready(function () {    
        @if ($editing)
        $( "#product-pics" ).sortable({
        placeholder: "ui-state-highlight col"
        });
        $( "#product-pics" ).disableSelection();
        $(".cmdSetFeatured").click(function (e) { 
            e.preventDefault();
            let mep = $(this).parent();
            $('#picUpdateAction').val("set-featured");
            return (mep.find('button[type=submit]').click());
        });

        @endif
});
</script>
@endsection
@section('xtracss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/start/jquery-ui.min.css" integrity="sha512-Zp3fEbj711NjejZCGEBTw9hHzXmqINMeFJU4N0dPvroJAOkvR4+I27B/oarJ9EFkntX1XMeVYZ+VmSA6NcN7fA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection