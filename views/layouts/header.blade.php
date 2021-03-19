<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $page }}</title>
    <link rel="stylesheet" href="{{ asset('css/printlabel/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/printlabel/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/printlabel/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/printlabel/custom.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">

                <ul class="navbar-nav navbar-right">
                    <li>
                        <a href="/" class="nav-link nav-link-lg">
                            <i data-feather="home"></i> Back To Home
                        </a>
                    </li>
                </ul>
            </nav>
            <form method="POST" action="{{ route('print.l') }}" target="_blank" class="main-sidebar sidebar-style-2">
                @csrf
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/"> <span class="logo-name">PRINTLABEL</span>
                        </a>
                    </div>
                    <div class="sidebar-user">

                        <div class="sidebar-user-details">
                            <div class="sidebar-userpic-btn">
                                <button type="submit" data-toggle="tooltip" title="Cetak Label">
                                    <i data-feather="printer"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="sidebar-menu selectgroup selectgroup-pills">
                        <input type="hidden" name="id" value="11">
                        <li class="menu-header">Opsi Pilihan</li>
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="no_po" value="false" class="custom-switch-input nopo"
                                    checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Nomor Pembelian</span>
                            </label>
                        </li>
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="date_po" value="false" class="custom-switch-input po_date"
                                    checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Tanggal Pembelian</span>
                            </label>
                        </li>
                        {{-- LOGO OPTION --}}
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="logo" value="false" class="custom-switch-input logo"
                                    checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">App Logo</span>
                            </label>
                        </li>
                        {{-- PENGIRIM OPTION --}}
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="pengirim" value="false"
                                    class="custom-switch-input pengirim" checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Nama Pengirim</span>
                            </label>
                        </li>
                        {{-- NAMA PENERIMA --}}
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="penerima" value="false"
                                    class="custom-switch-input penerima" checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Nama Penerima</span>
                            </label>
                        </li>
                        {{-- PHONE PENERIMA --}}
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="phone" value="false" class="custom-switch-input phone"
                                    checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Phone Penerima</span>
                            </label>
                        </li>
                        {{-- ADDRESS PENERIMA --}}
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="alamat" value="false" class="custom-switch-input alamat"
                                    checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Alamat Penerima</span>
                            </label>
                        </li>
                        {{-- PRODUCT NAME --}}
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="product" value="false" class="custom-switch-input product"
                                    checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Nama Product</span>
                            </label>
                        </li>
                        {{-- SKU --}}
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="sku" value="false" class="custom-switch-input sku" checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">SKU</span>
                            </label>
                        </li>
                        {{-- ONGKIR --}}
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="ongkir" value="false" class="custom-switch-input ongkir"
                                    checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Ongkos Kirim</span>
                            </label>
                        </li>
                        {{-- KURIR --}}
                        <li class="dropdown ml-3">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="kurir" value="false" class="custom-switch-input kurir"
                                    checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Nama Kurir</span>
                            </label>
                        </li>

                    </ul>
                </aside>
            </form>
            <div class="main-content">
                <section class="section">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title m-b-0">Printlabel</h4>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">{{ $page }}</li>
                    </ul>

                    @yield('content')
                </section>

            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div> Respository <a href="#">Printlabel</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/printlabel/app.min.js') }}"></script>
    <script src="{{ asset('js/printlabel/scripts.js') }}"></script>
    <script src="{{ asset('js/printlabel/preview.js') }}"></script>
</body>

</html>
