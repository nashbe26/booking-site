<?php 
$mysqli = mysqli_connect("localhost", "root", "", "project");
if (!$mysqli) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if(isset($_POST['username']) and isset($_POST['mdp'])){
    $user=$_POST['username'];
    $pwd=$_POST['mdp'];
    $req ="SELECT * FROM utilisateur WHERE Username='$user' and mdp='$pwd'";
    $exe=mysqli_query($mysqli,$req);
    $row =mysqli_fetch_array($exe);
    if(mysqli_num_rows($exe)!=0){
        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['identifiant'] = $row['id'];
        header('location:userUI.php');
    }else{
        header('location:login.php?connexion=failed');
    }
}

?>