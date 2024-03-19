<tr>
    <td scope="row" style="background: url('{{$product->firstImage()}}'); background-size:cover">{{$i++}}</td>
    <td>{{$product->name}} {!! $product->dispKind(true) !!} {!! $product->feature_flag ? '<span>⭐</span>' : "" !!}</td>
                                        
    <td class="text-right">{{$product->displayPrice()}}</td>
</tr>