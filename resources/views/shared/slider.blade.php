<script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
    <script>
      $(function () {
        $.material.init();
        $(".shor").noUiSlider({
          start: 40,
          connect: "lower",
          range: {
            min: 0,
            max: 100
          }
        });
        $(".svert").noUiSlider({
          orientation: "vertical",
          start: 40,
          connect: "lower",
          range: {
            min: 0,
            max: 100
          }
        });
      });
    </script>