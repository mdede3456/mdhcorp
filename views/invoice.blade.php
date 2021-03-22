<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $page }}</title>
</head>

<body>
    @foreach ($order->items->take(1) as $i)
    <table width="100%" border="0" cellspacing="0" font-size="12px;">
        <tbody>
            <tr style="margin: 0; padding: 20px;">
                <td style="margin: 0;" width="10%">
                    <img class="shop-logo" id="logo" src="{{ asset('img/logo.png') }}"
                        style="height:60px;">
                </td>
                <td colspan="4" style="margin: 0;vertical-align: top;"  width="50%">
                    <h5 style="margin-left: 10px; margin-top:20px;">NAISHA</h5>
                    <p style="margin-left: 10px; margin-top:-15px;">Jl.Magelang, KM 5.7, Mlati
                        Beningan,Sinduadi, Kec.Mlati, Kab.Sleman, DIY </p>
                </td>

                <td colspan="2" style="margin: 0;vertical-align: right;">
                    <p id="po_date">
                        <strong>Tanggal:</strong>
                        <span
                            style="clear:both;display:block;font-weight: normal; margin-top:0px;">{{ substr($order->created_at, 0, 10) }}</span>
                    </p>
                    <p style="padding:0; margin:0.5em 0; margin-top:-10px;" id="nopo">
                        <strong>Nomor Invoice:</strong>
                        <span
                            style="clear:both;display:block;font-weight: normal; margin-top:0px;">#{{ $order->id }}</span>
                    </p>
                </td>

            </tr>

            <tr style="margin: 0; padding: 20px;">
                <td colspan="4">
                    <p style="line-height: 1em;margin: 0;padding: 20px 0 0;"
                        id="penerima">
                        <strong>Kepada <span
                                style="text-transform: capitalize;">{{ $order->customer->name ?? '' }}</span></strong>
                    </p>
                    <p   style="font-size: 12px; margin-top:-2px;">Terima kasih telah
                        berbelanja di NAISHA. Berikut adalah rincian orderan Anda:</p>
                </td>

                <td colspan="2">
                    @if ($order->status == 0)
                        <strong><span style="color: #00C853;">PENDING</span>
                            ({{ substr($order->created_at, 0, 10) }})</strong>
                    @elseif($order->status == 10)
                        <strong><span style="color: #00C853;">WAITING PAYMENT</span>
                            ({{ substr($order->created_at, 0, 10) }})</strong>
                    @elseif($order->status == 20)
                        <strong><span style="color: #00C853;">FORWARDED</span>
                            ({{ substr($order->created_at, 0, 10) }})</strong>
                    @elseif($order->status == 30)
                        <strong><span style="color: #00C853;">PROCESSED</span>
                            ({{ substr($order->created_at, 0, 10) }})</strong>
                    @elseif($order->status == 40)
                        <strong><span style="color: #00C853;">ON_DELIVERY</span>
                            ({{ substr($order->created_at, 0, 10) }})</strong>
                    @elseif($order->status == 50)
                        <strong><span style="color: #00C853;">PAID</span>
                            ({{ substr($order->created_at, 0, 10) }})</strong>
                    @elseif($order->status == 90 || $order->status == 91 || $order->status == 92 ||
                        $order->status == 93)
                        <strong><span style="color: #00C853;">CANCELED</span>
                            ({{ substr($order->created_at, 0, 10) }})</strong>
                    @endif
                </td>
            </tr>
            <tr style="background-color: #333333; color:white;">
                <td colspan="2" style="padding: 10px 20px; width: 45%;">Nama Produk</td>
                <td style="padding: 10px 20px; width: 10%;">Jumlah</td>
                <td style="padding: 10px 20px; width: 15%;">
                  
                </td>
                <td   style="padding: 10px 20px; width: 15%;">Harga</td>
                <td style="padding: 10px 20px; width: 15%;">Subtotal</td>
            </tr>
            @php 
              $jumlahTotal = 0;
            @endphp
            @foreach ($order->items as $d)
            @php 
            $jumlahTotal += $d->consumer_price_idr;
            @endphp 
                <tr style="font-size: 12px; vertical-align: middle; "
                    id="product">
                    <td colspan="2">
                        {{ $d->product->name }}
                    </td>
                    <td>
                        {{ $d->qty }}
                    </td>
                    <td class="text-right">
                        {{ number_format($d->consumer_price_idr) }}
                    </td>
                    <td class="text-right">
                        {{ number_format($d->consumer_price_idr) }}
                    </td>
                </tr>
            @endforeach

            <tr style="line-height: 1.25em;font-size: 12px;">
                <td colspan="2">
                    <strong class="trigger-invoice-exp-name ">
                        {{ $order->courier->name ?? '' }} | <b class=""
                        id="">{{ $order->courier_type }}</b> </strong>
                    <strong class="rtrigger-invoice-exp-name">
                        Ekspedisi
                    </strong>
                </td>
                <td></td>
                <td>
                    
                </td>
                <td class="text-right">Rp {{ number_format($order->shipping_cost) }}</td>
                <td class="text-right">Rp {{ number_format($order->shipping_cost) }}</td>
            </tr>


            <tr style="line-height: 2em;font-size: 12px;">
                <td colspan="2">
                    <span style=""><b>TOTAL</b></span>
                </td>
                <td class="">
                  
                </td>
                <td colspan="2"></td>
                <td class="text-right">
                    @php 
                     $total      = $jumlahTotal + $order->shipping_cost;
                    @endphp 
                    <span style=""><b>Rp {{ number_format($total) }}</b></span>
                </td>
            </tr>

            <tr>
                <td colspan="6">
                    <hr style="border-color: #ddd; border-style: dotted;">
                </td>
            </tr>




            <tr class="trigger-invoice-destination-address">
                <td style="vertical-align: top;margin: 0;padding: 10px 0;">
                    <p style="line-height: 1em;margin: 0;padding: 0 0 0 20px;font-size:12px;">Alamat
                        Pengiriman:</p>
                </td>
                <td colspan="5">
                    <p style="font-size: 12px;line-height: 1.25em;margin:0;padding: 5px 0 10px;"
                        id="alamat">
                        <span
                            style="font-weight: bold; font-size:16px; text-transform: capitalize;">NOVI
                            {{ $order->customer->user->name ?? '' }}</span><br>
                        {{ $order->customer->user->address ?? '' }}
                    </p>

                </td>

            </tr>
        </tbody>
    </table>
    @endforeach
</body>

</html>
