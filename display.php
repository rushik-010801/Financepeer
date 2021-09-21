<?php

session_start();
if(isset($_SESSION['uname'])){

}
else{
    echo " <script>alert('First you need to login')</script>";
    echo "<script>location.href='index.html'</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Financepeer</title>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Home.css">
</head>
<body style = "background: #325ed6;">

<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
      <div class="media-body">
      <img src="logo.png" alt="logo" style="width:200px;height:100px;">
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
    <a href='home.php' class="nav-link text-dark font-italic">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>Upload file
            </a>
    </li>
    <li class="nav-item">
      <a href="display.php" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Display
            </a>
    </li>
    <li class="nav-item">
      <a href="logout.php" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Logout 
            </a>
    </li>
    </ul>

</div>

<!-- Page content holder -->
<div class="page-content p-5" id="content">

  <h2 class="display-4 text-white"><b>UPLOADED DATA</b></h2>
  <center><br><br>
  <div class="scrollit">
    <table>        
      <tr>
      <th>User ID</th>
      <th>ID</th>
      <th>Title</th>
      <th>Body</th>
      </tr>


<?php 
    //Connecting MongoDB and to database and coolection
    include 'dbconnect.php';
    $db = $con->Financepeer;
    $collection = $db->Display_data;

    //iterator
    $cursor = $collection->find();

    foreach($cursor as $document){
        echo"<tr>";
        echo"<td>".$document["userId"]."</td>";
        echo"<td>".$document["id"]."</td>";
        echo"<td>".$document["title"]."</td>";
        echo"<td>".$document["body"]."</td>";
        echo"</tr>";
    }

 ?> 
 </table>
 <div>
</center>
</div>
</body>
</html> 

 


