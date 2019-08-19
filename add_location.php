<?php
require 'conn.php';
//error_reporting(E_ALL);
  if(isset($_POST['locate'])){
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];
    $location_name=$_POST['location_name'];
    $description=$_POST['description'];
    $imgpath=$_FILES['image']['tmp_name'];
    if($imgpath){
        $img_binary = fread(fopen($imgpath, "r"), filesize($imgpath));
        $photo = base64_encode($img_binary);
        $insert=mysqli_query($conn,"INSERT INTO mylocation (latitude,longitude,location_name,description,image) VALUES ('$latitude','$longitude','$location_name','$description','$photo')");
        if($insert){
            //echo "inserted successfully";
            echo"<script language='javascript'>";
            echo'document.location.replace("./index.php")';
            echo"</script>";
        }else{
            echo $conn->error;
        }
    }else{
      echo "insert image";
    }
  }
  ?>


<!DOCTYPE html>
<html>
  <form method = "POST" action = "" enctype="multipart/form-data" >
    <input type = "text" name = "latitude" placeholder="latitude"><BR><br><br>
    <input type = "text" name = "latitude" placeholder="longitude"><BR><br><br>
    <input type="text"  name = "location_name"  placeholder="location_name"><BR><br><br>
    <input type="text"  name = "description"  placeholder="description"><BR><br><br>
    <input type="file"  name = "image" ><BR><br><br>
    <input type = "submit" name = "locate" value = "Locate">
  </form>
</html>

