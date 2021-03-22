<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $page }}</title>
</head>

<body>
    @foreach($order->items  as $i )
    <div style="border: 2px solid black; margin-top:20px;">
        <table width="100%" border="0" cellspacing="0">
            <tbody>
                <tr class="trigger-label-barcode-po-v2">
                    <td class="py bb-1" colspan="2" style="padding: 20px;">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div>
                                        <strong>
                                            @if($opsi['no_po'] ?? '') 
                                                <span class="trigger-label-po-v2" id="nopo" style="font-size: 14px;">#{{ $order->id }}</span>
                                            @endif 
                                        </strong>
                                    </div>
                                    <div>
                                        @if($opsi['date_po'] ?? '') 
                                            <strong class="trigger-label-date-order-v2" id="po_date">{{ substr($order->created_at,0,10) }}</strong>
                                        @endif 
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </td>
                    <td   style="margin: 0;vertical-align: top;">
                        @if($opsi['logo'] ?? '') 
                        <img style="height:60px; margin-top:20px;"   id="logo"  src="{{ asset('img/logo.png') }}">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border-bottom: 1px solid black; margin-top:10px;"><br></td>
                </tr>
                <tr >
                    <td   style="margin: 0; padding: 20px; border-bottom:1px solid black"  >
                        @if($opsi['pengirim'] ?? '') 
                        <strong id="pengirim">FROM: {{ $order->user->name ?? ''}}  </strong>
                        @endif 
                    </td>

                    <td   style="margin: 0; padding: 20px; border-bottom:1px solid black" >
                        
                    </td>

                    <td class="bb-1 exp trigger-label-exp-v2"  style="margin: 0; padding: 20px;  border-left:1px solid black; border-bottom:1px solid black"> 
                        @if($opsi['kurir'] ?? '') 
                        <strong id="kurir">{{ $order->courier->name ?? '' }} | <b class="" id="">{{ $order->courier_type }}</b></strong>
                        @endif 
                        @if($opsi['ongkir'] ?? '') 
                        <strong class="trigger-label-exp-nominal-v2 " id="ongkir"> -  {{ $order->shipping_cost }}</strong> 
                        @endif  
                    </td> 
                </tr>
               
                <tr >
                    <td class="py bb-1 to"  style="margin: 0; padding: 20px;">
                        <strong>TO:</strong>
                    </td>
                    <td class="py bb-1" colspan="2"  style="margin: 0; padding: 20px;">
                        @if($opsi['penerima'] ?? '') 
                        <span class="ls-1"><strong id="penerima">{{ $order->customer->name ?? '' }}</strong></span> <br>
                        @endif 
                        @if($opsi['alamat'] ?? '') 
                        <p id="alamat">{{$order->customer->user->address ?? ''}}
                        @endif
                        @if($opsi['phone'] ?? '') 
                        <p id="" class="" style="margin-top:-10px; "><b>No Phone:</b>   ({{ $order->customer->user->phone_code->phone_code ?? '' }}) {{ $order->customer->user->phone ?? '' }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border-bottom: 1px solid black; margin-top:10px;"><br></td>
                </tr>
                <tr class="trigger-label-order-detail-v2">
                    <td class="py" colspan="3" style="margin: 0; padding: 20px;">
                        <p class="trigger-label-barcode-po-v2">
                            <strong>DETAIL ORDER</strong>
                        </p>
                        <ul class="product-list trigger-label-product-list-v2 m-0" id="product">
                            @if($opsi['product'] ?? '') 
                            <li class="d-flex flex-wrap justify-content-between" >
                                <div>
                                    {{$i->product->name ?? ''}} -  {{ $i->sku->properties['size'] ?? '' }}, {{ $i->sku->properties['color'] ?? '' }}, {{ $i->sku->properties['material'] ?? '' }} | {{ $i->sku->code ?? '' }}
                                </div>
                            </li>
                        @endif
                        </ul>
                        <div class="d-flex justify-content-between trigger-label-total-item-v2 mt-3 ">
                            <strong>TOTAL ITEM</strong>
                            <strong>{{ $i->qty }} </strong>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border-bottom: 1px solid black;  "><br></td>
                </tr>

                <tr class="trigger-label-note-v2">
                    <td class="py" colspan="3" style="margin: 0; padding: 20px;">
                        <p class="p-0"><strong>NOTE: </strong>{{$order->customer_note}}</p>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    @endforeach
</body>

</html>
