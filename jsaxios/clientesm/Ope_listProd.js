(()=>{
    var UrlPeticionesAjax="ajax/clienteAjax.php";
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
       Prod:[],
       ListaCliente:[],
       Acurp:'',
       Anombre:'',
       Apepa:'',
       Apema:'',
       Atele:''
   },
   methods:{
       MsConfirmacion:function(){
            swal({
                title: 'MENSAJE DE CONFIRMACION !',
                text: "Eliminado Exitosamente...",
                type: 'success',
                confirmButtonColor: '#03A9F4',
                cancelButtonColor: '#F44336',
                confirmButtonText: ' OK...'
            }).then(function () {
                window.location.href="http://localhost/ProyectMoto/Moto-Taxi/clientelist";
            });
       },
        Eliminar:function(id){
            event.preventDefault();
            var confirmar=confirm("¡ESTAS SEGURO DE ELIMINAR ¡");
            if(confirmar==true){
                let formato= new FormData();
                let _this=this;
                formato.append("Opc",'3');
                formato.append("Id",id);
                axios.post(UrlPeticionesAjax,formato).then(function(response){
                    _this.MsConfirmacion();
                }).catch(function(error){
                    alert("Error "+error);
                })
            }    
        },
        A_local:function(index){
            var data={
                "Id":this.ListaCliente[index].intIdCliente,
                "IdSocursal":this.ListaCliente[index].chIdSocursal,
                "nomSocursal":this.ListaCliente[index].vchNombre
            };
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/clienteModifi";
           
        },
        Modi:function(id){
            this.A_local(id);
        },
        CosultaDatos:function(){
            let formato= new FormData();
            let _this=this;
            formato.append('Opc',"4");
            axios.post(UrlPeticionesAjax,formato).then(function(response){
            _this.ListaCliente=response.data;
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