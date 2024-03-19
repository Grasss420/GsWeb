<tr>
    <td scope="row">{{$i++}}</td>
    <td>{{$product->name}} {!! $product->dispKind(true) !!} {!! $product->feature_flag ? '<span>⭐</span>' : "" !!}</td>
                                        
    <td class="text-right">{{$product->displayPrice()}}</td>
</tr>