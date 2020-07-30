(()=>{
    var serverurl="ajax/destinoAjax.php";
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
       Empleados:[],
       Empleado:[],
       DestinoLista:[],
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
                window.location.href="http://localhost/ProyectMoto/Moto-Taxi/destinolist";
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
                axios.post(serverurl,formato).then(function(response){
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
                "Id":this.DestinoLista[index].chClaveDestino,
                "Precio":this.DestinoLista[index].fltPrecio,
                "Destino":this.DestinoLista[index].vchNomDestino,
                "Descripcion":this.DestinoLista[index].vchDescripcion,
            }
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/destinoModifi";
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
        axios.post(serverurl,formato).then(function(response){
         _this.DestinoLista=response.data;
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