<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    width: 50%;
    margin-inline: auto;
    }

    /* Full-width input fields */
    input[type=text], input[type=password], textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }
    textarea:focus{
        background-color: #ddd;
        outline: none;
    }
    textarea{
        resize:none;
        height:300px;
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
    background-color: #04AA6D;
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
  <!-- <div style="position:absolute; right: 30px; top:30px" >
      <?php if(Session::has('error')): ?>
        <p class="alert alert-danger" role="alert"  ><?php echo e(Session::get('error')); ?></p>
      <?php endif; ?>
  </div>
  <div style="position:absolute; right: 30px; top:30px" >
    <?php if(Session::has('success')): ?>
      <p class="alert alert-success" role="alert"  ><?php echo e(Session::get('success')); ?></p>
    <?php endif; ?>
  </div> -->
<form action="<?php echo e(route('users.posts.store',['user' => Auth::id()])); ?>"  method="POST" class="form-box">
    <?php echo csrf_field(); ?>
  <div class="container">
    <label for="title"><b>Title</b></label>
    <input type="text" placeholder="Enter Title" value="<?php echo e($userWithPost->title); ?>" name="title" id="title" >
    <?php if($errors->has('title')): ?>
    <span class="error"><?php echo e($errors->first('title')); ?></span>
    <br>
    <br>
    <?php endif; ?>

    <label for="content"><b>Content</b></label>
    <textarea value="<?php echo e(old('content')); ?>"  name="content" id="content"><?php echo e($userWithPost->content); ?></textarea>
    <?php if($errors->has('content')): ?>
    <span class="error"><?php echo e($errors->first('content')); ?></span>
    <br>
    <br>
    <?php endif; ?>

    <button type="submit" class="registerbtn">Update Post</button>
  </div>
  
</form>
</body>
</html><?php /**PATH D:\xampp\htdocs\gates-policies\resources\views/user/edit-post.blade.php ENDPATH**/ ?>