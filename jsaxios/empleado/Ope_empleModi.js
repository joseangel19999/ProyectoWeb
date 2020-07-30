import {ValidaFrm1} from "../validar/validacion.js";
(()=>{
    var UrlPeticionesAjax="ajax/socursalAjax.php";
    var app = new Vue({
   el:'#app',
   data:{
       nameapp:'tarea vue.js',
       EmpleadoLista:[],
       ListaValida:[],
       Curp:'',
       Nombre:'',
       Dire:'',
       Telefono:'',
       Correo:''
   },
   methods:{
       Msconfirmacion:function(){
        swal({
            title: 'MENSAJE DE CONFIRMACION !',
            text: "Modificacion Exitosa...",
            type: 'success',
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: ' OK...'
         }).then(function () {
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/socursallist";
        });
       },
        ConvertFormData:function(id){
        let formato= new FormData();
        let _this=this;
        formato.append('Id',this.Curp);
        formato.append('Nombre',this.Nombre);
        formato.append('Direccion',this.Direccion);
        formato.append('Telefono',this.Telefono);
        formato.append('Correo',this.Correo);
        formato.append('Opc',"2");
        axios.post(UrlPeticionesAjax,formato).then(function(response){
            if(response.data=='1'){
             _this.Msconfirmacion();
            }
        }).catch(function(error){
            alert("Error "+error);
        })
    },
    Validacion:function(){
        this.ListaValida[0]=this.Curp;
        this.ListaValida[1]=this.Nombre;
        this.ListaValida[2]=this.Direccion;
        this.ListaValida[3]=this.Telefono;
        this.ListaValida[4]=this.Correo;
    },
        Modificar:function(e){
           e.preventDefault(e);
           let formulario=document.getElementById("form-input");
           let mensaje=ValidaFrm1(formulario);
           if(mensaje==true){
                this.ConvertFormData();
            }
       },
       CosultaDatos:function(){
        var datafromlocal=JSON.parse(localStorage.getItem("data"));
        this.Curp=datafromlocal.Curp;
        this.Nombre=datafromlocal.Nombre;
        this.Direccion=datafromlocal.Direccion;
        this.Telefono=datafromlocal.Telefono;
        this.Correo=datafromlocal.Correo;  
    }
   },
   mounted:function(){
    this.CosultaDatos();
   
   }
})
})();