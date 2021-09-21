<?php 
  $uname=$_POST["tf1"]; 
  $pass=$_POST["tf2"]; 

  //Connecting MongoDB and to database and coolection
  include 'dbconnect.php';
  $db = $con->Financepeer;
  $collection = $db->Login_data;
  $cursor = $collection->find(['username' => $uname,]);
  $iterator = new IteratorIterator($cursor);
  $iterator->rewind();
  $document = $iterator->current();

  if($pass == $document['password']){
    session_start();
    $_SESSION['uname']=$uname;
    echo "<script>location.href='home.php'</script>";
  }
  else{
    echo "<script> alert('Invalid Password or Username');</script>";
    echo "<script>location.href='index.html'</script>";
  }
 ?> 