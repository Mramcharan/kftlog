<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-pink.min.css" />
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

<div class="mdl-grid">
<div class="mdl-cell mdl-cell--4-col"></div>
<div class="mdl-cell mdl-cell--4-col">

  <div class='demo-card-wide mdl-card card mdl-shadow--2dp'>

<div id='screen'>
  <p>please enter your pin :</p>
  <input type="text" autofocus/>
</div>
    <table>
      <tr>
        <td>
          <!-- FAB button with ripple -->
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
            1
          </button>
        </td>
        <td><!-- FAB button with ripple -->
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
    2
    </button>
    </td>
        <td><button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
        3
        </button>
      </td>
        <td><button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
        A
        </button>
      </td>
      </tr>
      <tr>
        <td>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
          4
          </button>
        </td>
        <td>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
          5
          </button>
        </td>
        <td><button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
        6
        </button>
      </td>
        <td>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
          B
          </button>

        </td>
      </tr>
      <tr>
        <td>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
          7
          </button>

        </td>
        <td>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
        8
          </button>
        </td>
        <td>

          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
          9
          </button>
        </td>
        <td>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
          C
          </button>

        </td>
      </tr>
      <tr>
        <td>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
          *
          </button>

        </td>
        <td>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
          0
          </button>

        </td>
        <td>

          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
          #
          </button>
        </td>
        <td>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
          D
          </button>

        </td>
      </tr>
    </table>

  </div>

</div>
<div class="mdl-cell mdl-cell--4-col"></div>
</div>
