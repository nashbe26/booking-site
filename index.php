<?php 
session_start();
$mysqli = mysqli_connect("localhost","root","","project");
if(!$mysqli){
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
} 
$Limit = 6;
$req="SELECT * FROM events  ORDER  BY id DESC LIMIT $Limit";
$exe=mysqli_query($mysqli,$req);
if (isset($_POST['send'])){
    $name=$_POST['Users'];
    $email=$_POST['eamil1'];
    $feed=$_POST['description1'];
    $req="INSERT INTO feedbacks (name,email,feed) VALUES ('$name','$email','$feed')";
    $exec=mysqli_query($mysqli,$req);
    if (!$exec){
        echo"failed :". mysqli_error($mysqli);
    }
}
?>

<html>
<head>
    
    <title>Accueil</title>
      <meta charset="UTF-8">>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <style>
        #title-border{
            border: none;
            width:621px;
        }
        #main-title-n{
                font-family: 'Poppins', sans-serif;
                font-size: 53px;
                color:white;
        }
        #section-text-n{
                font-family: 'Poppins', sans-serif;
                font-size: 16px;
                color:white;
        }
        #section-text{
            border: none;
            width:559px;
            height:76px;
          
        }
        #btn-border{
            border:none;
           
        }
        header{
            
            width:100%;
            background-color: #071828;
        }
        #WhatText{
            font-size: 32px;
            font: 'poppins',sans-serif;
            
            color:#071828;
            text-align: center;
        }
        #WhatTextUs{
            font-size: 20px;
            font: 'poppins',sans-serif;
            padding-top:10px;
            text-align: center;
        }
    
        #SectionIntro{
            width:100%;
            
           
            background-color: #EEEBE5;
        }
        #ShowRec{
            font-size: 32px;
            font: 'poppins',sans-serif;
            padding-top: 30px;
            color:#071828;
            text-align: center;
            color:#fff;
            text-decoration:underline;
            text-underline-position: under;
        }
        #showRecText{
           font-size: 20px;
            font: 'poppins',sans-serif;
            margin-top:20px;
            text-align: center; 
            color:#fff;
            text-decoration:underline;
            text-underline-position: under;
        }
        #TrdSection{
            border: none;
            border-radius: 25px;
            background-color:#071828; 
            width:800px;
            height: 500px;
            margin: 0 auto;
            padding:70px 50px 70px 50px;
            
        }
        #sec{
            width: 100%;
            height:800px;
             background-color: #EEEBE5;
            
        }
        #ContactInfo{
           
                font-family: 'Poppins', sans-serif;
                font-size: 30px;
                color:white;
                text-decoration: underline
        }
         #CredArea{
                font-family: 'Poppins', sans-serif;
                font-size: 16px;
                color:white;
        }
        #ImgClass{
            width:450px;
            height:550px;
            float: right;
        }
        #iamgeShow{
            list-style: none;
            display: flex;
            justify-content: space-around;
            border:none;
            border-radius: 10px;
            margin-bottom: 50px;
        }.mt-6{
            margin-top: 70px;
        }
        
    </style>
</head>
<body>
 <?php require('header.php') ;?>
    
        <div style=" background-color:#071828;">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-6 mt-6">
                      <div id="title-border">
                <p id="main-title-n">Il s'agit de promouvoir vos spectacles</p>
            </div>
            <div id="section-text">
                <p id="section-text-n">Toutes les fonctionnalités dont vous avez besoin pour organiser simplement un événement qui vous ressemble : billetterie en ligne, gestion d’inscriptions, invitations, contrôle d’accès…


                </p>
                <a class="btn btn-warning" type="button"  href="AllEvent.php">Shows</a>
                
            </div>
                </div>
                <div class="col-md-6 mt-2">
                <div id="immg">
                    <img id="ImgClass" src="font/user.png">
                </div>
                </div>
            </div>
          
           
        </div>
    </div>

    <section id="SectionIntro">
        <div class="container pt-5 pb-5">
        <div id="WhatCanYodu">
            <p id="ShowRec" style="color:#000">Les Meilleures Services Du Marché</p>
            <P id="ShowRecText" style="color:#000">Naviguer dans nos spectacles  et réservez un billet pour les regarder</P>
            <ul class="pt-5" id="iamgeShow">
                <li><img src="font/shiled.png" alt="" style="width:178px;height:"></li>
                <li><img src="font/valid.png" alt="" style="width:178px;height:"></li>
                <li><img src="font/cla.png" alt="" style="width:178px;height:"></li>
            </ul>
        </div>
        </div>    
    </section>
<section style="background-color:#071828;height:auto;">
     <div class="container">
        <div id="WhatCanYodu">
            <p id="ShowRec" style="color:#fff;text-decoration:underline;text-underline-position: under;">Our Recently Added Shows ?</p>
            <P id="ShowRecText" style="color:#fff;text-decoration:underline;text-underline-position: under; ">Try Our Most Perfect Shows And Books a Ticket  For Them</P>
            </div>
            <div class="row">
                <?php foreach($exe as $row ): ?>
                <div class="col-md-4 col-sm-12  p-4 mb-2">
                    
                    <div class="card">
                        <img class="card-img-top" src="upload/<?php print $row['image'] ?> " alt="Card image cap" style="width:100%;height:130px;">
                       
                        <div class="card-body" style=" background-color: #EEEBE5;">
                            <form method="get" action="event.php">
                                <input type="hidden" id="custId" name="id" value="<?php print $row['id'] ?>">
                                 <input type="hidden" id="custId" name="image" value="<?php print $row['image'] ?>">
                                <h5 class="card-title"><?php print $row['title'] ?></h5>
                                  <input type="hidden" id="custId" name="title" value="<?php print $row['title'] ?>">
                                <p class="card-text">Price: <?php print $row['prix'] ?> </p>
                                <input type="hidden" id="custId" name="prix" value="<?php print $row['prix'] ?>">
                                <p class="card-text">Date: <?php print $row['date'] ?> </p>
                                <input type="hidden" id="custId" name="date" value="<?php print $row['date'] ?>">
                                Genre : <?php print $row['typeevent'] ?><br>
                                <button  class="btn btn-warning" style="float:right;">More Information</button>
                            </form>    
                        </div>
                        </div>
                   
                </div>
                <?php endforeach; ?>
                
            </div>
            
            </div>
    
    </section>
<section>
    <div id="sec"> 
        <div style="height:150px;"></div>
        <div id="TrdSection"  >
            <div class="container">
            <h5 id="ContactInfo">Nous Contactez :</h5>
            <form method="post" action="">
                <div class="row">
                    <div class="col-md-6 pt-4">
                        <p id="CredArea">Name :</p>
                        <input type="text" id="nom1" name="Users"class="form-control" required> 
                    </div>
                    <div class="col-md-6 pt-4">
                       <p id="CredArea">Email :</p>
                        <input type="email" id="email" name="eamil1" class="form-control" required>
                    </div>
                </div>
                    <p id="CredArea" class="pt-3">Message :</p>
                    <textarea class="form-control" id="textarea" rows="3" name="description1" class="pt-3" required></textarea>
                <button class="btn btn-warning mt-4" name ="send"type="submit">Send</button>
            </form>
            </div>
        </div> 
    </div>      
    </section>
<?php require'footer.php'?>
</body>