(()=>{
    var serverurl="jsaxios/prodserv/CrudProd.php";
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
       ProdServ:[],
       ListaCate:[],
       Id:''
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
            axios.post(serverurl,parametros).then(function(response){
                if(response.data==1){
                _this.Msconfirmacion();
                }
            }).catch(function(error){
                alert("Error "+error);
            })
       },
       agregarTarea:function(e){
           e.preventDefault(e);
           let cm=document.getElementById("combo").value;
           let che=false;
           for(let i=0; i<4; i++){
            if(this.ProdServ[i]=='' || this.ProdServ[i]==null){
            che=true;
            }
                }
                if(che==false){
                    if(cm!=0){
                        this.ConvertFormData(cm);
                    }
                    else{
                    alert("Selecione El tipo de Puesto");
                    } 
                }else{
                    alert("Campos vacios");
                }  
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
       }
   },
   mounted:function(){
    this.CosultaDatos();
    var datafromlocal=JSON.parse(localStorage.getItem("data"));
    this.Id=datafromlocal.Idsocio;
   }
})
})();