(()=>{
    //var UrlPeticionesAjax="ajax/puestosAjax.php";
    var serverurl="jsaxios/viajes/Lista.php";
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
       Empleados:[],
       Empleado:[],
       ListaViajes:[],
   },
   methods:{
       CosultaDatos:function(){
        let _this=this;
        axios.post(serverurl).then(function(response){
         _this.ListaViajes=response.data;
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