new Vue({
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
        if (!this.username_1){
        this.formError.push('Username ne doit pas être vide');
        }
        if (!this.email_1){
        this.formError.push('Username ne doit pas être vide');
        }
        if (!this.password_1){
            
        this.formError.push('password ne doit pas être vide');
        }
         if (this.password_1.length<this.maxchars == true){
            this.formError.push('password doit être supérieur à 6');
         }
       if(!this.formError.length){
           return true;
       }
    
        e.preventDefault();
        }
    }
})

    