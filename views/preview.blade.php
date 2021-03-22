@extends('Printlabel::layouts.header')
@section('content')
    <div class="section-body">
        <div class="row">
            @foreach ($data->items->take(1) as $i)

                {{-- SKIN PERTAMA --}}
                <div class="col-12 col-sm-12 col-lg-12 active_label" id="shipping_label">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="author-box-name" id="nopo">
                                                    <a href="#">PO#{{ $data->id }}</a>
                                                </div>
                                                <div class="author-box-job" id="po_date">
                                                    {{ substr($data->created_at, 0, 10) }} </div>
                                                <div class="author-box-job" id="pengirim"><b>Pengirim:</b>
                                                    {{ $data->user->name ?? '' }}
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <img style="height:60px;" class="" id="logo"
                                                    src="{{ asset('img/logo.png') }}">
                                            </div>
                                        </div>
                                        <hr style="border: 1.5px solid black">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="author-box-description">
                                                    <p id="penerima"> <b>Kepada:</b> {{ $data->customer->name ?? '' }}
                                                    </p>
                                                    <p id="phone" class="" style="margin-top:-20px;"><b>No Phone:</b>
                                                        ({{ $data->customer->user->phone_code->phone_code ?? '' }})
                                                        {{ $data->customer->user->phone ?? '' }}</p>
                                                    <p id="alamat" class="" style="margin-top:-20px;"> <b>Alamat :</b> jl
                                                        {{ $data->customer->user->address ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="author-box-description">
                                                    <p id="product"> <b>Product: </b> {{ $i->product->name ?? '' }} </p>
                                                    <p id="sku" class="" style="margin-top:-20px;">
                                                        <b>SKU:</b> {{ $i->sku->properties['size'] ?? '' }},
                                                        {{ $i->sku->properties['color'] ?? '' }},
                                                        {{ $i->sku->properties['material'] ?? '' }} |
                                                        {{ $i->sku->code ?? '' }} | {{ $i->qty }} x
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="border: 1.5px solid black">
                                        <div class="mb-2 mt-3">
                                            <div class=" font-weight-bold" id="ongkir">Ongkir : Rp.
                                                {{ $data->shipping_cost }} </div>
                                        </div>
                                        <div class="float-right  ">
                                            <a href="#" class="btn btn-info text-white"
                                                id="kurir">{{ $data->courier->name ?? '' }} | <b class=""
                                                    id="">{{ $data->courier_type }}</b></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SKIN KEDUA --}}
                <div class="col-12 col-sm-12 col-lg-12 d-none" id="shipping_label_2">
                    <div class="card  card-primary">
                        <div class="card-body">
                            <table width="100%" border="0" cellspacing="0">
                                <tbody>
                                    <tr class="trigger-label-barcode-po-v2">
                                        <td class="py bb-1" colspan="3">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div>
                                                            <strong>
                                                                <span class="trigger-label-po-v2" id="nopo"
                                                                    style="font-size: 14px;">#{{ $data->id }}</span>
                                                            </strong>
                                                        </div>
                                                        <div>
                                                            <strong class="trigger-label-date-order-v2"
                                                                id="po_date">{{ substr($data->created_at, 0, 10) }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-right ml-auto">
                                                    <img style="height:60px;" class="" id="logo"
                                                        src="{{ asset('img/logo.png') }}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="border-bottom: 1px solid black; margin-top:10px;"><br></td>
                                    </tr>
                                    <tr>
                                        <td style="margin: 0; padding: 20px; border-bottom:1px solid black">
                                            <strong id="pengirim">FROM: {{ $data->user->name ?? '' }} </strong>
                                        </td>

                                        <td style="margin: 0; padding: 20px; border-bottom:1px solid black">

                                        </td>

                                        <td class="bb-1 exp trigger-label-exp-v2"
                                            style="margin: 0; padding: 20px;  border-left:1px solid black; border-bottom:1px solid black">
                                            <strong id="kurir">{{ $data->courier->name ?? '' }} | <b class=""
                                                    id="">{{ $data->courier_type }}</b></strong>
                                            <strong class="trigger-label-exp-nominal-v2 " id="ongkir"> - Rp.
                                                {{ $data->shipping_cost }}</strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="py bb-1 to" style="margin: 0; padding: 20px;">
                                            <strong>TO:</strong>
                                        </td>
                                        <td class="py bb-1" colspan="2" style="margin: 0; padding: 20px;">
                                            <span class="ls-1"><strong
                                                    id="penerima">{{ $data->customer->name ?? '' }}</strong></span> <br>
                                            <p id="alamat"> {{ $data->customer->user->address ?? '' }}</p>
                                            <p id="phone" style="margin-top: -10px;">Telp:
                                                ({{ $data->customer->user->phone_code->phone_code ?? '' }})
                                                {{ $data->customer->user->phone ?? '' }}</p>
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
                                                <li class="d-flex flex-wrap justify-content-between">
                                                    <div> {{ $i->product->name ?? '' }} -
                                                        {{ $i->sku->properties['size'] ?? '' }},
                                                        {{ $i->sku->properties['color'] ?? '' }},
                                                        {{ $i->sku->properties['material'] ?? '' }} |
                                                        {{ $i->sku->code ?? '' }}</div>
                                                    <div class="no-wrap text-right" style="padding-left: 10px;">
                                                        {{ $i->qty }} x</div>

                                                </li>
                                            </ul>

                                            <div class="d-flex justify-content-between trigger-label-total-item-v2 mt-3 ">
                                                <strong>TOTAL ITEM</strong>
                                                <strong> {{ $i->qty }} </strong>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="border-bottom: 1px solid black;  "><br></td>
                                    </tr>

                                    <tr class="trigger-label-note-v2">
                                        <td class="py" colspan="3">
                                            <p class="p-0"><strong>NOTE: </strong>{{ $data->customer_note }}</p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- SKIN KETIGA --}}
                <div class="col-12 col-sm-12 col-lg-4 d-none" id="shipping_label_a6">
                    <div class="card  card-primary">
                        <div class="card-body">
                            <table width="100%" border="2" cellspacing="0" class="print-data">
                                <tbody>
                                    <tr style="height: 90px">
                                        <td class="py bb-1 logo" colspan="2" style="margin: 0; padding: 10px;">
                                            <p align="center">
                                                <img align="center"
                                                    src="{{ asset('icon/couriers/' . $data->courier->code . '.svg') }}"
                                                    alt="{{ $data->courier->name }}">
                                            </p>
                                        </td>

                                        <td class="py bb-1" style="margin: 0; padding: 10px; text-align:center;"
                                            colspan="3">
                                            <span class="service" id="kurir">
                                                {{ $data->courier->name }} {{ $data->courier_type }} </span>
                                        </td>

                                        <td class="bb-1 exp" style="margin: 0; padding: 10px; text-align:center;">
                                            @php
                                                $gram = $i->sku->weight_gram * $i->qty;
                                                $kilo = $gram / 1000;
                                            @endphp
                                            <span class="weight trigger-label-real-weight-a6">{{ $kilo }} Kg</span>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="bb-1" colspan="6" style="margin: 0; padding: 10px; ">
                                            <div id="pengirim">
                                                <span>PENGIRIM: </span>
                                                <span>{{ $data->user->name ?? '' }}
                                                    ({{ $data->user->phone_code->phone_code ?? '' }})
                                                    {{ $data->user->phone ?? '' }} </span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="">
                                        <td class="bb-1" colspan="6" style="margin: 0; padding: 10px; ">
                                            <div class="" id="">
                                                <span>KEPADA:</span>
                                                <span id="penerima">{{ $data->customer->name ?? '' }}
                                                    <strong>({{ $data->customer->user->phone_code->phone_code ?? '' }})
                                                        {{ $data->customer->user->phone ?? '' }}</strong></span>
                                                <br>
                                                <br>
                                                <span>ALAMAT PENGIRIMAN:</span>
                                                <p id="alamat">
                                                    {{ $data->customer->user->address }}
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="trigger-label-product-list-a6">
                                        <td class="bb-1" colspan="6" style="margin: 0; padding: 10px; ">
                                            <div style=" ">
                                                <span>ISI PAKET:</span>
                                                <ul class="product-list m-0" id="product">
                                                    <li class="d-flex justify-content-between">
                                                        <div> {{ $i->product->name ?? '' }} - <b
                                                                id="sku">{{ $i->sku->properties['size'] ?? '' }},
                                                                {{ $i->sku->properties['color'] ?? '' }},
                                                                {{ $i->sku->properties['material'] ?? '' }} |
                                                                {{ $i->sku->code ?? '' }} | {{ $i->qty }}
                                                                x{{ $i->sku->properties['size'] ?? '' }},
                                                                {{ $i->sku->properties['color'] ?? '' }},
                                                                {{ $i->sku->properties['material'] ?? '' }} |
                                                                {{ $i->sku->code ?? '' }}</b> {{ $i->qty }} x
                                                        </div>

                                                    </li>
                                                </ul>

                                                <div
                                                    class="d-flex justify-content-between trigger-label-total-item-a6 mt-3 d-none">
                                                    <span>TOTAL ITEM:</span>
                                                    <span>{{ $i->qty }} x</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pb-0" colspan="5" style="margin: 0; padding: 10px; ">
                                            <div class="d-flex">
                                                <div>
                                                    <span class="trigger-label-exp-nominal-a6" id="ongkir">Ongkir : Rp.
                                                        {{ $data->shipping_cost }}<br></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right" style="margin: 0; padding: 10px; ">
                                            <h2 class="m-0" id="nopo">#{{ $data->id }}</h2>
                                        </td>
                                    </tr>


                                    <tr class="trigger-label-note-a6">
                                        <td class="py bt-1" colspan="6" style="margin: 0; padding: 10px; ">
                                            <p class="p-0">
                                                <strong>NOTE: </strong>
                                                {{ $data->customer_note }}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- SKIN KEEMPAT --}}
                <div class="col-12 col-sm-12 col-lg-12 d-none" id="keempat">
                    <div class="card  card-primary">
                        <div class="card-body">
                            <table width="100%" border="0" cellspacing="0" font-size="12px;">
                                <tbody>
                                    <tr style="margin: 0; padding: 20px;">
                                        <td style="margin: 0;" width="10%">
                                            <img class="shop-logo" id="logo" src="{{ asset('img/logo.png') }}"
                                                style="height:60px;">
                                        </td>
                                        <td colspan="3" style="margin: 0;vertical-align: top;">
                                            <h6 style="margin-left: 10px; margin-top:20px;">NAISHA</h6>
                                            <p style="margin-left: 10px; margin-top:-10px;">Jl.Magelang, KM 5.7, Mlati
                                                Beningan,Sinduadi, Kec.Mlati, Kab.Sleman, DIY </p>
                                        </td>

                                        <td colspan="2" style="margin: 0;vertical-align: top;">
                                            <p id="po_date">
                                                <strong>Tanggal:</strong>
                                                <span
                                                    style="clear:both;display:block;font-weight: normal; margin-top:-5px;">{{ substr($data->created_at, 0, 10) }}</span>
                                            </p>
                                            <p style="padding:0; margin:0.5em 0;" id="nopo">
                                                <strong>Nomor Invoice:</strong>
                                                <span
                                                    style="clear:both;display:block;font-weight: normal; margin-top:-5px;">INV.2021.03.20.53457</span>
                                            </p>
                                        </td>

                                    </tr>

                                    <tr style="margin: 0; padding: 20px;">
                                        <td colspan="4">
                                            <p class="mb-0" style="line-height: 1em;margin: 0;padding: 20px 0 0;"
                                                id="penerima">
                                                <strong>Kepada <span
                                                        style="text-transform: capitalize;">{{ $data->customer->name ?? '' }}</span></strong>
                                            </p>
                                            <p class="mt-0" style="font-size: 12px;line-height: 2em;">Terima kasih telah
                                                berbelanja di NAISHA. Berikut adalah rincian orderan Anda:</p>
                                        </td>

                                        <td colspan="2">
                                            @if ($data->status == 0)
                                                <strong><span style="color: #00C853;">PENDING</span>
                                                    ({{ substr($data->created_at, 0, 10) }})</strong>
                                            @elseif($data->status == 10)
                                                <strong><span style="color: #00C853;">WAITING PAYMENT</span>
                                                    ({{ substr($data->created_at, 0, 10) }})</strong>
                                            @elseif($data->status == 20)
                                                <strong><span style="color: #00C853;">FORWARDED</span>
                                                    ({{ substr($data->created_at, 0, 10) }})</strong>
                                            @elseif($data->status == 30)
                                                <strong><span style="color: #00C853;">PROCESSED</span>
                                                    ({{ substr($data->created_at, 0, 10) }})</strong>
                                            @elseif($data->status == 40)
                                                <strong><span style="color: #00C853;">ON_DELIVERY</span>
                                                    ({{ substr($data->created_at, 0, 10) }})</strong>
                                            @elseif($data->status == 50)
                                                <strong><span style="color: #00C853;">PAID</span>
                                                    ({{ substr($data->created_at, 0, 10) }})</strong>
                                            @elseif($data->status == 90 || $data->status == 91 || $data->status == 92 ||
                                                $data->status == 93)
                                                <strong><span style="color: #00C853;">CANCELED</span>
                                                    ({{ substr($data->created_at, 0, 10) }})</strong>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="background-color: #333333; color:white;">
                                        <td colspan="2" style="padding: 10px 20px; width: 45%;">Nama Produk</td>
                                        <td style="padding: 10px 20px; width: 10%;">Jumlah</td>
                                        <td style="padding: 10px 20px; width: 15%;">
                                            <span class="trigger-invoice-wrap-weight d-none">Berat</span>
                                        </td>
                                        <td class="text-right" style="padding: 10px 20px; width: 15%;">Harga</td>
                                        <td class="text-right" style="padding: 10px 20px; width: 15%;">Subtotal</td>
                                    </tr>
                                    @php 
                                      $jumlahTotal = 0;
                                    @endphp
                                    @foreach ($data->items as $d)
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
                                                {{ $data->courier->name ?? '' }} | <b class=""
                                                id="">{{ $data->courier_type }}</b> </strong>
                                            <strong class="rtrigger-invoice-exp-name">
                                                Ekspedisi
                                            </strong>
                                        </td>
                                        <td></td>
                                        <td>
                                            
                                        </td>
                                        <td class="text-right">Rp {{ number_format($data->shipping_cost) }}</td>
                                        <td class="text-right">Rp {{ number_format($data->shipping_cost) }}</td>
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
                                             $total      = $jumlahTotal + $data->shipping_cost;
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
                                                    {{ $data->customer->user->name ?? '' }}</span><br>
                                                {{ $data->customer->user->address ?? '' }}
                                            </p>

                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
