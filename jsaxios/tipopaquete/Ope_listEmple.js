(()=>{
    var UrlPeticionesAjax="ajax/TipoPaqueteAjax.php";
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
       Empleados:[],
       Empleado:[],
       TipoPaqueteLista:[],
       Acurp:'',
       Anombre:'',
       Apepa:'',
       Apema:'',
       Atele:''
   },
   methods:{
        Confirmacion:function(){
            swal({
                title: 'MENSAJE DE CONFIRMACION !',
                text: "Eliminacion Exitosa...",
                type: 'success',
                confirmButtonColor: '#03A9F4',
                cancelButtonColor: '#F44336',
                confirmButtonText: ' OK...'
             }).then(function () {
                window.location.href="http://localhost/ProyectMoto/Moto-Taxi/tipoPaquetelist";
            });
        },
        Eliminar:function(id){
            event.preventDefault();
            var confirmar=confirm("¡ESTAS SEGURO DE ELIMINAR ¡");
            if(confirmar==true){
                let formato= new FormData();
                let _this=this;
                formato.append("Opc",'4');
                formato.append("Id",id);
                axios.post(UrlPeticionesAjax,formato).then(function(response){
                    if(response.data=='1'){
                        _this.Confirmacion();
                    }
                }).catch(function(error){
                    alert("Error "+error);
                })
            }    
        },
        A_Local:function(index){
            var data={
                "Id":this.TipoPaqueteLista[index].chClaveTipoP,
                "Precio":this.TipoPaqueteLista[index].fltPrecio,
                "TipoPaquete":this.TipoPaqueteLista[index].vchNombreTipoP,
                "Descripcion":this.TipoPaqueteLista[index].vchDescripcion,
            }
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/tipoPaqueteModifi";
        },
        Modi:function(dato){
            let _this=this;
            console.log(this.EmpleadoLista);
            this.A_Local(dato);       
    },
       CosultaDatos:function(){
        let formato= new FormData();
        let _this=this;
        formato.append('Opc',"3");
        axios.post(UrlPeticionesAjax,formato).then(function(response){
         _this.TipoPaqueteLista=response.data;
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