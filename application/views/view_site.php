<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('style.css') ?>">
<style type="text/css">
input[type="text"]
{
width:150px;
display:;
margin-bottom:1px;
background-color:#1E90FF;
}
input[type="button"]
{
width:120px;
margin-left:35px;
margin-right:35px;
display:;
margin-left: 4.5em;
}
table
{
  lheight:500px;
  lwidth:500px;
  border:#666 0px solid;
  background-color: white;
  opacity: 0.9;
  margin:auto;
}
</style>

<script src="<?php echo base_url('/js/jquery-1.8.3.min.js') ?>"></script>
  <script src="<?php echo base_url('/js/onload.js') ?>"></script>


</head>

	<meta charset="utf-8">
	<title>Advance_Search</title>

<body>

<div id="menuContainer">
<?php include_once("menu_template.php") ?>
</div>

<div id="bodyContainer">
	<div id="bodyContentContainer">

<br>
<form>
<a href="http://localhost1/w1173133/index.php/auth/login" target="">LOGOUT</a>
<a href="http://localhost1/w1173133/index.php/find/advancesearch" target="">Advance_Search</a>

</form>
<br>


  <canvas id="myCanvas" width="580" height="150"></canvas>
  
  <script>
    function drawTransparentSquare(context) {
      context.fillStyle = '0091FF';
      context.globalAlpha = 0.5;
      context.fillRect(100, 20, 100, 100);
      
    }
    
    function drawSquare(context) {
      context.fillStyle = '0091FF';
      context.fillRect(300, 50, 120, 120);
    }

    var canvas = document.getElementById('myCanvas');
    var context = canvas.getContext('2d');
    
    drawTransparentSquare(context);
    drawSquare(context);
  </script>


</div>

</fieldset>
</div>

</body>
</html>