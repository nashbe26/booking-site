<?php 
    $mysqli=mysqli_connect("localhost","root","","project");
    if(!$mysqli){
        echo "FAILED TO connect " . $mysqli->mysqli_error;
    }
session_start();
if (isset($_GET['option'])){
$cin = "SELECT * FROM events WHERE typeevent ='cinema' ORDER BY id DESC";
$exe1=mysqli_query($mysqli,$cin);
$n1=mysqli_num_rows($exe1);  
$spec = "SELECT * FROM events WHERE typeevent ='Spect' ORDER BY id DESC";
$exe2=mysqli_query($mysqli,$spec);
$n2=mysqli_num_rows($exe2);  
$club = "SELECT * FROM events WHERE typeevent ='clubbing' ORDER BY id DESC";
$exe3=mysqli_query($mysqli,$club);
$n3=mysqli_num_rows($exe3);  
$prof = "SELECT * FROM events WHERE typeevent ='prof' ORDER BY id DESC";
$exe4=mysqli_query($mysqli,$prof);
$n4=mysqli_num_rows($exe4);  
}else
{
$all = "SELECT * FROM events  ORDER BY id DESC";
$exe=mysqli_query($mysqli,$all);
$n=mysqli_num_rows($exe);    
}

?>

<html>
<head>
    <title>Tous les events</title>
      <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo&display=swap" rel="stylesheet">
    <style>
        
        #ShowWlc{
             font-family: 'Heebo', sans-serif;
            font-size:32px;
            
        }
        h5{
            text-decoration: underline;
            
        }
        @media only screen and (max-width:1300px){
            #ShowWlc{
            font-family: 'Heebo', sans-serif;
            font-size:26px;
            margin-top: 50px:
        }
            
        }<?php if($n == 0 ): ?>
         .footer{
            position:absolute;
            bottom:0;
            right:0;
            left:0;
        }
        <?php endif; ?>
     
    </style>
