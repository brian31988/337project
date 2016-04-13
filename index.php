<?php

$page = "home";
include 'header.php';

echo '

<div class="container">
    <div class="jumbotron">
  <div class="row">
    <div class="col-12 text-center">

            <h1>Marstons</h1>

           </div>
        </div>
        </div>
        </div>


<div class="image">
<div class="transbox">
    <p> Looking for somthing? <br> Shop with us<br> Login and use the search box to view our invetory and prices </p>
    </div>
<div class="container">
     <div class="row">
  <div class="col-xs-12">
    <div class="panel panel-primary">
  <div class="panel-heading">Why you should use our service</div>

  <div class="panel-body">  <img src="marstons.png" style="float:left">
  <font size = "4">Marstons is a department store with a large inventory of various items. Login and use the search page
  to view our inventory and prices.</font>
  </div><br>
</div></div>

</div>

</div>


<footer> Mastons Depratment Store 2015</footer>
<style>p {
    padding: 25px 50px;
}

body {
   background-image: url(shopping.jpeg);
          background-color:lightgray;

}
    .jumbotron{
        background-color:floralwhite;
        color:black;
    }

    footer{
        font-weight:bold;
        color:black;
        text-align:center;
    }
    .image{
        background-image: url(clothes.png);
        border:2px solid #b0c4de;


    }
    .transbox{
        background-color:#ffffff;
        border:1px solid black;
        opacity: 0.9;
        filter:alpha(opacity=60);
        margin:200px;

    }
    .transbox p {
        margin:10%;
        font-weight:bold;
        color:#000000;
        font-size: 50px;
    }

    .nav-tabs{
      background-color:#f0f0f0;
    }


</style>

';

?>
