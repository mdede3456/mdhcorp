<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $page }}</title>
</head>

<body>
    @foreach ($order->items as $i)
        <table width="60%" border="2" cellspacing="0" style="margin-top: 20px">
            <tbody>
                <tr style="height: 90px">
                    <td class="py bb-1 logo" colspan="2" style="margin: 0; padding: 10px;">
                        <p align="center">
                            <img align="center" src="{{ asset('icon/couriers/' . $order->courier->code . '.svg') }}"
                                alt="{{ $order->courier->name }}">
                        </p>
                    </td>

                    <td class="py bb-1" style="margin: 0; padding: 10px; text-align:center;" colspan="3">
                        @if ($opsi['kurir'] ?? '')
                            <span class="service" id="kurir">
                                {{ $order->courier->name }} {{ $order->courier_type }} </span>
                        @endif
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
                    <td class="bb-1" colspan="6" style="margin: 0; padding: 10px; ">
                        <div class="" id="">
                            @if ($opsi['penerima'] ?? '')
                                <span>KEPADA:</span>
                                <span id="">{{ $order->customer->name ?? '' }}
                                    <strong>({{ $order->customer->user->phone_code->phone_code ?? '' }})
                                        {{ $order->customer->user->phone ?? '' }}</strong></span>
                            @endif

                            <br>
                            <br>
                            @if ($opsi['alamat'] ?? '')
                                <span>ALAMAT PENGIRIMAN:</span>
                                <p id="alamat">
                                    {{ $order->customer->user->address }}
                                </p>
                            @endif
                        </div>
                    </td>
                </tr>

                <tr class="trigger-label-product-list-a6">
                    <td class="bb-1" colspan="6" style="margin: 0; padding: 10px; ">
                        <div style=" ">
                            <span>ISI PAKET:</span>
                            @if ($opsi['product'] ?? '')
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
                            @endif

                            <div class="d-flex justify-content-between trigger-label-total-item-a6 mt-3 d-none">
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
                                @if ($opsi['ongkir'] ?? '')
                                    <span class="trigger-label-exp-nominal-a6" id="ongkir">Ongkir : Rp.
                                        {{ $order->shipping_cost }}<br></span>
                                @endif

                            </div>
                        </div>
                    </td>
                    <td class="text-right" style="margin: 0; padding: 10px; ">
                        @if ($opsi['no_po'] ?? '')
                            <h2 class="m-0" id="nopo">#{{ $order->id }}</h2>
                        @endif
                    </td>
                </tr>


                <tr class="trigger-label-note-a6">
                    <td class="py bt-1" colspan="6" style="margin: 0; padding: 10px; ">
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
