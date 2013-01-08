<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('searchstyle.css') ?>">

<script src="<?php echo base_url('/js/jquery-1.8.3.min.js') ?>"></script>
  <script src="<?php echo base_url('/js/onload.js') ?>"></script>

</head>

  <meta charset="utf-8">
  <title>sallary</title>


<body>
<td>
<br>
<form name="input" action="<?php echo site_url('find/findemp') ?>" method="get">
  
  <a href="http://localhost1/w1173133/index.php/auth/login" target="">HOME</a>

  <fieldset>
  <legend> Advanced Search </legend>
 First Name: <input type="text" name="firstname" id="firstname"><br>
 Last Name: <input type="text" name="lastname" id="lastname"><br>
 Department: <input type="text" name="department" id="department"><br>
 Title: <input type="text" name="title" id="title"><br>
 
 <input type="submit" id="search_submit" value="Search">
  <fieldset>
 </form>
  <table class="search_results">
    <thead>
      <th>First name  </th>
      <th>Last Name</th>
      <th>Department Name </th>
      <th>Title</th>
      
    </thead>
    <tbody>

    
    </tbody>
  
  
  </table>
</body>
</html>