<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('style.css') ?>">

<style type="text/css">

input[type="text"]
{
width:150px;
display:run-in;

margin-bottom:1px;
background-color:#1E90FF;
}
input[type="button"]
{
width:120px;
margin-left:35px;
margin-right:35px;
display:block;
margin-left: 4.5em;

}





</style>
</head>

	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

<body>

<div id="menuContainer">
<?php include_once("menu_template.php") ?>
</div>

<div id="bodyContainer">
	<div id="bodyContentContainer">

<br>

<br>

<fieldset>

           <h2>Change Job Title</h2>
           <form action="<?php echo site_url('/auth/title');?>" method='post' name='process'>
  
            <br />            
            <label for='employeeno'>Employee NO</label>
            <input type='text' name='employeeno' id='employeeno'  /><br />
         
           
      <label for='changetitle'>Change Title To</label>
      <select name = "changetitle">
   <option value="">Staff</option>
   <option value="">Senior Staff</option>
   <option value="">Engineer</option>
   <option value="">Assistent Engineer</option>
   <option value="">Senior Engineer</option>
   <option value="">Technique Leader</option>
      </select> </br> 
           

    
       
</h1> 
            <input type='Submit' value='Change Title' />            
        </form>

    </div>
</form>

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