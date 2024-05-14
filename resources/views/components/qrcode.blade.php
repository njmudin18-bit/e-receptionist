<script type="text/javascript" src="{{ asset('assets/vendor/jquery-qrcode/src/jquery.qrcode.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/jquery-qrcode/src/qrcode.js') }}"></script>
<script>
  $(document).ready(function() {
    //UNTUK SHOW QR
    jQuery('#QrSection').qrcode(
      {
        render	: "canvas",
        width: 140,
        height: 140,
        text: "{{ $title }}",
        ecLevel: "H"
      }
    );

    jQuery('#QrSection2').qrcode(
      {
        render	: "canvas",
        width: 220,
        height: 220,
        text: "{{ $title }}",
        ecLevel: "H"
      }
    );

    jQuery('#QrSection3').qrcode(
      {
        render	: "canvas",
        width: 300,
        height: 300,
        text: "{{ $title }}",
        ecLevel: "H"
      }
    );

    jQuery('#QrSection4').qrcode(
      {
        render	: "canvas",
        width: 100,
        height: 100,
        text: "{{ $title }}",
        ecLevel: "H"
      }
    );
  });
</script>