import {ValidaFrm1} from "../validar/validacion.js";
(()=>{
    let serverurl="ajax/destinoAjax.php";
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
       Msconfirmacion:function(){
        swal({
            title: 'MENSAJE DE CONFIRMACION !',
            text: "Registro Exitoso...",
            type: 'success',
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: ' OK...'
         }).then(function () {
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/destinolist";
        });
       },
       MsconfirError:function(){
        swal({
            title: 'ERROR AL REGISTRAR!',
            text: "Intente nuevamente el registro...",
            type: 'error',
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: ' OK...'
         }).then(function () {
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/destino";
        });
       },
       ConvertFormData:function(){
        let formato= new FormData();
        let _this=this;
        formato.append('Id',this.Empleado[0]);
        formato.append('Destino',this.Empleado[1]);
        formato.append('Precio',this.Empleado[2]);
        formato.append('Descripcion',this.Empleado[3]);
        formato.append('Opc',1);
        axios.post(serverurl,formato).then(function(response){
            if(response.data==1){
                _this.Msconfirmacion();
            }else{
                _this.MsconfirError();
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
                this.ConvertFormData();
            }
       }
   },
   mounted:function(){
   }
})
})();