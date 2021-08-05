

<style>
    #UtilisateurUIB{
            position: relative;
           
            top:0px;
            border: none;
            width:100%;
            height:152px;
            background-color: white;
        }
        #UserWlc{
            font-family: 'Heebo', sans-serif;
            font-size:32px;
            margin-left: 120px;
        }
        #UtilisateurWlc{
            border:none;
            position: absolute;
            top:35px;
            left:300px;
        }#ListUserCh{
            position: absolute;
            margin-left: 90px;
            width:700px;
            height: 34px;
        }#ListUtilisateur2{
            display: flex;
            flex-direction: row;
        }
        #borderUserchose{
            
            
            margin-right:30px; 
            border-bottom: 3px solid #071828;
        }
        #borderUserchose:hover{
            border-bottom: 3px solid #f0ad4e;
        }
    a:link
        {
            text-decoration:none;
    }
    li a{
        color:#f0ad4e;
        font-family: 'Heebo', sans-serif;
        font-size:20px;
        font-weight: 200;
    }
a:visited {
  color: #071828;
}
a:hover {
  color: #071828;
}
a:active {
  color: #071828;
}
    #btn{
        position: absolute;
        right:50px;
        top:35px;
    }
</style>    
<section id="UtilisateurUIB">
        <div id="UtilisateurWlc">
            <p id="UserWlc">Welcome <?php print $_SESSION['username'] ?>!</p>
            <div id="ListUserCh">
            <ul id ="ListUtilisateur2">    
                <li id="borderUserchose" ><a href="index.php" >Accueil</a></li>
                <li id="borderUserchose"> <a href="add_event.php"> Ajouter un evenement  </a></li>
                <li id="borderUserchose"><a href="add_event.php">Se déconnecter</a></li>
            s </ul>    
            </div>
            
        </div>
        <div>
        <a href="disconnect.php" id="btn"class="btn btn-warning ">Se deconnecter</a>
    </div>
    </section>