(()=>{
    var app = new Vue({
   el:'#AppLogin',
   data:{
       nameapp:'tarea vue.js',
       Datos:[],
       Password:'',
       Usuario:'',
       Checar:false
   },
   methods:{
       Msconfirmacion:function(){
        var data={
            "Idsocio":this.Datos.vchCurp,
        }
        localStorage.setItem("data2",JSON.stringify(data));
        console.log(this.Datos);
        window.location.href="http://localhost/pet/PET/empleados";
       },
       Mostraspass:function(){
           let btnpass=document.getElementById("UserPass");
           if(btnpass.type=="password"){
               btnpass.type="text";
           }else{
               btnpass.type="password";
           }
       },
       Exit:function(){
        window.location.href="http://localhost/pet/PET/empleados";
       },
      login:function(e){
           e.preventDefault(e);
            this.ValidaCampos();
       },
       ValidaCampos:function(){
            var formulario=document.getElementById("frmlogin");
            var elementos =formulario.elements;
            var check=false;
            var a=0;
            var conta=elementos.length;
            while(a<conta){
            let dato=elementos[a].value.trim();
            if(dato.length<=0 || elementos[a].value==null){
                check=true;
                elementos[a].focus();
                $.notify("Campo vacio "+elementos[a].name);
                break;
            }
            a++;
        }
        if(check==false){
            this.CosultaDatos();
        }
       },
       ValidarUser:function(){
            if(this.Usuario==this.Datos[0]){
                if(this.Password==this.Datos[1]){
                    this.Checar=true;
                }
            }
            if(this.Checar==false){
                $.notify("El Usuario No Existe",'warn');
            }else{
                this.Msconfirmacion();
            }
       },
       CosultaDatos:function(){
                let formato= new FormData();
                let serverurl="modelo/CrudLogin.php";
                let _this=this;
                formato.append('Usuario',this.Usuario);
                axios.post(serverurl,formato).then(function(response){
                    if(response.data==0 || response.data==null){
                        $.notify("El Usuario No Existe",'warn');
                    }else{
                        _this.Datos=response.data;
                        _this.ValidarUser();
                    }
                }).catch(function(error){
                    alert("Error "+error);
                })
       },
   },
   mounted:function(){
   }
})
})();