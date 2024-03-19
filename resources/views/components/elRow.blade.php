<tr>
    <td scope="row" style="background: url('{{$product->firstImage()}}'); background-size:cover">{{$i++}}</td>
    <td><a href="{{$product->getURL()}}">{{$product->name}} {!! $product->dispKind(true) !!}{!! $product->feature_flag ? '<span>⭐</span>' : "" !!}</a></td>
    <td class="text-right">{{$product->displayPrice()}}</td>
</tr>