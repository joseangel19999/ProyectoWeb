import {datos} from "../validar/validacion.js";
(()=>{
    var serverurl="jsaxios/prodserv/CrudProd.php";
    var serverurlInsert="jsaxios/prodserv/Crud.php";
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
       ProdServ:[],
       ListaCate:[],
       ListaArea:[],
       Id:'',
       Pass1:'',
       Pass2:''
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
                window.location.href="http://localhost/pet/PET/prodservlist";
            });
       },
       ConvertFormData:function(){
            let _this=this;
            var serverurl="jsaxios/prodserv/crud.php";
            var parametros=new FormData($("#form-input")[0]);
            parametros.append('Id',this.Id);
            axios.post(serverurlInsert,parametros).then(function(response){
                alert(response.data);
                if(response.data==1){
                _this.Msconfirmacion();
                }
            }).catch(function(error){
                alert("Error "+error);
            })
       },
       agregarTarea:function(e){
           e.preventDefault(e);
           var formulario=document.getElementById("form-input");
           let cm=document.getElementById("combo").value;
           //let mensaje=datos(formulario,cm);
            if(this.Pass1==this.Pass2){
                this.ConvertFormData();
                }else{
                    $.notify("La contraseña no coiciden");
                }
           /*  if(mensaje==true){
                if(this.Pass1==this.Pass2){
                    this.ConvertFormData();
                }else{
                    $.notify("La contraseña no coiciden");
                }
               
            }*/
      },
       CosultaDatos:function(){
            let formato= new FormData();
            let _this=this;
            formato.append('Opc',"5");
            axios.post(serverurl,formato).then(function(response){
                _this.ListaCate=response.data;
            }).catch(function(error){
                alert("Error "+error);
            })
       },
       ConsultaAreaTrabajo:function(){
           let formato= new FormData();
           let _this=this;
           formato.append('Opc',"8");
           axios.post(serverurl,formato).then(function(response){
                _this.ListaArea=response.data;
           }).catch(function(error){
                alert(error);
           })
       }
   },
   mounted:function(){
    this.CosultaDatos();
    this.ConsultaAreaTrabajo();
    var datafromlocal=JSON.parse(localStorage.getItem("data2"));
    this.Id=datafromlocal.Idsocio;
   }
})
})();