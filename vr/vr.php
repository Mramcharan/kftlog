<?php  header("Access-Control-Allow-Origin: *"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>vr</title>
    <script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>

  </head>
  <body>
    <div id="vrview">
    </div>
  </body>
  <script>
  window.addEventListener('load', onVrViewLoad)
function onVrViewLoad() {
var vrView = new VRView.Player('#vrview', {
  width: '100%',
  height: 600,
  video: 'https://storage.googleapis.com/vrview/examples/video/congo_2048.mp4',
  is_stereo: true
});
}
</script>
</html>
