<?php 
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "project");
if (!$mysqli) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if(isset($_FILES['toptop'])){
    $image=$_FILES['toptop']['name'];
$target = "upload/".basename($image);
}
if(!empty($_POST['title']) and !empty($_POST['date']) and !empty($_POST['price']) and !empty($_POST['desc']) and   !empty($_POST['Show']) ){
$username=$_POST['title'];
$usernames=$_SESSION['username'];
$id = $_SESSION['identifiant'];    
$email=$_POST['date'];
$pwd=$_POST['price'];
$type=$_POST['desc'];
$typeShow=mysqli_real_escape_string($mysqli,$_POST['Show']);  
    if (move_uploaded_file($_FILES['toptop']['tmp_name'], $target)) {
 $msg = "Image uploaded successfully";

}else{
$msg = "Failed to upload image";
 
}
$req = "INSERT INTO events (title,date,prix,description,image,typeevent,userid) VALUES ('$username','$email','$pwd','$type','$image','$typeShow','$id')";

$test= mysqli_query($mysqli,$req);
    if ($test){
     header ('location:userUI.php');   
    }



}
?>


