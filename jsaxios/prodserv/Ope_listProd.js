(()=>{
    var UrlPeticionesAjax="ajax/EmpleadoAjax.php";
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
       Prod:[],
       ListaProd:[],
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
                window.location.href="http://localhost/ProyectMoto/Moto-Taxi/prodservlist";
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
                "Id":this.ListaProd[index].intIdEmpleado,
                "Idcate":this.ListaProd[index].chIdPuesto,
                "nomPuesto":this.ListaProd[index].vchNomPuesto,
                "IdArea":this.ListaProd[index].chIdArea,
                "nomArea":this.ListaProd[index].vchNomArea,
                "IdSocursal":this.ListaProd[index].chIdSocursal,
                "nomSocursal":this.ListaProd[index].vchNombre
            };
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/empleadoModifi";
           
        },
        Modi:function(id){
            this.A_local(id);
        },
        CosultaDatos:function(){
            let formato= new FormData();
            let _this=this;
            formato.append('Opc','4');
            axios.post(UrlPeticionesAjax,formato).then(function(response){
            _this.ListaProd=response.data;
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