(()=>{
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
       Prod:[],
       ListaTaxista:[],
       activado:'',
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
                window.location.href="http://localhost/ProyectMoto/Moto-Taxi/taxistalist";
            });
       },
       llamarActivar:function(id){
        event.preventDefault();
        var confirmar;;
        if(this.activado==1){
            confirmar=confirm("¡ESTAS SEGURO DE DESACTIVARLO¡")
            if(confirmar==true){
                this.Activar(0,id);
            }
        }else{
            confirmar=confirm("¡ESTAS SEGURO DE ACTIVARLO¡")
            if(confirmar==true){
                this.Activar(1,id);
            }
        }
       },
       Activar:function(activo,id){
            let formato= new FormData();
            let serverurl="jsaxios/taxista/CrudProd.php";
            let _this=this;
            formato.append("Opc",'21');
            formato.append("Id",id);
            formato.append("Activo",activo);
            axios.post(serverurl,formato).then(function(response){
                window.location.href="http://localhost/ProyectMoto/Moto-Taxi/taxistalist";
            }).catch(function(error){
                alert("Error "+error);
            })
       },
        Eliminar:function(id){
            event.preventDefault();
            var confirmar=confirm("¡ESTAS SEGURO DE ELIMINAR ¡");
            if(confirmar==true){
                let formato= new FormData();
                let serverurl="jsaxios/taxista/CrudProd.php";
                let _this=this;
                formato.append("Opc",'3');
                formato.append("Id",id);
                axios.post(serverurl,formato).then(function(response){
                    _this.MsConfirmacion();
                }).catch(function(error){
                    alert("Error "+error);
                })
            }    
        },
        A_local:function(index){
            var data={
                "Id":this.ListaTaxista[index].iniIdClave,
            };
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/taxistaModifi";
           
        },
        Modi:function(id){
            this.A_local(id);
        },
        CosultaDatos:function(){
            let formato= new FormData();
            let serverurl="jsaxios/taxista/CrudProd.php";
            let _this=this;
            formato.append('Opc',"2");
            axios.post(serverurl,formato).then(function(response){
            _this.ListaTaxista=response.data;
            _this.activado=_this.ListaTaxista[0].chActivo;
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