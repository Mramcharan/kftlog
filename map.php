<div class="page-content"><!-- Your content goes here -->
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--3-col">

    </div>
<div class="mdl-cell mdl-cell--9-col">

<div id="googleMap" style="width:100%;height:500px;border:1px solid black;"></div>
<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(18.704762,79.416678),
    zoom:17,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD33CutqDu6hBBIMpE2dVZgA6S-bupnI30&callback=myMap"></script>


</div>

</div>
</div>