</head>
<body>
    <?php require 'header.php'?>
    <section>
        <div class="container">
            <form action="Allevent.php" method="get">
            <div class="row">
                <div class="col-md-8">
                  <select class="browser-default custom-select mt-5"  name="option">
                    <option selected>Ouvrir le menu de choix</option>
                    <option value="Spect">SPECTACLE ET FESTIVALS</option>
                      
                    <option value="Prof">PROFESSIONNEL ET EXPERIENCE</option>
                    <option value="clubbing">CLUBBING</option>
                      <option value="cinema">CINÉMA PAR SALLE</option>
                  </select>
                  
               
                    
                </div>
                <div class="col-md-4 mt-5">
                <button class="btn btn-warning" type="submit">Filtrer</button>
                 <a class="btn btn-warning" href="AllEvent.php">Afficher tous les evenement</a>
                </div>
            </div> 
            </form>    
         
            <?php if (isset($_GET['option'])): ?>
            <?php if ($_GET['option'] == 'cinema' ): ?>
            <h5>Cinema :</h5>
            <div class="row">
                <?php foreach($exe1 as $row): ?>
                  
                <form method="get" action="event.php">
                 <div class="col-md-4 p-3 mt-2 mb-2">
                    <div class="card" style="width: 20rem;height:10%;">
                        <input type="hidden"  name="id" value="<?php print $row['id'] ?>">
                        <img class="card-img-top" src="upload/<?php print $row['image'];  ?>" alt="Card image cap" style="width:100%;height:180px;">
                        <input type="hidden"  name="image" value="<?php print $row['image'] ?>">
                    <div class="card-body" style="background-color: #EEEBE5;">
                        <h5 class="card-title"><?php print $row['title'] ?></h5>
                            <p><input type="hidden"  name="title" value="<?php print $row['title'] ?>">
                       
                             <input type="hidden"  name="desc" value="<?php print $row['description'] ?>">
                            Genre : <?php print $row['typeevent'] ?><br>
                             <input type="hidden"  name="show" value="<?php print $row['typeevent'] ?>">
                            Date : <?php print $row['date'] ?> ;<br>
                             <input type="hidden"  name="date" value="<?php print $row['date'] ?>">
                            Prix : <?php print $row['prix'] ; ?>
                             <input type="hidden"  name="prix" value="<?php print $row['prix'] ?>">
                        </p>
                        <button  class="btn btn-warning float-right">Plus d'information</button>
                       
                    </div>
                    </div>
                </div>
                
                </form>
                <?php endforeach; ?>
            </div>
           
            <?php elseif ($_GET['option'] == 'Spect' ): ?>
             <h5>SPECTACLE & FESTIVALS :</h5>
               <div class="row">
                <?php foreach($exe2 as $row): ?>
                   
                <form method="get" action="event.php">
                 <div class="col-md-4 p-3 mt-2 mb-2">
                    <div class="card" style="width: 20rem;height:10%;background-color: #EEEBE5;">
                        <input type="hidden"  name="id" value="<?php print $row['id'] ?>">
                        <img class="card-img-top" src="upload/<?php print $row['image'];  ?>" alt="Card image cap" style="width:100%;height:180px;">
                        <input type="hidden"  name="image" value="<?php print $row['image'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php print $row['title'] ?></h5>
                            <input type="hidden"  name="title" value="<?php print $row['title'] ?>">
                        <p class="card-text">description : <?php print $row['description'] ?><br>
                             <input type="hidden"  name="desc" value="<?php print $row['description'] ?>">
                            Genre : <?php print $row['typeevent'] ?><br>
                             <input type="hidden"  name="show" value="<?php print $row['typeevent'] ?>">
                            Date : <?php print $row['date'] ?> ;<br>
                             <input type="hidden"  name="date" value="<?php print $row['date'] ?>">
                            Prix : <?php print $row['prix'] ; ?>
                             <input type="hidden"  name="prix" value="<?php print $row['prix'] ?>">
                        </p>
                        <button  class="btn btn-warning float-right">Plus d'information</button>
                       
                    </div>
                    </div>
                </div>
                
                </form>
                <?php endforeach; ?>
            </div>
       <?php elseif ($_GET['option'] == 'clubbing' ): ?>
              <h5>CLUBBING :</h5>
                 <div class="row">
                <?php foreach($exe3 as $row): ?>
                   
                <form method="get" action="event.php">
                 <div class="col-md-4 p-3 mt-2 mb-2">
                    <div class="card" style="width: 20rem;height:10%;background-color: #EEEBE5;">
                        <input type="hidden"  name="id" value="<?php print $row['id'] ?>">
                        <img class="card-img-top" src="upload/<?php print $row['image'];  ?>" alt="Card image cap" style="width:100%;height:180px;">
                        <input type="hidden"  name="image" value="<?php print $row['image'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php print $row['title'] ?></h5>
                            <input type="hidden"  name="title" value="<?php print $row['title'] ?>">
                        <p class="card-text">description : <?php print $row['description'] ?><br>
                             <input type="hidden"  name="desc" value="<?php print $row['description'] ?>">
                            Genre : <?php print $row['typeevent'] ?><br>
                             <input type="hidden"  name="show" value="<?php print $row['typeevent'] ?>">
                            Date : <?php print $row['date'] ?> ;<br>
                             <input type="hidden"  name="date" value="<?php print $row['date'] ?>">
                            Prix : <?php print $row['prix'] ; ?>
                             <input type="hidden"  name="prix" value="<?php print $row['prix'] ?>">
                        </p>
                        <button  class="btn btn-warning float-right">Plus d'information</button>
                       
                    </div>
                    </div>
                </div>
                
                </form>
                <?php endforeach; ?>
            </div>
            <p></p>
            <?php elseif ($_GET['option'] == 'Prof' ): ?>
              <h5>PROFESSIONNEL & EXPERIENCE  :</h5>
                 <div class="row">
                  
                <?php foreach($exe4 as $row): ?>
                <form method="get" action="event.php">
                 <div class="col-md-4 p-3 mt-2 mb-2">
                    <div class="card" style="width: 20rem;height:10%;background-color: #EEEBE5;">
                        <input type="hidden"  name="id" value="<?php print $row['id'] ?>">
                        <img class="card-img-top" src="upload/<?php print $row['image'];  ?>" alt="Card image cap" style="width:100%;height:180px;">
                        <input type="hidden"  name="image" value="<?php print $row['image'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php print $row['title'] ?></h5>
                            <input type="hidden"  name="title" value="<?php print $row['title'] ?>">
                        <p class="card-text">description : <?php print $row['description'] ?><br>
                             <input type="hidden"  name="desc" value="<?php print $row['description'] ?>">
                            Genre : <?php print $row['typeevent'] ?><br>
                             <input type="hidden"  name="show" value="<?php print $row['typeevent'] ?>">
                            Date : <?php print $row['date'] ?> ;<br>
                             <input type="hidden"  name="date" value="<?php print $row['date'] ?>">
                            Prix : <?php print $row['prix'] ; ?>
                             <input type="hidden"  name="prix" value="<?php print $row['prix'] ?>">
                        </p>
                        <button  class="btn btn-warning float-right">Plus d'information</button>
                       
                    </div>
                    </div>
                </div>
                
                </form>
                <?php endforeach; ?>
            </div>
            <?php  endif; ?>
            <?php else: ?>
            <h3  class="mt-5 mb-5">Tous Evenement disponible maintenant par type : </h3>
                <div class="row">
                   <?php if($n == 0): ?>
                        <div class="alert alert-danger" style="margin:0 auto; padding:50px;">
                            Pas d'evenements pour le moment
                        </div>
                    
                     
                    <?php else: ?>
                <?php foreach($exe as $row): ?>
                <form method="get" action="event.php">
                 <div class="col-md-4 p-3">
                    <div class="card" style="width: 20rem;height:10%;background-color: #EEEBE5;">
                        <input type="hidden"  name="id" value="<?php print $row['id'] ?>">
                        <img class="card-img-top" src="upload/<?php print $row['image'];  ?>" alt="Card image cap" style="width:100%;height:180px;">
                        <input type="hidden"  name="image" value="<?php print $row['image'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php print $row['title'] ?></h5>
                            <input type="hidden"  name="title" value="<?php print $row['title'] ?>">
                        <p class="card-text">description : <?php print $row['description'] ?><br>
                             <input type="hidden"  name="desc" value="<?php print $row['description'] ?>">
                            Genre : <?php print $row['typeevent'] ?><br>
                             <input type="hidden"  name="show" value="<?php print $row['typeevent'] ?>">
                            Date : <?php print $row['date'] ?> ;<br>
                             <input type="hidden"  name="date" value="<?php print $row['date'] ?>">
                            Prix : <?php print $row['prix'] ; ?>
                             <input type="hidden"  name="prix" value="<?php print $row['prix'] ?>">
                        </p>
                        <button  class="btn btn-warning float-right">Plus d'information</button>
                       
                    </div>
                    </div>
                </div>
                
                </form>
                <?php endforeach; ?>
            </div>
                     </div>

            <?php endif; ?>
            <?php endif; ?>
    </section>
 <div class="footer">
        <?php require 'footer.php' ?>
</div>
</body>    
</html>