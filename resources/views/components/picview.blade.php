<div class="card-body menu-category">
    <div class="">
        <form action="{{route('products.picup',$editing->id)}}" method="post" id="frmPicUpdate">
            @csrf

            <input type="hidden" name="action" value="add-image" id="picUpdateAction">
        <div class="fg row">
        @foreach ($images as $i => $img)
        <div class="card border-light">
            <div class="card-img-top" style="background-image:url('{{url($img->getURL())}}')">&nbsp;</div>
            <div class="card-body">
                {{$img->description}}
                @if ($editing->hasImage($img->id))
                <div class="btn-group btn-block">{{$i}}
                    <button type="button" class="btn btn-warning cmdSetFeatured{{0 == array_search($img->id,$editing->product_images) ? " active":""}}" title="Set Featured" {{$editing->imagesCount() > 1 ? "" : "disabled"}}>⭐ <span class="sr-only">ตั้งเป็นรูปปกสินค้า</span></button>
                    <button class="btn btn-danger" type="submit" name="value" value="{{$img->id}}" >❌ ยกเลิกแสดงรูปภาพนี้</button>
                </div>@else
                    <button class="btn btn-success btn-block" type="submit" name="value" value="{{$img->id}}">✔ เลือกรูปภาพนี้</button>
                @endif
            </div>
        </div>
        {{-- <div class="col">
            <label class="picview-chx list-group-item list-group-item-action form-check-label" for="cx-{{$img->id}}" style="background-image:url('{{url($img->getURL())}}')">
                &nbsp;
                products.picup
            </label>
        </div> --}}
        @endforeach
        </div>
        </form>
    </div>
</div>