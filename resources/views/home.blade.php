@extends('layouts.gs')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Website Control Panel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="row">
                        <div class="col">
                            <div class="">
                                <a href="{{route('admin.menu')}}" class="btn btn-primary"><img src="{{asset('img/win95/icons/world_network_directories-1.png')}}" class="icon-16"> แก้ไขรายการสินค้า</a>
                                <a href="{{route('admin.article')}}" class="btn btn-default"><img src="{{asset('img/win95/icons/xml-1.png')}}" class="icon-16"> แก้ไขบทความ</a>
                                <a href="{{route('pics.index')}}" class="btn btn-default"><img src="{{asset('img/win95/icons/directory_net_web-1.png')}}" class="icon-16"> รูปภาพสินค้า</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            ระบบงานร้านค้า
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
