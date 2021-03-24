<?php

namespace Printlabel\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Barryvdh\DomPDF\Facade as PDF;

class PrintlabelController extends Controller
{
    public function livePreview($order_list)
    {

        $ordersID = explode(',', $order_list);

        $query = Order::whereIn('id', $ordersID);
        $orders = $query->get();

        return view('Printlabel::preview', ['page' => 'Live Preview Cetak'], compact('orders', 'order_list'));
    }

    public function printLabel(Request $request)
    {
        $ordersID = explode(',', $request->id);

        $query = Order::whereIn('id', $ordersID);
        $orders = $query->get();
        $option = $request->all();
        return $this->cetak($orders, $option);
    }

    public function cetak($orders, $opsi)
    {
        if ($opsi['template'] == '1') {
            $pdf = PDF::loadview('Printlabel::cetak', ['page' => 'Cetak Label'], compact('orders', 'opsi'))->setPaper('a4', 'landscape');
        } else if ($opsi['template'] == '2') {
            $pdf = PDF::loadview('Printlabel::cetak_v2', ['page' => 'Cetak Label'], compact('orders', 'opsi'))->setPaper('a4', 'landscape');
        } else if ($opsi['template'] == '3') {
            $pdf = PDF::loadview('Printlabel::a6', ['page' => 'Cetak Label'], compact('orders', 'opsi'))->setPaper('a6', 'potrait');
        } else if ($opsi['template'] == '5') {
            $pdf = PDF::loadview('Printlabel::invoice', ['page' => 'Cetak Label'], compact('orders', 'opsi'))->setPaper('a4', 'landscape');
        }
        return $pdf->stream();
    }
}
