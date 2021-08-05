<?php 
session_start();
$id=$_GET['id'];
$mysqli = mysqli_connect("localhost", "root", "", "project");
if (!$mysqli) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$req ="SELECT * FROM events WHERE id=$id";
$exe=mysqli_query($mysqli,$req);
$row =mysqli_fetch_array($exe);
?>


<html>
<head>
    
    <title><?php print  $row['title'] ?></title>
      <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <style>
        #title-border{
            border: none;
            width:621px;
            height:155px;
            position: absolute;
            top:223px;
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
            position: absolute;
            top:413px;
        }
        #btn-border{
            border:none;
            position: absolute;
            top:550px;
        }
        header{
            height:150px;
            width:100%;
            background-color: #071828;
        }
        #BtnLog{
            margin-top:70px;
                 
        }
        button{
            font-size: 18px;
            display: inline;
  }
        #links{
        color:#f0ad4e;
        font-family: 'Heebo', sans-serif;
        font-size:22px;
        font-weight: 200;
    }
         #links:link
        {
            text-decoration:none;
            color:#f0ad4e;
    }

#links:visited {
  color: #f0ad4e;
}
#links:hover {
  color: #f0ad4e;
     border-bottom: 2px solid #f0ad4e;
    border-bottom-left-radius: 20px;
}
#links:active {
  color: #f0ad4e;
}
   
        
</style>   
</head>
<body>
    <div id="app">
<header>
        
        <div class="container">
            <div class="row" >
               
                <div class="col-md-2 col-sm-3  mt-3 ">
                    <img src="font/logo.png" alt="logo" style="width:130px;height:130px;">
                </div>
                <div class="col-md-6 col-sm-2 pl-5" style="margin-top:60px;">
                    <nav class="navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" id="links" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="links"href="AllEvent.php" >Evenement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="links"href="#" >Contact</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" id="links"href="#" >A propos</a>
                        </li>    
                        </ul>
                    </div>
                    </nav>
                </div>
                <?php if(isset($_SESSION['username'])): ?> 
                <div class="col-md-4 col-sm-4  pl-5" id="BtnLog">
                    <a class="btn btn-warning btn-md" href="userUI.php" >User Interface</a>
                    <a class="btn btn-warning btn-md" href="disconnect.php" >Disconenct</a>
                    <a class="btn btn-warning btn-md " href="userUI.php" ><img src="font/cart.svg" style="height:24px; width:20px"></a>
                </div>
                <?php else: ?>
                <div class="col-md-4 col-sm-4  pl-5" id="BtnLog">
                    <a class="btn btn-warning btn-md" href="login.php">User Login</a>
                    <a class="btn btn-warning btn-md" href="new_User.php"> Create Account</a>
                    
                </div> 
                <?php endif; ?>
            </div>
        </div>
    </header>

    
    <div class="container pt-5 pb-5" >
   <div class="row">
      <div class="col-md-6">
          <br><br>
        <img class="card-img-top" src="upload/<?php print $row['image'] ?>">
      </div>
      
       <div class="col-md-6">
           <br><br>
           <h4><?php print  $row['title'] ?></h4>
           <form method="get" action="paiment.php">
          <h4 style="text-decoration:underline;">Description</h4>
               
           <input type="hidden" name="id" value="<?php echo $id ?>">
          <p class="text text-dark"></p>
          <div class="alert alert-info">
            <ul>
                <li>Prix: <?php print  $row['prix'] ?> DT </li>
              <li>Délai de livraison:	5-10 minutes
                </li>
            <li>Region:	Tunisie
                </li>
            <li>Platform:	Site web officiel
                </li>
              </ul> 
          </div> 
            
           <div class="alert alert-warning"><p>
                    <ul>
                        <li style="text-decoration:underline;">A propos du l'évenement :</li>
                    </ul>
                <p style="padding-left:25px;"><?php print  $row['description'] ?></p>
           </div>
               <?php if(isset($_SESSION['username'])): ?>
               <button class="btn btn-warning" type="submit">Réserver</button>
                    <?php else: ?>
               <div class="alert alert-danger">
                    <p style="padding-left:25px;">Vous devez vous connecter</p>
               </div>
               <button class="btn btn-warning" type="submit" disabled>Réserver</button>
                    <?php endif; ?>
                </form>
    </div>
          
</div>
       </div>
</div>
    <?php require'footer.php'?>
    </body>
    </html>
<script type="text/javascript">
    var vm = new Vue({
        el:'#app',
        data:{
            plus:0,
        },
        methods:{
            Adds:function(){
            this.plus = 1
        },
            mincee:function(){
            this.plus = 0
        }
        }
        
    })
</script>
