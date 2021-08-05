<!DOCTYPE html>
<html>
<head>
    
    <title>Créer un compte</title>
      <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    <style>
        body{
        background-color: #071828;
    }
    #main-container{
            border: none;
            width:360px;
            margin: 0 auto;
            margin-top: 30px;
            background-color:white;
            border-radius: 10px;
            padding-bottom: 40px;
    }
   
    #title{
            font-family: 'Poppins', sans-serif;
            font-size: 25px; 
            text-align: center;
            padding-top:30px;
        }  
      #user_input{
            
            padding: 19px;
            width:241px;
            height: 41px;
            border:0.5px solid #071828; 
            border-radius: 10px; 
        }
    #logiin{
          font-family: 'Poppins', sans-serif;
            font-size:18px;
            padding-top:5px;
            padding-bottom: 5px;
            color: white;
    }
        #ImgLog{
            padding-top: 20px;
            margin-bottom: 20px;
        }
        
    #btn{
            width:241px;
            height: 41px;
            background-color: #f0ad4e;
            border-radius: 10px;
        }
    .FormSpec{
        align-content: center;

    }
    #text-user{
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
        }
    #sign-ne{
        text-align: center;
        }.p0{
            margin:inherit;
        }
</style>
</head> 
<body>
    <?php require 'header.php' ?>
    <div id="main-container">
        <div id="app">
           
            <form action="account.php" method="post" @submit="validations"> 
                <center><img src="font/IndexPic.png" alt="" id="ImgLog"></center>
                <div  class="alert alert-danger mr-4 ml-4" v-if="formError.length">

                <div v-for='errors in formError'>
                        <li>{{errors}}</li>
                    </div>   
                </div>
                            <?php if(isset($_GET['connexion'])): ?>
                    <div  class="alert alert-danger mr-4 ml-4">
                        <li>Données incorrectes.</li>
                 </div>
                    <?php endif; ?>
                <center><div class="form-group" >
                <input type="text" v-model="usename_1" name="username" placeholder="Username"   id="user_input">
                    </div>    </center>
                <center><div class="form-group">    
                <input type="Email" v-model="email_2" name="email" placeholder="Email" id="user_input">
                    </div></center>
                    <center>
                <div class="form-group">    
                <input type="password"  v-model="password_3"name="mdp" placeholder="Password" id="user_input">
                    </div>
                   
                </center>
                <div class="pl-5">
                <p class="pl-3">Select a Porfile:</p>
                <div class="form-check p0">
                    <input type="radio" id="huey" name="typeu" value="user" checked>                                  
                    <label for="huey"><p >User</p></label>
                </div>
                <div class="form-check p0">
                    <input type="radio" id="dewey" name="typeu" value="costumer">
                    <label for="dewey"><p>Porfessionel</p></label>
                </div>
                </div>
                   <center>
                    <div class="form-group">
                <button type="submit" name="send" id="btn"> <p id="logiin">Login</p> </button>
                    </div>
             
            <div id="sign-ne">
                <p id="text-user">You have an account ? <a href="login.php">Login in</a></p>
            </div>
               </center>     
        </form>  
            </div> 
           

    </div>
</body>  
</html>
<script type="text/javascript">
var vm =new Vue({
    el:'#app',
    data:{
    formError:[],
    usename_1:'',
        email_2:'',
        password_3:'',
        maxchars:4,
    },
    methods:{
    validations:function(e){
        
        this.formError=[];
        if (!this.usename_1){
        this.formError.push('Username ne doit pas être vide');
        }
        if (!this.email_2){
        this.formError.push('email ne doit pas être vide');
        }
        if (!this.password_3){
            
        this.formError.push('password ne doit pas être vide');
        }
         if (this.password_3.length<this.maxchars == true){
            this.formError.push('password doit être supérieur à 6');
         }
       if(!this.formError.length){
           return true;
       }
    
        e.preventDefault();
        }
    }
})
</script>