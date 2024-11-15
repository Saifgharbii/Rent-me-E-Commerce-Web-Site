<?php
session_start();
if (!isset($_COOKIE['auth_token'])) {
	header("Location: login.php");
	exit();
}
$auth_token = $_COOKIE['auth_token'];
require('functions\connexion.php');
$query = "SELECT * FROM renter WHERE token = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $auth_token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
	header("Location: login.php");
	exit();
}
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="./assets/logo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Settings</title>
	<link rel="stylesheet" href="assets\css\userinfo.css">
	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="cont-left">
			<div class="card-body">
				<div class="d-flex flex-column align-items-center text-center">
					<img src="<?php echo $user['profile_picture'] ?>" class="rounded-circle" width="150">
					<div class="mt-3">
						<h4><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h4>
						<a href="dashboard.php"><button class="btn btn-primary">Dashboard</button></a>

					</div>
				</div>
			</div>
		</div>
		<div class="cont-right">


			<div class="card-body">
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-2 text">Personal Details</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="fullName">Full Name</label>
							<input type="text" class="form-control" id="fullName" placeholder="Enter full name">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="eMail">Email</label>
							<input type="email" class="form-control" id="eMail" placeholder="Enter email ID">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" id="phone" placeholder="Enter phone number">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="website">Website URL</label>
							<input type="url" class="form-control" id="website" placeholder="Website url">
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<a type="button" href='userinfo.php' class="btn btn-secondary">Cancel</a>
							<button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Bootstrap JS and dependencies CDN (Popper.js and jQuery) -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>