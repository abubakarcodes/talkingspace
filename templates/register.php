<?php include"includes/header.php"; ?>
<form role="form" enctype="multipart/form-data" method="post" action="register.php">
  <div class="form-group">
    <label>Name*</label>
    <input type="text" class="form-control" name="name"  placeholder="Enter Full Name">
  </div>
  <div class="form-group">
    <label>Email address*</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
  </div>
  <div>
    <label>Choose Username*</label>
    <input type="text" class="form-control" name="username"  placeholder="Choose a username">
  </div>
  <div class="form-group">
    <label>Password*</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
  </div>
  <div class="form-group">
    <label>Avatar</label>
    <input type="file" name="avatar">
    <p class="help-block">choose any image from your Device </p>
  </div>
  <div class="form-group">
    <label>About Me</label>
    <textarea name="about" rows="6" cols="8" class="form-control" placeholder="Tell us about yourself(optional)"></textarea>
  </div>
  <button type="submit" name="register" class="btn btn-default">Create An Account</button>
</form> <!-- create an account form -->
<?php include"includes/footer.php"; ?>