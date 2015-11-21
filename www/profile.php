<!--
Moses Chen - mchen37@u.rochester.edu
Yaron Adar - yadar@u.rochester.edu
-->
<?php
if (!isset($_COOKIE['netid']) || !isset($_COOKIE['pass'])) {
    header("Location: login.php");
    exit;
}
$netid = $_COOKIE['netid'];

$server = "localhost";
$username = "root";
$password = "mysql";
$db = "xfac";
$error = "";
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
	die("Connection failed: ".$conn->connect_error);
	$error = $error."dead connection";
}

$query = "SELECT * FROM Employees WHERE employee_netid = '".$netid."'";
$result = mysqli_query($conn, $query);
$first = mysqli_fetch_object($result)->firstname;
$result = mysqli_query($conn, $query);
$last = mysqli_fetch_object($result)->lastname;
$result = mysqli_query($conn, $query);
$email = mysqli_fetch_object($result)->email;
$result = mysqli_query($conn, $query);
$facility = mysqli_fetch_object($result)->facility;
$result = mysqli_query($conn, $query);
$date = mysqli_fetch_object($result)->reg_date;

mysqli_close($conn);
?>
<html>
	<head>
		<title>
			UR XFAC - Profile
		</title>
		<style>
			div#nav {
				margin: 0;
				padding: .3em 0 .3em 0;
				background: #80B3FF;
				width: 100%;
				text-align: center;
			}
			div#nav ul {
			   list-style: none;
			   margin: 0;
			   padding: 0;
			}
			div#nav ul li {
			   margin: 0;
			   padding: 0;
			   display: inline;
			}
			div#nav ul a:link {
			   margin: 0;
			   padding: .3em .4em .3em .4em;
			   text-decoration: none;
			   font-weight: bold;
			   font-size: medium;
			   color: #0047B3;
			}
			div#nav ul a:visited {
			   margin: 0;
			   padding: .3em .4em .3em .4em;
			   text-decoration: none;
			   font-weight: bold;
			   font-size: medium;
			   color: #0052CC;
			}
			div#nav ul a:active {
			   margin: 0;
			   padding: .3em .4em .3em .4em;
			   text-decoration: none;
			   font-weight: bold;
			   font-size: medium;
			   color: #0052CC;
			}
			div#nav ul a:hover {
			   margin: 0;
			   padding: .3em .4em .3em .4em;
			   text-decoration: none;
			   font-weight: bold;
			   font-size: medium;
			   color: #FFFFFF;
			   background-color: #0052CC;
			}
			div#login {
				text-align: center;
			}
			a {
				text-align: center;
			}
		</style>
	</head>
	<body>
		<img src="URXFAC.png"/>
		
		<div id="nav">
			 <ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="portal.php">Portal</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		
		<h1 style="font-family:verdana;text-align:center">
			Profile
		</h1>
		
		<br/>
		
		<div name="profile" style="width:25%; margin: 0px auto; text-align:left">
			<?php
			echo "NetID: ".$netid;
			echo "</br>";
			echo "First Name: ".$first;
			echo "</br>";
			echo "Last Name: ".$last;
			echo "</br>";
			echo "Email: ".$email;
			echo "</br>";
			echo "Facility: ".$facility;
			echo "</br>";
			echo "Date Registered: ".$date;
			?>
		</div>
		
		</br>
		
		<div style="text-align:center">
			<button onclick="editProfile()">Edit Profile</button>
			</br>
			</br>
			</br>
			<button onclick="deleteAccount()">Delete Account</button>
			
			<script>
			function editProfile() {
				window.location.replace("/editprofile.php");
			}
			function deleteAccount() {
				window.location.replace("/delete.php");
			}
			</script>
		</div>
		
	</body>
</html>