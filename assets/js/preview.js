 // NOMOR PO OPTIONS
 var nopo = null;
 $(".nopo").on("click", function() {
     var nopo = $(".nopo").val();
     if (nopo == 'false') {
         $("#nopo").addClass("d-none");
         $(".nopo").val("true");
     } else if (nopo == 'true') {
         $("#nopo").removeClass("d-none");
         $(".nopo").val("false");
     }
 });

 // TANGGAL PEMBELIAN OPTIONS
 var po_date = null;
 $(".po_date").on("click", function() {
     var po_date = $(".po_date").val();
     if (po_date == 'false') {
         $("#po_date").addClass("d-none");
         $(".po_date").val("true");
     } else if (po_date == 'true') {
         $("#po_date").removeClass("d-none");
         $(".po_date").val("false");
     }
 });

 // LOGO OPTIONS
 var logo = null;
 $(".logo").on("click", function() {
     var logo = $(".logo").val();
     if (logo == 'false') {
         $("#logo").addClass("d-none");
         $(".logo").val("true");
     } else if (logo == 'true') {
         $("#logo").removeClass("d-none");
         $(".logo").val("false");
     }
 });

 // pengirim OPTIONS
 var pengirim = null;
 $(".pengirim").on("click", function() {
     var pengirim = $(".pengirim").val();
     if (pengirim == 'false') {
         $("#pengirim").addClass("d-none");
         $(".pengirim").val("true");
     } else if (pengirim == 'true') {
         $("#pengirim").removeClass("d-none");
         $(".pengirim").val("false");
     }
 });

 // Penerima OPTIONS
 var penerima = null;
 $(".penerima").on("click", function() {
     var penerima = $(".penerima").val();
     if (penerima == 'false') {
         $("#penerima").addClass("d-none");
         $(".penerima").val("true");
     } else if (penerima == 'true') {
         $("#penerima").removeClass("d-none");
         $(".penerima").val("false");
     }
 });

 // Phone OPTIONS
 var phone = null;
 $(".phone").on("click", function() {
     var phone = $(".phone").val();
     if (phone == 'false') {
         $("#phone").addClass("d-none");
         $(".phone").val("true");
     } else if (phone == 'true') {
         $("#phone").removeClass("d-none");
         $(".phone").val("false");
     }
 });

 // Alamat OPTIONS
 var alamat = null;
 $(".alamat").on("click", function() {
     var alamat = $(".alamat").val();
     if (alamat == 'false') {
         $("#alamat").addClass("d-none");
         $(".alamat").val("true");
     } else if (alamat == 'true') {
         $("#alamat").removeClass("d-none");
         $(".alamat").val("false");
     }
 });

 // Product OPTIONS
 var product = null;
 $(".product").on("click", function() {
     var product = $(".product").val();
     if (product == 'false') {
         $("#product").addClass("d-none");
         $(".product").val("true");
     } else if (product == 'true') {
         $("#product").removeClass("d-none");
         $(".product").val("false");
     }
 });

 // SKU OPTIONS
 var sku = null;
 $(".sku").on("click", function() {
     var sku = $(".sku").val();
     if (sku == 'false') {
         $("#sku").addClass("d-none");
         $(".sku").val("true");
     } else if (sku == 'true') {
         $("#sku").removeClass("d-none");
         $(".sku").val("false");
     }
 });

 // Ongkir OPTIONS
 var ongkir = null;
 $(".ongkir").on("click", function() {
     var ongkir = $(".ongkir").val();
     if (ongkir == 'false') {
         $("#ongkir").addClass("d-none");
         $(".ongkir").val("true");
     } else if (ongkir == 'true') {
         $("#ongkir").removeClass("d-none");
         $(".ongkir").val("false");
     }
 });

 // Kurir OPTIONS
 var kurir = null;
 $(".kurir").on("click", function() {
     var kurir = $(".kurir").val();
     if (kurir == 'false') {
         $("#kurir").addClass("d-none");
         $(".kurir").val("true");
     } else if (kurir == 'true') {
         $("#kurir").removeClass("d-none");
         $(".kurir").val("false");
     }
 });