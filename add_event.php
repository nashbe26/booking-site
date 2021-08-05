


<html>
    <title>Ajouter un event</title>
      <meta charset="UTF-8">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<?php require'header.php' ?>
<style>

    .AddForms{
        background-color: #EEEBE5;
        margin-bottom: 50px;
        padding:50px;
    }
    body{
        background-color: #EEEBE5;
    }
</style>
<body>
<div class="container">
 <section id="EventPlacement">
        <div id="BoardTab">
            
            <h5 style="margin:30px;text-decoration:underline"> Ajouter un evenement :</h5>
            <hr>
            <div class="row">
           <div class="col"></div>
            <div class="col-md-6">
                         <form class="AddForms" action="add_succ.php" method="post" enctype="multipart/form-data">
     
                <div class="form-group ">
                    <label for="exampleInputEmail1">Titre :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Titre d'evnement" name="title" required> 
                             </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Date :</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Prix :</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Prix" name="price" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description :</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc" required></textarea>
                </div>
               <div class="form-group">
                    <label for="exampleFormControlTextarea1">Type</label>
                    <select class="form-control" name="Show" required>
                    <option selected>Ouvrir le menu de choix</option>
                    <option value="Spect">SPECTACLE ET FESTIVALS</option>
                    <option value="Prof">PROFESSIONNEL ET EXPERIENCE</option>
                    <option value="clubbing">CLUBBING</option>
                      <option value="cinema">CINÉMA PAR SALLE</option>
                   </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Image Du Show :</label>
                    <input class="form-control p-1" type="file" name="toptop" required>
                </div>
                <button type="submit" class="btn btn-warning float-right">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
    </section>
  </div>
    <?php require'footer.php' ?>
</body>
<html>
