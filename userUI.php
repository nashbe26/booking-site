<?php 
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "project");
if (!$mysqli) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
    $limit_per_page=4;
    $Limit=4;
    $id=$_SESSION['identifiant'];
    $req2 ="SELECT * FROM events WHERE userid='$id'"; 
    $exe2=mysqli_query($mysqli,$req2);
    $req3 ="SELECT * FROM utilisateur WHERE id='$id'"; 
    $exe3=mysqli_query($mysqli,$req3);
    $rows=mysqli_fetch_array($exe3);
    $numRows=mysqli_num_rows($exe3);
    $pagenumber=ceil($numRows/$limit_per_page);
    if(!isset ($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
    $firstpage=($page-1) * $limit_per_page;
    $req3 ="SELECT * FROM events WHERE userid='$id'  LIMIT $firstpage, $Limit;"; 
    $exe3=mysqli_query($mysqli,$req3);
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <style>
        body{
            background-color: #fff;
        }
        .mybar{
            background-color: #EEEBE5;
            margin-top:30px;
            border: none;
            border-radius: 20px;
            padding: 20px;
        
        } 
        ul{
            list-style-type: none;
        }
        li{
            padding-left: 0px;
        
        }
        p{
            color: white;
        }
        .borderUserType{
            font-family: 'poppins',sans-serif;
            font-size: 16px;
            color: black;
        }
        #MenuUserType{
            font-family: 'poppins',sans-serif;
            font-size: 18px;
            color: black;
            margin-left:40px;
        }
        #nbEventUser{
            font-family: 'poppins',sans-serif;
            font-size: 20px;
            color: black;
            font-weight:500;
        }
         #ShowInformation{
            padding:0 20px 20px 20px;
            height:auto;
            margin-top: 40px;
        }
        .ImageRow{
            background: #071828;
            border: none;
            margin-top: 50px;
            padding: 20px ;
        }
        #MuenUtilisatuer{
          margin-top: 50px;
        } 
        .LinkType{
            border: 1px solid black;
            background-color: #071828;
            padding:5px;
            border-radius: 10%;
            color:white;
        }
         .LinkType:hover{
            border: 1px solid black;
            background-color: #071828;
            padding:5px;
            border-radius: 10%;
            color:white;
        }
        
        .imgPro{
            border:none; 
        background-color:#f0ad4e;
        padding:5px; 
        border-radius:50%;
        }
        
    </style>
    
    <body>
        <?php require'header.php' ?>
          <div class="">
                <div class="row">
                    <div class="myBar col-md-3 col-sm-10 ml-5 mb-5">
                        <div class="ImageRow row">
                        <div class=" col-md-4">
                         <img src="font/users.png" class="imgPro">
                        </div>
                        <div class="col-md-8">
                            <p><?php print ($rows['Username']);?> </p>
                            <p><?php print ($rows['Email']);?></p>
                        </div>
                             </div>
                            <div id="MuenUtilisatuer">
                                <p id="MenuUserType" >Menu</p>
                                <ul id ="ListUtilisateur">
                                    <li  style="padding-top:20px;"><a class="borderUserType" href="index.php">Accueil</a></li>
                                      <?php if($_SESSION['username'] == 'admin'): ?>
                        <li style="padding-top:20px;"><a  class="borderUserType"href="admin.php">Admin Panel</a></li>
                        <li style="padding-top:20px;"><a  class="borderUserType"href="userUI.php">Interface utilisateur</a></li>
                    <?php else: ?>
                    <li style="padding-top:20px;"><a  class="borderUserType"href="userUI.php">Interface utilisateur</a></li>
                    <?php endif; ?>
                                    
                                    <li style="padding-top:20px;"><a class="borderUserType" href="add_event.php">Ajouter un Evenement</a></li>
                                    <li style="padding-top:20px;"><a class="borderUserType" href="disconnect.php">Se déconnecte</a>r</li>
                                </ul>
                            </div>
                       
                    </div>
                    <div class="myBar col-md-8 col-sm-10 ml-5 mb-5">
                         <div id="ShowInformation" >       
                    
                        <?php foreach ($exe3 as $row): ?>
                             <div class=" row mt-5 " >
                               <div class="col-md-4">
                            <img id="img-show" src="upload/<?php print $row['image']?>" alt="IMAGE" style="width:300px;height:100px;">
                               </div>
                           <div class="col-md-8">
                                <p id="nbEventUser" style="color:#000;"><?php print ($row['title']);?></p>
                                <p class="borderUserType"style="color:#000;"> Description: <?php print $row['description']?><br>
                                Prix: <?php print $row['prix']?><br>
                                Genre: <?php print $row['typeevent']?>
                               
                               </p>
                             </div>
                             
                        </div>
                              <hr>   
                        <?php endforeach; ?>
                        
                            <a type="submit" class="btn btn-warning mt-5" href="add_event.php">Ajouter un Event</a>
                             <br><br>
                      
                        
                        <?php for($page=1;$page<=$pagenumber;$page++): ?>
                            <center><a href="userUI.php?page=<?php echo($page) ?>" class="LinkType"><?php echo $page ?></a> </center>
                        <?php endfor; ?>
                        
                        
                    </div>      
                 </div>   
            </div>
        </div>
        <?php require'footer.php' ?>
    </body>
</html>