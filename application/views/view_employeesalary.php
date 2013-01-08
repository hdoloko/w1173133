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
	<title>sallary</title>

<body>

<div id="menuContainer">
<?php include_once("menu_template.php") ?>
</div>

<div id="bodyContainer">
	<div id="bodyContentContainer">

<fieldset>
	<legend> Sallary View</legend>
	

<form action="<?php echo site_url('auth/salarychange');?>" method='post' name='process'>
            <h2>Change Salary</h2>
            <br />            
            <label for='employeeno'>Employee NO</label>
            <input type='text' name='employeeno' id='employeeno'  /><br />
         
            <label for='salarychange'>Change Salary To</label>
            <input type='text' name='salarychange' id='salarychange'  /><br />                         
        
            <input type='Submit' value='Change Salary' />            
        </form>
    </div>








</fieldset>

</div>

</div>

</body>
</html>