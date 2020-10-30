<?php
(isset($_SESSION['userLoggedIn'])) ? $user = $_SESSION['userLoggedIn'] : header("Location: ../cms_admin.php");	
$sql = mysqli_query($connection, "SELECT * FROM users WHERE email = '$user'");
$row = mysqli_fetch_array($sql);

$username = $row['username'];
$profile = $row['profile_pic'];
$role = $row['role'];

class Comment
{
	private $con;
	
	public function __construct($con)
	{
		$this->con = $con;
	}
	
	public function addComments($id, $name, $email, $body)
	{
		if(!empty($body))
		{
			$query = mysqli_query($this->con, "INSERT INTO comments VALUES('','$name','$email','$body', 'Unapproved', '$id');");
			if(!$query)
			{
				die("Failed ".mysqli_error($this->con));
			}
		}else
		{
			return false;
		}
	}
	
	public function getApprovedComments($id)
	{
		$query = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id = $id AND status = 'Approved' ");
		
		
		
		while($row = mysqli_fetch_assoc($query))
		{
			$id = $row['id'];
			$post_id = $row['post_id'];
			$name = $row['comment_name'];
			$body = $row['body'];
?>
			
					<h3><?php echo $name ?></h3>
					<p><?php echo $body ?></p>
					<p><a href="#" class="reply rounded">Reply</a></p>
<?php
		}
		
	}
	
	public function getComments()
	{
		global $role;
		$query = mysqli_query($this->con, "SELECT * FROM comments ORDER BY id DESC LIMIT 20");
		
		$str = "";
		
		while($row = mysqli_fetch_array($query))
		{
			$id = $row['id'];
			$post_id = $row['post_id'];
			$name = $row['comment_name'];
			$body = $row['body'];
			$email = $row['comment_email'];
			$status = $row['status'];
			
			if($role !== "Admin")
			{
				$str .= "
						<tr>
							<td>$id</td>
							<td>$name</td>
							<td>$email</td>
							<td>$body</td>
							<td>$status</td>
							<td>$post_id</td>
						</tr>				
				";
			}
			else
			{
				$str .= "
						<tr>
							<td>$id</td>
							<td>$name</td>
							<td>$email</td>
							<td>$body</td>
							<td>$status</td>
							<td>$post_id</td>
							<td><a href='#' class='btn btn-primary'>Approve</a></td>
							<td><a href='#' class='btn btn-warning'>Unapprove</a></td>
							<td><a href='#' class='btn btn-danger'>Delete</a></td>
						</tr>				
				";
			}
		}
		echo $str;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

?>