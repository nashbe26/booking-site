
<html>
<head>
    
    <title>login</title>
      <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    

    
<style>
    body{
        background-color: #071828;
    }
    .main-container{
            border: none;
            width:360px;
            margin: 0 auto;
            margin-top: 60px;
            background-color:white;
            border-radius: 10px;
    }
    #ImgLog{
        padding-top:40px;
    }
    #title{
            font-family: 'Poppins', sans-serif;
            font-size: 25px; 
            text-align: center;
            padding:10px 0 20px 0;
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
        padding-bottom: 60px;
    }
</style>
</head> 
<body>
    <?php require 'header.php' ?>
    <div id="app" class="main-container">
    <div >
           
          
        
            <cernter>
                <form action="login-user.php" method="post" @submit="validations" id="FormSpec">
                <center>
                    <img src="font/IndexPic.png" alt="" id="ImgLog"></center>
                      <div id="title">
                <p>Sign In </p>
                        
                </div>
                <?php if(isset($_GET['connexion'])): ?>
                    <div  class="alert alert-danger mr-4 ml-4">
                        <li>Données incorrectes.</li>
                 </div>   
            
                <?php endif; ?>    
                <div  class="alert alert-danger mr-4 ml-4" v-if="formError.length">
                <div v-for='errors in formError'>
                        <li>{{errors}}</li>
                 </div>   
                </div>
                <div class="InputForm">
                <center><div class="form-group">       
                <input type="text" id="user_input" name="username"  placeholder="Username"  v-model="username">
                </div></center>    
                <center><div class="form-group"> 
                <input type="password" id="user_input" name="mdp" v-model="password" placeholder="Mot de passe" >
                    </div></center>
                    <div class="form-check" style="margin-left:65px;">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div><br>
                <center><div class="form-group"> 
                <button type="submit" name="send" id="btn"> <p id="logiin">Login</p> </button>
                </div></center>
                <div id="sign-ne">
                    <p id="text-user">NEW USER ? <a href="new_User.php">Sign Up</a></p>
                </div>
                    </div>
                </form></cernter>
            </div>
    </div>
    
</body>  
</html>
<script type="text/javascript">
var vm = new Vue({
    el:'#app',
    data:{
    formError:[],
    password:'',
    maxchars:4,
    username: '',
    
    },
    methods:{
    validations:function(e){
        
        this.formError=[];
        if (!this.username){
        this.formError.push('Username ne doit pas être vide');
        }
        if (!this.password){
            
        this.formError.push('password ne doit pas être vide');
        }
         if (this.password.length<this.maxchars == true){
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



    