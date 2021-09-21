<?php 
  $name =$_POST["tf1"]; 
  $username =$_POST["tf2"];
  $pass =$_POST["tf3"]; 

  //Connecting MongoDB and to database and coolection
  include 'dbconnect.php';
  $db = $con->Financepeer;
  $collection = $db->Login_data;
  $insertOneResult = $collection->insertOne([
    'Name' => $name,
    'username' => $username,
    'password' => $pass,
]);

echo "<script>alert('You are successfull regisetered');</script>";
echo "<script>location.href='index.html'</script>"
 ?> 