<?php

namespace Printlabel\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Barryvdh\DomPDF\Facade as PDF;

class PrintlabelController extends Controller
{
    public function livePreview($id)
    {
        $data = Order::findOrFail($id);
        return view('Printlabel::preview', ['page' => 'Live Preview Cetak'], compact('data'));
    }

    public function printLabel(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $option = $request->all();
        return $this->cetak($order, $option);
    }

    public function cetak($order, $opsi)
    {
        if ($opsi['template'] == '1') {
            $pdf = PDF::loadview('Printlabel::cetak', ['page' => 'Cetak Label'], compact('order', 'opsi'));
        } else if ($opsi['template'] == '2') {
            $pdf = PDF::loadview('Printlabel::cetak_v2', ['page' => 'Cetak Label'], compact('order', 'opsi'));
        } else if ($opsi['template'] == '3') {
            $pdf = PDF::loadview('Printlabel::a6', ['page' => 'Cetak Label'], compact('order', 'opsi'));
        } else if ($opsi['template'] == '5') {
            $pdf = PDF::loadview('Printlabel::invoice', ['page' => 'Cetak Label'], compact('order', 'opsi'));
        }
        return $pdf->stream();
    }
}
