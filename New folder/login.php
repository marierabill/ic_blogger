<style>
	.form
	{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;		
	}
	.form input
	{
		width: 400px;
	}
</style>


<form class="form" action="includes/form_handler/login.php" method="post" role="form">
<h3>Login</h3>
	<div class="form-group">
		<label>Email Address</label>
		<input class="form-control" type="email" name="email" placeholder="Email">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input class="form-control" type="password" name="pwd" placeholder="Password" >
		
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="login_submit" value="Login">
	</div>
</form>