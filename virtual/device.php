<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-pink.min.css" />
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<style>
.demo-card-wide.mdl-card {
width: 100%;
}
.card{
    min-height: 50px;
    padding:20px;
    margin:10px;
  }
  #screen{
    border: 1px solid black;
    margin: 10px;
    padding:10px;
    background: #ffff99;
    font-style: bold;
  }
  input:focus {
    outline: 0;
    border: none;
    height:20px;

}
table{
  width: 100%;
}
</style>
<script>
$(function(){


  $('.mdl-button').on('click', function(evt) {
     var buttonPressed = $(this).val();
    $('#tsc').change().val(buttonPressed);
     var temp = buttonPressed;
    $('.mdl-button').on('click', function(evt) {
     var buttonPressed = $(this).val();
     $('#tsc').change().val(temp + buttonPressed);
     var temp2 = buttonPressed;
     $('.mdl-button').on('click', function(evt) {
      var buttonPressed = $(this).val();
      $('#tsc').change().val(temp + temp2 + buttonPressed);
      var temp3 = buttonPressed;
      $('.mdl-button').on('click', function(evt) {
       var buttonPressed = $(this).val();
       $('#tsc').change().val(temp + temp2 + temp3 + buttonPressed);
       $('#pin').submit();

  });
   });
       });
    });

   });



</script>


<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col"></div>
<div class="mdl-cell mdl-cell--4-col">

  <div class='demo-card-wide mdl-card card mdl-shadow--2dp'>

<div id='screen'>
  <form id='pin' method="post" action="pin_submit.php">
  <p>please enter your pin :</p>
  <input id='tsc' maxlength="4" type="text" name='pin' autofocus/>
</form>
</div>
    <table>
      <tr>
    <td>
    <button value='1' id='one' class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    1
    </button>
    </td>
    <td>
    <button value='2' id='two' class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    2
    </button>
    </td>
    <td><button value='3' id= 'three' class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    3
    </button>
    </td>
    <td><button value='A' id="A" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
    A
    </button>
    </td>
    </tr>
    <tr>
    <td>
    <button value="4" id="four" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    4
    </button>
    </td>
    <td>
    <button value="5" id="five" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    5
    </button>
    </td>
    <td><button value="6" id="six" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    6
    </button>
    </td>
    <td>
    <button  value="B" id='B' class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
    B
    </button>
    </td>
    </tr>
    <tr>
    <td>
    <button value="7"  id="seven" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    7
    </button>
    </td>
    <td>
    <button value="8" id="eight" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    8
    </button>
    </td>
    <td>
    <button value="9" id="nine" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    9
    </button>
    </td>
    <td>
    <button value="C" id="C" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
    C
    </button>
    </td>
    </tr>
    <tr>
    <td>
    <button value="*"  id="star" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    *
    </button>
    </td>
    <td>
    <button value="0" id="zero" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    0
    </button>
    </td>
    <td>
    <button value="#" id="hash"  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    #
    </button>
    </td>
    <td>
    <button  value="D" id='D' class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
    D
    </button>
    </td>
    </tr>
    </table>

  </div>

</div>
<div class="mdl-cell mdl-cell--4-col"></div>
</div>
