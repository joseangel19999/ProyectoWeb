import {ValidaFrm1} from "../validar/validacion.js";
(()=>{
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
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/arealist";
        });
       },
       ConvertFormData:function(){
        let formato= new FormData();
        let serverurl="ajax/areaAjax.php";
        let _this=this;
        formato.append('Id',this.Empleado[0]);
        formato.append('NombreArea',this.Empleado[1]);
        formato.append('Descripcion',this.Empleado[2]);
        formato.append('Opc',1);
        axios.post(serverurl,formato).then(function(response){
            if(response.data=='1'){
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
                this.ConvertFormData();
            }
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