<?php
require "./models/model.php";
class Users extends Models{
	private $table = "users";
	function __construct(){
		Models::__construct();
	}

	public function Index(){
		if(isset($_POST['delete'])){
			$delete = Models::Delete($this->table, "WHERE id='". $_POST['delete'] ."' ");

			if($delete['stat']){
				echo "<script>
					alert('Deleted Successfully!');
				</script>";
			}
			else{
				echo "<script>
					alert('Server Error! Please check your internet connection!!');
				</script>";
			}
		}

		$lists = Models::Read($this->table, "*", "ORDER BY username ASC");
		$datas = $lists['datas'];

		$tbody = "";
		foreach ($datas as $key => $value) {
			$deleteButton = ($_SESSION['AMGI']['username'] == $value['username']) ? "<button class='btn btn-sm btn-danger' disabled>Delete</button>" : "<button 
						class='btn btn-danger btn-sm' 
						type='submit'
						onclick='var conf = confirm(\"Do you really want to delete user ".  $value['username'] ."?\"); if(conf){ return  true; }else{ return false; }'
						name='delete' 
						value='". $value['id'] ."'>
							Delete
						</button>";
			$tbody .= "
			<tr>
				<td>". $value['username'] ."</td>
				<td>". $value['is_active'] ."</td>
				<td>". date("Y F, d", strtotime($value['created_at'])) ."</td>
				<td>
					<a href='?page=edit&username=". $value['username'] ."' class='btn btn-warning btn-sm'>
						Edit
					</a>
				</td>
				<td>
					<a href='?page=resetPassword&username=". $value['username'] ."' class='btn btn-info btn-sm'>
						Reset
					</a>
				</td>
				<td>
					<form method='post'>
						". $deleteButton ."
					</form>
				</td>
			</tr>
			";
		}

		Models::view('./views/index.php', $tbody);
		if(!isset($_SESSION['AMGI']['alerted'])){

			echo "<script>
				alert('Welcome ". $_SESSION['AMGI']['username'] ."');
			</script>";
			$_SESSION['AMGI']['alerted'] = true;
		}
	}
	public function Add(){
		if(isset($_POST['AddBtn'])){
			$save = self::SaveUser($_POST['username'], $_POST['password']);

			if($save['stat']){
				echo "<script>
					alert('New user is added!');
					
				</script>";
				// header("location: ?page=edit&username=". $_POST['username']);
			}
			else{
				echo "<script>
					alert('User already exists!');
				</script>";
			}
		}

		Models::view('./views/add.php');
	}
	public function Edit(){
		if(isset($_POST['SaveEdit'])){

			$data = [
				'username' => $_POST['username'],
				'is_active' => intVal($_POST['setIsActive'])
			];


			$save = Models::Update($this->table, $data, "username='". $_GET['username'] ."' ");
			if($save['stat']){
				echo "<script>
					alert('Updated Successfully!');
					location.href='?page=edit&username=". $_POST['username'] ."'
				</script>";
				// header("location: ?page=edit&username=". $_POST['username']);
			}
			else{
				echo "<script>
					alert('Error!');
				</script>";
			}

		}
		$find = Models::Read($this->table, "*", "WHERE username='". $_GET['username'] ."' ");
		// $datas = json_encode($find['datas']);

		Models::view('./views/edit.php', "", $find['datas'][0]);
	}

	public function resetPass(){
		if(isset($_POST['ResetBtn'])){
			if($_POST['password'] == $_POST['repeatPass']){
				$updatePass = [
					"userpass" => $_POST['repeatPass']
				];
				$reset = Models::Update($this->table, $updatePass, "username='". $_GET['username'] ."' ");

				if($reset['stat']){
					echo "<script>
						alert('Password has been changed!');
					</script>";
				}
				else{
					echo "<script>
						alert('Error!');
					</script>";	
				}
			}
			else{
				echo "<script>
					alert('Password dont match!');
				</script>";
			}
		}
		Models::view('./views/resetpass.php');
	}

	public function Register(){
		if(isset($_POST['username']) && isset($_POST['password'])){

			$save = self::SaveUser($_POST['username'], $_POST['password']);

			if($save['stat']){
				echo "<script>
					alert('Registered Successfully!');
				</script>";
			}
			else{
				echo "<script>
					alert('Server Error! User exists!!');
				</script>";
			}
		}

		Models::view('./views/register.php');
	}

	public function Logout(){
		session_destroy();
		header("location: /test");
	}
	
	public function SaveUser($username, $password){
		$user = [
			'username' => $username,
			'userpass' => password_hash($password, PASSWORD_BCRYPT)
		];
		$save = Models::Create($this->table, $user);

		return $save;

	}

	public function Login(){

		if(isset($_POST['username']) && isset($_POST['password'])){
			$verify = self::verify();
			if($verify['stat']){
				header("location:/test");
			}
			else{
				echo "<script>
					alert('". $verify['message'] ."');
				</script>";
			}

		}

		Models::view('./views/login.php');
	}

	private function verify(){
		$username = $_POST['username'];
		$find = Models::Read($this->table, "*", "WHERE username='". $username ."' AND is_active='1' ");
		$response = [];
		if(count($find['datas']) > 0){
			$user = $find['datas'][0];
			$password = $_POST['password'];

			if(password_verify($password, $user['userpass'])){
				$_SESSION['AMGI']['username'] = $username;
				$response = [
					'stat' => true,
					'message' => 'Welcome ' . $username
				];
			}
			else{
				$response = [
					'stat' => false,
					'message' => 'Wrong Password!!'
				];
			}
		}
		else{
			$response = [
				'stat' => false,
				'message' => 'Cant find user!!'
			];
		}

		return $response;
	}

}
?>