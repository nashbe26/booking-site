<?php 
session_start();
$mysqli=mysqli_connect("localhost","root","","project");
if (!$mysqli){
    echo"connection failed : ". mysqli_connect_error();
}
$option = $_GET['option'];
if($option == 'feedbacks'){
    $limit_per_page=10;
    $Limit=10;
$req="SELECT * FROM feedbacks ORDER BY id";
$exec=mysqli_query($mysqli,$req);
$rows = mysqli_fetch_all($exec);
 $numRows=mysqli_num_rows($exec);
 $pagenumber=ceil($numRows/$limit_per_page);
    if(!isset ($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
    $firstpage=($page-1) * $limit_per_page;
    $req ="SELECT * FROM feedbacks   LIMIT $firstpage, $Limit;"; 
    $exec=mysqli_query($mysqli,$req);
}else{
    $limit_per_page=10;
    $Limit=10;
$req="SELECT * FROM paiement ORDER BY id";
$exec=mysqli_query($mysqli,$req);
$rows = mysqli_fetch_all($exec);
 $numRows=mysqli_num_rows($exec);
 $pagenumber=ceil($numRows/$limit_per_page);
    if(!isset ($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
    $firstpage=($page-1) * $limit_per_page;
    $req ="SELECT * FROM paiement   LIMIT $firstpage, $Limit;"; 
    $exec=mysqli_query($mysqli,$req);
}


?>


<html>
<head>
     <title>Admin panel</title>
      <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <style>
         .LinkType:hover{
            border: 1px solid black;
            background-color: #071828;
            padding:5px;
            border-radius: 10%;
            color:white;
            
        }
        .LinkType{
            border: 1px solid black;
            background-color: #071828;
            padding:5px;
            border-radius: 10%;
            color:white;
        }
        .footer{
            position:absolute;
            bottom:0;
            right:0;
            left:0;
        }
        </style>
</head>
<body>
    <?php require'header.php'  ?>
    <div class="container mt-2">
   <div class="float-right ">
       
        <div class="row">
            <a class="btn btn-warning mr-2" href="admin.php?option=paiement"> Paiement Panel</a>
            <a class="btn btn-warning" href="admin.php?option=feedbacks"> Feedbacks Panel</a>
       </div>
       </div>
        
    </div>
        <?php if ($option=='paiement'): ?>
       
     <?php if($numRows == 0): ?>
    <div class="container">
        
     <table class="table">
                       <thead>
                         <tr>
                           <th scope="col">Num</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           
                         </tr>
                       </thead>
    </table>
     <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="alert alert-danger mt-5  ">
                    <h3>Pas de paiement pour le moment</h3>
                </div>
                
        
            </div>
            <div class="col"></div>
        </div>
        </div>
        <div class="footer">
            <?php require'footer.php';  ?>
        </div>
    
    <?php else: ?>
    <?php if(!isset($_SESSION['username'])): ?>
            <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="alert alert-danger mt-5  ">
                    <h3>Les administrateurs seulement peuvent consulter cette page. Merci pou votre compréhension</h3>
                </div>
                
        
            </div>
            <div class="col"></div>
        </div>
    </div>
    <div class="footer">
            <?php require'footer.php';  ?>
        </div>
    <?php else: ?>
     <?php if($_SESSION['username'] !== 'admin'): ?>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
            
                <h3>Les administrateurs seulement peuvent consulter cette page. Merci pou votre compréhension</h3>
        
            </div>
            <div class="col"></div>
        </div>
    </div>
    <div class="footer">
            <?php require'footer.php';  ?>
        </div>
    <?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-md-8 mt-5">
                <h3 class="p-3">Admin Control panal</h3>
                <div class="container">
                
                   
                           <table class="table">
                       <thead>
                         <tr>
                           <th scope="col">Num</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           
                         </tr>
                       </thead>
                               
                                <?php foreach($exec as $row): ?>
                       <tbody>
                           
                         <tr>
                           <th scope="row"><?php print $row['id'];?></th>
                           <td><?php print $row['name'];?></td>
                           <td><?php print $row['email'];?></td>
                           
                         </tr>
                       </tbody>
                                <?php endforeach; ?>
                     </table>
                   
                </div>
            </div>
            <div class="col"></div>
            
        </div><br>
        <a href="userUI.php" class="btn btn-warning float-right">Espace Utilisateur</a><br><br>
        <div class="row m-3">
            
            <div style="margin:0 auto;">
                        <?php for($page=1;$page<=$pagenumber;$page++): ?>
                           <a href="admin.php?option=paiement&page=<?php echo($page) ?>" class="LinkType"><?php echo $page ?></a> 
                        <?php endfor; ?>
            </div>
           
          
        </div>
    </div>

    <?php endif; ?>
    <?php endif; ?>
         <?php endif; ?>
    
           <?php else: ?>
<?php if($numRows == 0): ?>
    <div class="container">
     <table class="table">
                       <thead>
                         <tr>
                           <th scope="col">Num</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Feeds</th>
                         </tr>
                       </thead>
    </table>
     <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="alert alert-danger mt-5  ">
                    <h3>Pas de feebacks pour le moment</h3>
                </div>
                
        
            </div>
            <div class="col"></div>
        </div>
        </div>
        <div class="footer">
            <?php require'footer.php';  ?>
        </div>
    
    <?php else: ?>
    <?php if(!isset($_SESSION['username'])): ?>
            <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="alert alert-danger mt-5  ">
                    <h3>Les administrateurs seulement peuvent consulter cette page. Merci pou votre compréhension</h3>
                </div>
                
        
            </div>
            <div class="col"></div>
        </div>
    </div>
    <div class="footer">
            <?php require'footer.php';  ?>
        </div>
    <?php else: ?>
     <?php if($_SESSION['username'] !== 'admin'): ?>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
            
                <h3>Les administrateurs seulement peuvent consulter cette page. Merci pou votre compréhension</h3>
        
            </div>
            <div class="col"></div>
        </div>
    </div>
    <div class="footer">
            <?php require'footer.php';  ?>
        </div>
    <?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-md-8 mt-5">
                <h3 class="p-3">Admin Control panal</h3>
                <div class="container">
                
                   
                           <table class="table">
                       <thead>
                         <tr>
                           <th scope="col">Num</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Feeds</th>
                         </tr>
                       </thead>
                               
                                <?php foreach($exec as $row): ?>
                       <tbody>
                           
                         <tr>
                           <th scope="row"><?php print $row['id'];?></th>
                           <td><?php print $row['name'];?></td>
                           <td><?php print $row['email'];?></td>
                           <td><?php print $row['feed'];?></td>
                         </tr>
                       </tbody>
                                <?php endforeach; ?>
                     </table>
                   
                </div>
            </div>
            <div class="col"></div>
            
        </div><br>
        <a href="userUI.php" class="btn btn-warning float-right">Espace Utilisateur</a><br><br>
        <div class="row m-3">
            
            <div style="margin:0 auto;">
                        <?php for($page=1;$page<=$pagenumber;$page++): ?>
                           <a href="admin.php?option=feedbacks&page=<?php echo($page) ?>" class="LinkType"><?php echo $page ?></a> 
                        <?php endfor; ?>
            </div>
           
          
        </div>
    </div>
    <?php require'footer.php';  ?>
    <?php endif; ?>
    <?php endif; ?>
         <?php endif; ?>
     <?php endif; ?>
  
</body>
        </html>