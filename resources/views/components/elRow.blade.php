<tr class="{{$product->featFlagClass()}}">
    <td scope="row" style="background: url('{{$product->firstImage()}}'); background-size:cover;width:24px;color:transparent;"><span class="sr-only">{{$i++}}</span></td>
    <td><a href="{{$product->getURL()}}" class="product-name">{{$product->name}} {!! $product->feature_flag ? '<span>⭐</span>' : "" !!}</a></td>
    <td class="text-right">{!! $product->dispKind(true) !!}</td>
    <td class="text-right">{{$product->displayPrice()}}</td>
</tr>