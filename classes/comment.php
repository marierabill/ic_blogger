<?php
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
}

?>