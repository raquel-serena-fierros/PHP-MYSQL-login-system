<?php 
  session_start();

  if (isset($_SESSION['user_email']) && isset($_SESSION['user_id'])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>
<body>
	 <div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
	 	<i class="bi bi-person-circle" style="font-size: 13rem; color:indigo"></i>
        <h1 class="text-center display-4" style="margin-top: -50px;font-size: 2.5rem"><?=$_SESSION['user_name']?></h1>
        <a href="logout.php" class='btn btn-outline-primary' style="width: 6rem">Logout</a>

	 </div>
</body>
</html>
<?php 
}else {
   header("Location: login.php");
}
 ?>