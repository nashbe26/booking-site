<?php 
$mysqli = mysqli_connect("localhost", "root", "", "project");
if (!$mysqli) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if(!empty($_POST['username']) and !empty($_POST['email']) and !empty($_POST['mdp']) and !empty($_POST['typeu'])){
$username=$_POST['username'];
$email=$_POST['email'];
$pwd=$_POST['mdp'];
$type=$_POST['typeu'];
$req1 = "SELECT Email FROM utilisateur WHERE Email='$email'";
$exec1 =mysqli_query($mysqli,$req1); 
    
   
   $rows=mysqli_num_rows($exec1);
  var_dump($rows);
    if ($rows==0){
        $req = "INSERT INTO utilisateur (Username,Email,mdp,type) VALUES ('$username','$email','$pwd','$type')";
        $exec =mysqli_query($mysqli,$req);
    if ($exec){
       header('location:index.php');
        
    }
    }else{
        header('location:new_user.php?connexion=failed');
    }

}

?>