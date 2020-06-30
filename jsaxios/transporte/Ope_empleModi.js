import {ValidaFrm1} from "../validar/validacion.js";
(()=>{
    var serverurl="jsaxios/transporte/Crud.php";
    var app = new Vue({
   el:'#AppModiE',
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
            window.location.href="http://localhost/pet/PET/transportelist";
        });
       },
        ConvertFormData:function(id){
        let formato= new FormData();
        let _this=this;
        formato.append('Id',this.Curp);
        formato.append('Marca',this.Nombre);
        formato.append('Placa',this.Direccion);
        formato.append('Opc',"4");
        axios.post(serverurl,formato).then(function(response){
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
    },
        Modificar:function(e){
           e.preventDefault(e);
           this.Validacion();
           let che=false;
           let formulario=document.getElementById("form-input");
           let mensaje=ValidaFrm1(formulario);
           if(mensaje==true){
                this.ConvertFormData();
            }
       },
       CosultaDatos:function(){
        var datafromlocal=JSON.parse(localStorage.getItem("data"));
        this.Curp=datafromlocal.Id;
        this.Nombre=datafromlocal.Marca;
        this.Direccion=datafromlocal.Placa; 
    }
   },
   mounted:function(){
    this.CosultaDatos();
   }
})
})();