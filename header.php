<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            
           
        }
        #btn-border{
            border:none;
            
        }
        header{
           
            width:100%;
            background-color: #071828;
        }
        #BtnLog{
            margin-top:40px;
                 
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
    border-bottom-right-radius: 20px;
}
#links:active {
  color: #f0ad4e;
}
   
        
</style>   
<header>
        <div class="container">
            <div class="row" >
                <div class="col-md-2 col-sm-3  mt-3 ">
                    <a href="index.php"><img src="font/logo.png" alt="logo" style="width:100px;height:100px;" > </a>
                </div>
                <div class="col-md-6 col-sm-2 pl-5" style="margin-top:30px;">
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
                    <?php if($_SESSION['username'] == 'admin'): ?>
                        <a class="btn btn-warning btn-md" href="admin.php?option=feedbacks" >Admin Panel</a>
                    <?php else: ?>
                    <a class="btn btn-warning btn-md" href="userUI.php" >Espace Utilisateur</a>
                    <?php endif; ?>
                    <a class="btn btn-warning btn-md" href="disconnect.php" >Disconenct</a>
                    <a class="btn btn-warning btn-md " href="paiment.php" ><img src="font/cart.svg" style="height:24px; width:20px"></a>
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
       