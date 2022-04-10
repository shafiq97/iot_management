<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <input type="file" onchange="previewFile()"><br>
  <img id="myImg" src="" alt="Image preview...">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
  </script>
  <script>
    $(document).ready(function() {
      $(function() {
        $(":file").change(function() {
          if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
          }
        });
      });

      function imageIsLoaded(e) {
        $('#myImg').attr('src', e.target.result);
      };

      $(document).click(function(ev) {
        $(".marker").remove();
        $("body").append(
          $('<div class="marker"></div>').css({
            position: 'absolute',
            top: ev.pageY + 'px',
            left: ev.pageX + 'px',
            width: '10px',
            height: '10px',
            background: '#000000'
          })
        );
      });
    });
  </script>
</body>
</html>
