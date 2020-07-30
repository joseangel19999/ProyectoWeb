import {ValidaFrm1} from "../validar/validacion.js";
(()=>{
    var serverurl="ajax/destinoAjax.php";
    var app = new Vue({
   el:'#AppModiE',
   data:{
       nameapp:'tarea vue.js',
       EmpleadoLista:[],
       ListaValida:[],
       Id:'',
       NombreP:'',
       DescripcionP:'',
       SalarioP:'',
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
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/destinolist";
        });
       },
        ConvertFormData:function(id){
        let formato= new FormData();
        let _this=this;
        formato.append('Id',this.Id);
        formato.append('Destino',this.NombreP);
        formato.append('Precio',this.SalarioP);
        formato.append('Descripcion',this.DescripcionP);
        formato.append('Opc',"2");
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
        this.ListaValida[3]=this.Telefono;
        this.ListaValida[4]=this.Correo;
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
        this.Id=datafromlocal.Id;
        this.NombreP=datafromlocal.Destino;
        this.SalarioP=datafromlocal.Precio;
        this.DescripcionP=datafromlocal.Descripcion;
    }
   },
   mounted:function(){
    this.CosultaDatos();
   }
})
})();