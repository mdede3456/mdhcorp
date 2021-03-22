<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $page }}</title>
</head>

<body>
    @foreach($order->items  as $i )
    <div style="border: 2px solid black; margin-top:20px;" >
        <table width="100%" border="0" cellspacing="0" font-size="12px;">
            <tbody>
                <tr style="padding: 20px; border-bottom:2px solid black;">
                    <td   width="40%" style="padding: 10px 20px;">
                        @if($opsi['no_po'] ?? '') 
                        <div style=" margin-top:10px;">
                            <a  style="text-decoration: none; font-size:23px; color:red;">PO#{{ $order->id }}</a>
                        </div>
                        @endif
                        @if($opsi['date_po'] ?? '') 
                        <div style="">{{ substr($order->created_at,0,10) }}</div>
                        @endif
                        @if($opsi['pengirim'] ?? '') 
                        <div style=""><b>Pengirim:</b> {{ $order->user->name ?? ''}}</div>
                        @endif
                    </td>
                    <td colspan="2" style="margin: 0;vertical-align: top;">  </td>
                    <td colspan="3" style="margin: 0;vertical-align: top;">
                        @if($opsi['logo'] ?? '') 
                        <img style="height:60px; margin-top:20px;"   id="logo"  src="{{ asset('img/logo.png') }}">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border-bottom: 1px solid black; margin-top:10px;"><br></td>
                </tr>
                <tr style="margin: 0; padding: 20px;">
                    <td colspan="6" style="padding: 10px 20px;">
                        @if($opsi['penerima'] ?? '') 
                        <p id="" style=""> <b>Kepada:</b> {{ $order->customer->name ?? '' }} </p>
                        @endif
                        @if($opsi['phone'] ?? '') 
                        <p id="" class="" style="margin-top:-10px; "><b>No Phone:</b>   ({{ $order->customer->user->phone_code->phone_code ?? '' }}) {{ $order->customer->user->phone ?? '' }}</p>
                        @endif
                        @if($opsi['alamat'] ?? '') 
                        <p id="" class="" style="margin-top:-10px; "> <b>Alamat :</b> jl
                            {{$order->customer->user->address ?? ''}}
                        </p>
                        @endif 
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border-bottom: 1px solid black; margin-top:10px;"><br></td>
                </tr>
                <tr>
                    <td colspan="6" style="padding: 10px 20px;">
                        @if($opsi['product'] ?? '') 
                        <p id=""> <b>Product:</b> {{$i->product->name ?? ''}} </p>
                        @endif
                        @if($opsi['sku'] ?? '') 
                        <p id="" class="" style="margin-top:-10px;"> <b>SKU:</b>  {{ $i->sku->properties['size'] ?? '' }}, {{ $i->sku->properties['color'] ?? '' }}, {{ $i->sku->properties['material'] ?? '' }} | {{ $i->sku->code ?? '' }} | {{ $i->qty }} x </p>
                        @endif  
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border-bottom: 1px solid black; margin-top:10px;"><br></td>
                </tr>
    
                <tr>
                    <td colspan="3"  style="padding: 10px 20px;">
                        @if($opsi['ongkir'] ?? '') 
                        <div class=" font-weight-bold" id="">Ongkir : {{ $order->shipping_cost }} </div>
                        @endif 
                    </td>
                    <td colspan="3"  style="padding: 10px 20px;">
                        @if($opsi['kurir'] ?? '') 
                        <a href="#" class="btn btn-info text-white" id="">{{ $order->courier->name ?? '' }} | <b class="" id="">{{ $order->courier_type }}</b></a>
                        @endif 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
</body>

</html>
