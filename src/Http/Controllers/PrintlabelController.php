<?php

namespace Printlabel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Barryvdh\DomPDF\Facade as PDF;

class PrintlabelController extends Controller
{
    public function livePreview($id)
    {
        return view('Printlabel::preview', ['page' => 'Live Preview Cetak']);
    }

    public function printLabel(Request $request)
    {
        $order = '';
        $option = $request->all();
        return $this->cetak($order, $option);
    }

    public function cetak($order, $opsi)
    {
        $pdf = PDF::loadview('Printlabel::cetak', ['page' => 'Cetak Label'], compact('order', 'opsi'));
        return $pdf->stream();
    }
}
