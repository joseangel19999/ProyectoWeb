import {ValidaFrm1} from "../validar/validacion.js";
(()=>{
    var serverurl="jsaxios/area_trabajo/Crud.php";
    var serverurlAjax="ajax/areaAjax.php";
    var UrlArea="http://localhost/ProyectMoto/Moto-Taxi/"
    var app = new Vue({
   el:'#AppModiE',
   data:{
       nameapp:'tarea vue.js',
       EmpleadoLista:[],
       Id:'',
       NombreArea:'',
       Descripcion:''
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
            window.location.href=UrlArea+"arealist";
        });
       },
        ConvertFormData:function(id){
        let formato= new FormData();
        let _this=this;
        formato.append('Id',this.Id);
        formato.append('NombreArea',this.NombreArea);
        formato.append('Descripcion',this.Descripcion);
        formato.append('Opc',"3");
        axios.post(serverurlAjax,formato).then(function(response){
            if(response.data=='1'){
             _this.Msconfirmacion();
            }
        }).catch(function(error){
            alert("Error "+error);
        })
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
        console.log(datafromlocal);
        this.Id=datafromlocal.Id;
        this.NombreArea=datafromlocal.NombreArea;
        this.Descripcion=datafromlocal.Descripcion;
    }
   },
   mounted:function(){
    this.CosultaDatos();
   }
})
})();