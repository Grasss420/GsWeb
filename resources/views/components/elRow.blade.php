<tr class="{{$product->feature_flag ? 'warning' : ''}}">
    <td scope="row" style="background: url('{{$product->firstImage()}}'); background-size:cover"><span class="sr-only">{{$i++}}</span></td>
    <td><a href="{{$product->getURL()}}">{{$product->name}} {!! $product->dispKind(true) !!}{!! $product->feature_flag ? '<span>⭐</span>' : "" !!}</a></td>
    <td class="text-right">{{$product->displayPrice()}}</td>
</tr>