<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $page }}</title>
</head>

<body>
    @foreach ($orders as $order)
        <table width="100%" border="2" cellspacing="0" style="margin-top: 10px">
            <tbody>
                <tr style="">
                    <td class="py bb-1 logo" colspan="2" style="margin: 0; padding: 4px;">
                        <p align="center" style="margin-top:-10px; ">
                            <img align="center" src="{{ asset('icon/couriers/' . $order->courier->code . '.svg') }}"
                                alt="{{ $order->courier->name }}">
                        </p>
                    </td>

                    <td class="py bb-1" style="margin: 0; padding: 4px; text-align:center;" colspan="3">
                        @if ($opsi['kurir'] ?? '')
                            <span class="service" id="kurir">
                                {{ $order->courier->name }} {{ $order->courier_type }} </span>
                        @endif
                    </td>

                    <td class="bb-1 exp" style="margin: 0; padding: 4px; text-align:center;">
                        @php
                            $gram = 0;
                            $kilo = 0;
                        @endphp
                        @foreach ($order->items as $i)
                            @php
                                $gram += $i->sku->weight_gram * $i->qty;
                                $kilo = $gram / 1000;
                            @endphp
                        @endforeach
                        <span class="weight trigger-label-real-weight-a6">{{ $kilo }} Kg</span>
                    </td>

                </tr>

                <tr>
                    <td class="bb-1" colspan="6" style="margin: 0; padding: 4px; ">
                        <div id="">
                            @if ($opsi['pengirim'] ?? '')
                                <span>PENGIRIM: </span>
                                <span>{{ $order->user->name ?? '' }}
                                    ({{ $order->user->phone_code->phone_code ?? '' }})
                                    {{ $order->user->phone ?? '' }} </span>
                            @endif

                        </div>
                    </td>
                </tr>

                <tr class="">
                    <td class="bb-1" colspan="6" style="margin: 0; padding: 4px; ">
                        <div class="" id="">
                            @if ($opsi['penerima'] ?? '')
                                <span style="font-size:14px;">KEPADA:</span>
                                <span style="font-size:14px; ">{{ $order->customer->name ?? '' }}
                                    <strong>({{ $order->customer->user->phone_code->phone_code ?? '' }})
                                        {{ $order->customer->user->phone ?? '' }}</strong></span>
                            @endif

                            @if ($opsi['alamat'] ?? '')
                                <span style="font-size:14px;">ALAMAT PENGIRIMAN:</span>
                                <p id="alamat" style="font-size:14px; margin-top:-3px;">
                                    {{ $order->customer->user->address }}
                                </p>
                            @endif
                        </div>
                    </td>
                </tr>

                <tr class="trigger-label-product-list-a6">
                    <td class="bb-1" colspan="6" style="margin: 0; padding: 4px; ">
                        <div style=" ">
                            <span style="font-size:14px;">ISI PAKET:</span>
                            @if ($opsi['product'] ?? '')
                                <ul id="product">

                                    @php
                                        $totalqty = 0;
                                    @endphp
                                    @foreach ($order->items as $i)
                                        @php
                                            $totalqty += $i->qty;
                                        @endphp
                                        <li style="font-size:14px;">
                                            <div> {{ $i->product->name ?? '' }} - <b
                                                    id="sku">{{ $i->sku->properties['size'] ?? '' }},
                                                    {{ $i->sku->properties['color'] ?? '' }},
                                                    {{ $i->sku->code ?? '' }}</b> {{ $i->qty }} x
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <div style="font-size:14px;">
                                <span>TOTAL ITEM:</span>
                                <span>{{ $totalqty }} x</span>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="pb-0" colspan="5" style="margin: 0; padding: 4px; ">
                        @if ($opsi['ongkir'] ?? '')
                            <span id="ongkir" style="font-size:14px; margin-top:-10px;" style="font-size:14px;">Ongkir : Rp.
                                {{ $order->shipping_cost }}<br></span>
                        @endif
                    </td>
                    <td style="margin: 0; padding: 4px;  ">
                        @if ($opsi['no_po'] ?? '')
                            <h4 >#{{ $order->id }}</h4>
                        @endif
                    </td>
                </tr>


                <tr class="trigger-label-note-a6">
                    <td class="py bt-1" colspan="6" style="margin: 0; padding: 4px; ">
                        <p class="p-0">
                            <strong>NOTE: </strong>
                            {{ $order->customer_note }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach
</body>

</html>
