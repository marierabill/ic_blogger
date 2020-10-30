<style>
  .form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

  }
  .form input {
    width: 400px;
  }
</style>

<form action="includes/form_handler/create.php" method="post" role="form" class="form" autocomplete="off">
  <h3>Create a new Admin</h3>
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" placeholder="Username" class="form-control">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" placeholder="E-Mail" class="form-control">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="pwd" placeholder="Password" placeholder="Password" class="form-control">
    Suggested Passwords:<br>
    <i><?php echo uniqid(); ?></i>
    <br>
    <i><?php echo uniqid(); ?></i>
  </div>
  <div class="form-group">
    <input type="submit" name="create_submit" value="Continue" class="btn btn-primary">
  </div>
</form>
