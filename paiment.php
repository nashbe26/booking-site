<?php 
session_start();
$mysqli = mysqli_connect("localhost","root","","project");
if (isset($_GET['id'])){
    $id=$_GET['id'];
$req="SELECT * FROM events WHERE id='$id'";
$exec = mysqli_query($mysqli,$req);
$rows = mysqli_fetch_array($exec);
if (!$exec){
echo "failed requete" . mysqli_error($mysqli);
}

}

?>

<html >
<head>
  <title>panier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
<style type="text/css">
    

	input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
.fa-lock{
	background: #273746;
	color: #fff;
	line-height: 2.1;
	padding: 8%;
	width: 30px;
	text-align: center;
}
@media (min-width: 360px) and (max-width: 767px){
  .col-md-4 .form-group{
    margin-bottom: 0;
  }
  .mt-2{
          margin-top: .3rem!important;
  }
}
    .Footer{
        
        position:absolute;
        bottom:0px;
        left:0;
        right:0;
    }
    .mt-5 {
        margin-top: 100px;
    }
    .quantity,
.shipping,
.promocode,
.subtotal,
.cardAndExpire,
.nameAndcvc {
    margin: 5%;
    color: #6c757d !important
}

.heading1 {
    margin: 5%;
    font-size: 25px
}

.heading2 {
    margin: 5%;
    margin-top: 15%;
    font-size: 20px
}

.payment {
    background-color: #f0edeb;
    padding: 3px;
    margin-top: 15%
}

.text1 {
    color: black;
    font-weight: 700
}

.card-footer {
    background-color: black;
    color: white
}

.purchaseLink {
    text-decoration: none
}

.row1 {
    font-size: 12px
}

.row2 {
    font-weight: 600
}

.subRow {
    margin-left: 10%;
    margin-bottom: 2%;
    margin-top: 5%
}

p.cardAndExpireValue,
p.nameAndcvcValue {
    margin: 5%;
    margin-bottom: 10%;
    font-weight: 600
}

p.nameAndcvc,
p.cardAndExpire {
    margin-bottom: -10px
}
.totalText2 {
    font-weight: 700;
    font-size: 20px
}
    
</style>
</head>

<body>
   
<?php require'header.php'?>
<div id="app">       
<form  action="paiement_succ.php" method ="get"  @submit="check">
<div class=" container">
    <div class="row">            
        <div class="col-md-7 ">
            <div  class="alert alert-danger mt-4 mr-4 ml-4" v-if="PayErorr.length">
                <div v-for='errors in PayErorr'>
                        <li>{{errors}}</li>
                    </div>   
                </div>
        <section>
<div class="container mt-5">
	<div class="row">
        
		<div class="col-lg-2"></div>
<div class="col-lg-8">
	 <div class="card">
    <div class="card-header">
    	<div class="row">
<div class="col-md-8">
    <h4 class="font-weight-bolder pt-1 pb-0">Payment Details</h4>
   </div>
<div class="col-md-4">
</div>
</div>
  </div>
         
    <div class="card-body">

     <label for="email" class="font-weight-bolder inputicon">Nom et Prénom</label>
  <div class="input-group">
   
    <input type="text" v-model="nom" class="form-control" placeholder="Nom et Prénom">

  </div>-
	 <label for="email"  class="font-weight-bolder inputicon mt-2">Card Number</label>
  <div class="input-group">
   
    <input type="text"  v-model="Card" class="form-control" placeholder="Valid Card Number"><span class="input-group-addon"><i class="fa fa-lock"></i></span>

  </div>
        
  <div class="row">
  <div class="col-md-8">
  	 
  	 <div class="container p-0">
  	 	<label for="pwd" class="font-weight-bolder pt-4">EXPIRY DATE:</label>
  	 <div class="row">
  <div class="form-group col-md-3 col-xs-6 col-sm-6">
    <input type="number"class="form-control" v-model="exp2"  placeholder="MM" style="width:60px;" maxlength="2" >
  </div>
  <div class="form-group col-md-3 col-xs-6 col-sm-6">
    <input type="number" class="form-control" v-model="exp1"placeholder="YY" style="width:60px;" maxlength="2"    >
  </div>
  </div>
</div>
</div>
<div class="col-md-4">
	 <div class="form-group">
    <label for="pwd" class="font-weight-bolder pt-4">CV CODE:</label>
    <input type="number" class="form-control" name="nom" v-model="CVC" placeholder="CVV">
  </div>
</div>
</div>


    </div> 
    <div class="card-footer">
    	
    	<button type="submit" class="btn btn-success float-right text-right" >Payer</button>
    </div>
  </div>
</div>
</div>
</div>
   
</section>
        </div>
            <div class="col-md-5 mt-5">
                <div class="card card-cascade card-ecommerce wider shadow p-3 mb-5 ">
                <!--Card Body-->
                <div class="card-body card-body-cascade">
                    <!--Card Description-->
                    <div class="card2decs">
                        <p class="heading1"><strong> <?php  if (isset($id)): print $rows['title'];?><input type="hidden" id="custId" name="title" value="<?php print $rows['title']; ?>"> <?php else: print "Panier Vide"; endif; ?></strong></p>
                        <p class="quantity">Qty <span class="float-right text1">1</span></p>
                        <p class="subtotal">Subtotal<span class="float-right text1"><?php  if (isset($id)): print $rows['prix']; endif; ?> TND </span> </p>
                        <p class="shipping">Shipping<span class="float-right text1">Free</span></p>
                        <p class="promocode">Promo Code<span class="float-right text1">-$100</span></p>
                        <p class="total"><strong>Total</strong><span class="float-right totalText1"><span class="totalText2"><?php  if (isset($id)): print $rows['prix']; endif; ?></span></span></p>
                        <input type="hidden" id="custId" name="id" value="<?php print $_SESSION['identifiant'] ?>">
                    </div>
                    <div class="payment">
                        <p class="heading2"><strong>Payment Details</strong></p>
                        <p class="cardAndExpire">Card Number<span class="float-right">Expiry</span></p>
                        <p class="cardAndExpireValue">{{Card}}<span class="float-right">{{exp2}}/{{exp1}}</span> </p><br>
                        <p class="nameAndcvc" style="margin-bottom:-10px;">Cardholder name<span class="float-right">CVC</span></p>
                        <p class="nameAndcvcValue">Mr. {{nom}}<span class="float-right">{{CVC}}</span></p>
                    </div>
                    
                </div>
            </div>
        </div>    
    </div>
</div>
                </form>
</div> 
    <?php require'footer.php'?>
  
</body>
</html>
<script type="text/javascript">
var vm = new Vue({
el:"#app",
data:{
    Card:null,
    exp1:null,
    PayErorr:[],
    exp2:null,
    CVC:null,
    nom:null,
    maxcharCard:16,
    maxcharCVC:3,
    maxDate:2,
    
},  
methods:{
    check:function(e){
        this.PayErorr=[];
       if (!this.Card  ){
            this.PayErorr.push("Numéro de carte inavalide Invalide");
        }
        
        if (!this.CVC){
            this.PayErorr.push("Cryptogramme Invalide");
        }
         
         if (!this.nom){
            this.PayErorr.push("Saisir votre Nom et votre prénom");
        }
        if (this.Card &&  this.Card.length != this.maxcharCard){
            this.PayErorr.push("Numero de carte doit être egale a 16");
        }
         if (this.CVC &&  this.CVC.length != this.maxcharCVC){
            this.PayErorr.push("Cryptogramme doit être egale a 3");
        }
   
         if(!this.PayErorr.length){
           return true;
         }
        e.preventDefault();
        }   
    }
}
    
)
</script>
