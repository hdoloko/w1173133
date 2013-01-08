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
	<title>Login</title>

<body>

<div id="menuContainer">
<?php include_once("menu_template.php") ?>
</div>

<div id="bodyContainer">
	<div id="bodyContentContainer">
		



 <?php echo validation_errors() ?>


<form action="<?php echo site_url('/auth/createaccount');?>" method='post' name='process'>
            <fieldset>
            <form>          

            <h2>Add Employee</h2>
            <br />            
            <label for='firstname'>First Name</label>
            <input type='text' name='firstname' id='firstname'  /><br />
         
            <label for='lastname'>Last Name</label>
            <input type='text' name='lastname' id='lastname'  /><br />
        
            <label for='gender'>Gender</label>
             
            <select name = 'gender' id = 'gender'>
        <option value="">Gender</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
            </select></br>
  
            <label for='DOB'>Date Of Birth</label>
            <input type='text' name='DOB' id='DOB'  /><br />
            
            <label for='department'>Department</label>
            <input type='text' name='department' id='department' /><br />
            
            <label for='title'>Title</label>
            <input type='text' name='title' id='title'  /><br />
            
            <label for='salary'>Salary</label>
            <input type='text' name='salary' id='salary' /><br />
                                      
        
            <input type='Submit' value='Add Employee' />   

               </fieldset>

        </form>


</body>
</html>