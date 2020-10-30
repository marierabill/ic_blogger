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


<form class="form" action="includes/form_handler/create.php" method="post" role="form" autocomplete="off">
<h3>Create a New Admin</h3>
	<div class="form-group">
		<label>Username</label>
		<input class="form-control" type="text" name="username" placeholder="Username">
	</div>
	<div class="form-group">
		<label>Email Address</label>
		<input class="form-control" type="email" name="email" placeholder="Email">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input class="form-control" type="password" name="pwd" placeholder="Password" >
		Suggested Passwords:
		<ul>
			<li><i><?php echo uniqid(); ?></i></li>
			<li><i><?php echo uniqid(); ?></i></li>
			<li><i><?php echo uniqid(); ?></i></li>
		</ul>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_submit" value="Continue">
	</div>
</form>