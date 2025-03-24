<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin - Sign up</title>
</head>
<style>
    * {box-sizing: border-box}

    .form-box{
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        height:97vh;
    }

    /* Add padding to containers */
    .container {
    padding: 16px;
    width: 35%;
    margin-inline: auto;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
    background-color: #0D92F4;
    color: white;
    padding: 10px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }

    .registerbtn:hover {
    opacity:1;
    }

    /* Add a blue text color to links */
    a{
    color: dodgerblue;
    }
    .error{
        color:red;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
    background-color: #f1f1f1;
    text-align: center;
    }
</style>
<body>
<div style="position:absolute; right: 30px; top:30px" >
        <?php if(Session::has('success')): ?>
            <p class="alert alert-success" role="alert"  ><?php echo e(Session::get('success')); ?></p>
        <?php endif; ?>
</div>
<form href="<?php echo e(route('auth.register-user')); ?>" method="POST" class="form-box">
    <?php echo csrf_field(); ?>
  <div class="container"> 
    <h2 style="text-align:center" > Register</h2>
    <p style="text-align:center"  >Please fill in this form to create an account.</p>
    <hr>
    <label for="name"><b>Username</b></label>
    <input type="text" placeholder="Enter Name" value="<?php echo e(old('name')); ?>" name="name" id="name">
    <?php if($errors->has('name')): ?>
    <span class="error"><?php echo e($errors->first('name')); ?></span>
    <br>
    <br>
    <?php endif; ?>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" value="<?php echo e(old('email')); ?>" name="email" id="email" >
    <?php if($errors->has('email')): ?>
    <span class="error"><?php echo e($errors->first('email')); ?></span>
    <br>
    <br>
    <?php endif; ?>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" value="<?php echo e(old('password')); ?>"  name="password" id="password" >
    <?php if($errors->has('password')): ?>
    <span class="error"><?php echo e($errors->first('password')); ?></span>
    <br>
    <br>
    <?php endif; ?>

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" value="<?php echo e(old('password_confirmation')); ?>"  name="password_confirmation" id="confirm_password" >
    <?php if($errors->has('password_confirmation')): ?>
    <span class="error"><?php echo e($errors->first('password_confirmation')); ?></span>
    <br>
    <br>
    <?php endif; ?>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="<?php echo e(route('auth.login-page')); ?>"  >Sign in</a>.</p>
  </div>
</form>
</body>
</html><?php /**PATH D:\xampp\htdocs\gates-policies\resources\views/Auth/register-page.blade.php ENDPATH**/ ?>