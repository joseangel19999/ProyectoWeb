import {ValidaFrm1} from "../validar/validacion.js";
(()=>{
    var UrlPeticionesAjax="ajax/transportesAjax.php";
    var app = new Vue({
   el:'#app',
   data:{
       nameapp:'tarea vue.js',
       Empleados:[],
       Empleado:[],
       ListaPuesto:[],
       EmpleadoLista:[],
       Idpuesto:null,
       Valida:false
   },
   methods:{
    Verpass1:function(){
            var txtpass1=document.getElementById("pass1");
                if(txtpass1.type=="password"){
                    txtpass1.type="text";
                }
                else{
                    txtpass1.type="password";
                }
       },
       Verpass2:function(){
        var txtpass2=document.getElementById("pass2");
            if(txtpass2.type=="password"){
                txtpass2.type="text";
            }
            else{
                txtpass2.type="password";
            }
       },
       Msconfirmacion:function(){
        swal({
            title: 'MENSAJE DE CONFIRMACION !',
            text: "Registro Exitoso...",
            type: 'success',
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: ' OK...'
         }).then(function () {
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/transportelist";
        });
       },
       ConvertFormData:function(){
        let formato= new FormData();
        let _this=this;
        formato.append('Id',this.Empleado[0]);
        formato.append('Nombre',this.Empleado[1]);
        formato.append('Marca',this.Empleado[2]);
        formato.append('Placa',this.Empleado[3]);
        formato.append('Opc',1);
        axios.post(UrlPeticionesAjax,formato).then(function(response){
            if(response.data==1){
                _this.Msconfirmacion();
            }
        }).catch(function(error){
            alert("Error "+error);
        })
    },
       agregarTarea:function(e){
           e.preventDefault(e);
           this.ConvertFormData();
         /*  let formulario=document.getElementById("form-input");
           let mensaje=ValidaFrm1(formulario);
           if(mensaje==true){
            //let mensaje2=ValidaFrm1(frm2);
                this.ConvertFormData();
            }*/
       },
       CosultaDatos:function(){
           /* let formato= new FormData();
            let serverurl="jsaxios/empleado/Crud.php";
            let _this=this;
            formato.append('Opc',"2");
            axios.post(serverurl,formato).then(function(response){
                _this.ListaPuesto=response.data;
            }).catch(function(error){
                alert("Error "+error);
            })*/
       },
   },
   mounted:function(){
       // this.CosultaDatos();
   }
})
})();