<!DOCTYPE html>
<html>
<head>
	<title>ActMedicalGroup Inc Exam</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php if(isset($_SESSION['AMGI']['username'])){ ?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary text-white">
  <a class="navbar-brand text-white" href="./">ActMedicalGroup Inc(Exam)</a>

  <div class=" navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="./">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="?page=logout">Logout</a>
      </li>
      
    </ul>
    <h5><?= $_SESSION['AMGI']['username'] ?></h5>
  </div>
</nav>

<?php } ?>