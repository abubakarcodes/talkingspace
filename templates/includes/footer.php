</div>
</div>
</div>
<div class="col-md-4">
  <div class="side-bar">
    <div class="block">
      <h2>Login Form</h2>
      <?php if(isLoggedIn()): ?>
        <div class="userdata">
          Welcome, <?php echo getUser()['username']; ?>
        </div>
        <br>
        <form role="form" method="post" action="logout.php">
          <input type="submit" class="btn btn-primary" name="do_logout" value="Logout">
        </form>
        <?php else : ?>
      <form method="post" action="login.php">
        <div class="form-group">
          <label>User Name</label>
          <input type="text" class="form-control" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter Password">
        </div>
        <button type="submit" name="do_login" class="btn btn-primary">Login</button> OR <a href="register.php">Create an Account</a>
      </form>
    <?php endif; ?>
    </div>
    <div class="block">
      <h3>Categories</h3>
      <div class="list-group">
        <a href="index.php" class="list-group-item <?php echo is_active(null); ?>">All Topics<span class="badge"><?php echo $getTotalTopics; ?></span></a>
        <?php foreach (getCategories() as $category): ?>
         <a href="topics.php?category=<?php echo $category['id']; ?>" class="list-group-item <?php echo is_active($category['id']); ?>"><?php echo $category['name']; ?></a>
       <?php endforeach ?>
     </div>
   </div>
 </div>
</div>
</div>
</div><!-- /.container -->
</body>
</html>
