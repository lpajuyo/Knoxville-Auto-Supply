<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
  <?php echo validation_errors(); ?>
  
  <?php echo form_open(''); //this is equal to <form method="post" accept-charset="utf-8" action="http://localhost/Knoxville-Auto-Supply/">
                                     //to add attributes, edit to: echo form('','class="lala" id="lala"'); 
  ?> 
    <div>
    <label for="user">Username:</label>
    <input type="text" name="username" id="user" />
    </div>
    
    <div>
    <label for="pass">Password:</label>
    <input type="password" name="password" id="pass" />
    </div>
    
    <input type="submit" value="Login" />
  </form>
</body>
</html>