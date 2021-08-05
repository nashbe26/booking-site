<?php 
session_start();
$mysqli = mysqli_connect("localhost","root","","project");
$title = $_GET['title'];
$id= $_GET['id'];

$req="SELECT * FROM utilisateur WHERE id= $id";
$exec=mysqli_query($mysqli,$req);
$rows= mysqli_fetch_array($exec);


$user=$rows['1'];
$email=$rows['2'];

$req="INSERT INTO paiement (name,email,title) VALUES ('$user','$email','$title')";
$exec=mysqli_query($mysqli,$req);
?>
<html>
<head>
  <title>panier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
<style type="text/css">
    .footer{
            position:absolute;
            bottom:0;
            right:0;
            left:0;
        }
</style>
    </head>
    <body>
        <?php require'header.php' ?>
        
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 col-sm-12">
                        <div class="alert alert-success mt-5 p-5">
                            <h4>Paiement accpeter</h4>
                            <h6>Vous pouvez <a href="index.php">cliquer ici</a> pour retrouner à la page d'accueil.</h6>
                        </div>
                    <div class="col-md-3"></div>
                    
                </div>
            </div>
        </div>
        <div class="footer">
            <?php require 'footer.php' ?>
        </div>
       
    
    </body>