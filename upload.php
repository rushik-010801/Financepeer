<?php
$file_name = basename($_FILES["fileToUpload"]["name"]);
$target_file = "uploads/" . $file_name;
$uploadOk = 1;

// Update database if the file was uploaded successfully
if($uploadOk != 0){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $json = file_get_contents($target_file);
    $json_data = json_decode($json, true);

    include 'dbconnect.php';
  $db = $con->Financepeer;
  $collection = $db->Display_data;

  $res = $collection->insertMany($json_data);
  echo "<script>alert('Inserted Data');</script>";
  echo "<script>location.href='home.php'</script>";
}
?>