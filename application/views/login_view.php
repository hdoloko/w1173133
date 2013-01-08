<html>
<head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('loginstyle.css') ?>">


</head>
<body>

<form action="<?php echo site_url('/auth/authenticate') ?>" method="POST">
    <H3>EMPLOYEE LOGIN</H3>
    Username : <input type="text" name='username'  size="25">  <br>
    Password: <input type="password" name='password'  size="25"> <br>
    <input type="submit" value='LOGIN'>


<a href="http://localhost1/w1173133/index.php/auth/searche" target="">SEARCH EMPLOYEE</a>
</form>
</form>
</body>
</html>