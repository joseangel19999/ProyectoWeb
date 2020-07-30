import {ValidaFrm1} from "../validar/validacion.js";
(()=>{
    var UrlPeticionesAjax="ajax/socursalAjax.php";
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
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/socursallist";
        });
       },
       ConvertFormData:function(){
        let formato= new FormData();
        let _this=this;
        formato.append('Id',this.Empleado[0]);
        formato.append('Nombre',this.Empleado[1]);
        formato.append('Direccion',this.Empleado[2]);
        formato.append('Telefono',this.Empleado[3]);
        formato.append('Correo',this.Empleado[4]);
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
           let formulario=document.getElementById("form-input");
           let mensaje=ValidaFrm1(formulario);
           if(mensaje==true){
            //let mensaje2=ValidaFrm1(frm2);
                this.ConvertFormData();
            }
       },
   },
   mounted:function(){
   }
})
})();