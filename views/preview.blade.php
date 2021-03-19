@extends('Printlabel::layouts.header')
@section('content')
    <div class="section-body">
        <div class="row">
            
            <div class="col-12 col-sm-12 col-lg-6">
                <div class="card author-box card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="author-box-name" id="nopo">
                                                <a href="#">PO#7</a>
                                            </div>
                                            <div class="author-box-job" id="po_date">19 March 2021 </div>
                                            <div class="author-box-job" id="pengirim"><b>Pengirim:</b> Nailatul Khaeroti
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
                                                <p id="penerima"> <b>Kepada:</b> nailatul </p>
                                                <p id="phone" class="" style="margin-top:-20px;"><b>No Phone:</b> 085868224618</p>
                                                <p id="alamat" class="" style="margin-top:-20px;"> <b>Alamat :</b> jl magelang Kecamatan Mlati, Kabupaten
                                                    Sleman, Provinsi
                                                    DI
                                                    Yogyakarta 52221
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="author-box-description">
                                                <p id="product">  <b>Product:</b> NAISHA - KAMILA DRESS  </p>
                                                <p id="sku" class="" style="margin-top:-20px;">
                                                    <b>SKU:</b> XL,Rosebrown,2 (x1)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border: 1.5px solid black">
                                    <div class="mb-2 mt-3">
                                        <div class=" font-weight-bold" id="ongkir">Ongkir : Rp. 10,000 </div>
                                    </div>
                                    <div class="float-right  ">
                                        <a href="#" class="btn btn-info text-white" id="kurir">JNE | <b class="" id="">CTC</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
