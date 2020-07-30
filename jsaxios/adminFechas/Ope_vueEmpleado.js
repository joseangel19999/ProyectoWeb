import {ValidaFrm1} from "../validar/validacion.js";
(()=>{
    let serverurl="ajax/destinoAjax.php";
    var serverurlInsert = "jsaxios/adminFechas/Crud.php";
    var app = new Vue({
   el:'#app',
   data:{
       nameapp:'tarea vue.js',
       Empleados:[],
       Empleado:[],
       ListaPuesto:[],
       EmpleadoLista:[],
       Idpuesto:null,
       Fecha:'',
       TipoP:'',
       NomP:'',
       Valida:false
   },
   methods:{
       Msconfirmacion:function(){
        swal({
            title: 'MENSAJE DE CONFIRMACION !',
            text: "Actualizacion de Fecha Exitosa...",
            type: 'success',
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: ' OK...'
         }).then(function () {
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/AdminFechas";
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
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/AdminFechas";
        });
       },
       ConvertFormData:function(){
        let formato= new FormData();
        let _this=this;
        formato.append('Id',this.TipoP);
        formato.append('Fecha',this.Fecha);
        formato.append('NombreP',this.NomP);
        formato.append('Opc',1);
        axios.post(serverurlInsert,formato).then(function(response){
            alert(response.data);
            console.log(response.data);
            if(response.data>=1){
                _this.Msconfirmacion();
            }
        }).catch(function(error){
            alert("Error "+error);
        });
    },
       agregarTarea:function(e){
           e.preventDefault(e);
           this.TipoP=document.getElementById("comboSocursal").value;
           if(document.getElementById("comboSocursal").selectedIndex>1 && this.TipoP!='Cliente'  && this.TipoP!='Todos'){
            this.NomP=this.ListaPuesto[document.getElementById("comboSocursal").selectedIndex-2].vchNomPuesto; 
           }else if(this.TipoP=='Cliente'){
            this.NomP=document.getElementById("comboSocursal").value;
           }else if(this.TipoP=='Todos'){
            this.NomP=document.getElementById("comboSocursal").value;
           }
           alert("datos de fechas "+this.TipoP+" tipo "+this.NomP);
           this.ConvertFormData();
           /*let formulario=document.getElementById("form-input");
           let mensaje=ValidaFrm1(formulario);
           if(mensaje==true){
                this.ConvertFormData();
            }*/
       },
       CosultaDatos:function(){
        let formato= new FormData();
        let _this=this;
        formato.append('Opc',"2");
        axios.post(serverurlInsert,formato).then(function(response){
        _this.ListaPuesto=response.data;
        }).catch(function(error){
            alert("Error "+error);
        })
    }
   },
   mounted:function(){
       this.CosultaDatos();
   }
})
})();