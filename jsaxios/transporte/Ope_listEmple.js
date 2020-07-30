(()=>{
    var UrlPeticionesAjax="ajax/transportesAjax.php";
    var app = new Vue({
   el:'#AppLista',
   data:{
       nameapp:'tarea vue.js',
       Empleados:[],
       Empleado:[],
       EmpleadoLista:[],
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
                _this.CosultaDatos();
            });
        },
        Eliminar:function(id){
            var confirmar=confirm("¡ESTAS SEGURO DE ELIMINAR ¡");
            if(confirmar==true){
                let formato= new FormData();
                let _this=this;
                formato.append("Opc",'3');
                formato.append("Id",id);
                axios.post(UrlPeticionesAjax,formato).then(function(response){
                    alert(response.data);
                    if(response.data=='1'){
                        _this.Confirmacion();
                    }
                }).catch(function(error){
                    alert("Error "+error);
                })
            }    
        },
        EditarSocio:function(Curp,Nombre,Apepa,Apema,Tele){
            let formato= new FormData();
            let _this=this;
            formato.append('Id',Curp);
            formato.append('Marca',Nombre);
            formato.append('Placa',Apepa);
            formato.append('Opc','4');
            axios.post(serverurl,formato).then(function(response){
             alert("MODIFICACION EXITOSO");
             window.location.href="http://localhost/ProyectMoto/Moto-Taxi/transportelist";
            }).catch(function(error){
                alert("Error "+error);
            })
        },
         A_Local:function(index){
            var data={
                "Id":this.EmpleadoLista[index].intIdMotoTaxi,
                "Marca":this.EmpleadoLista[index].vchMarca,
                "Nombre":this.EmpleadoLista[index].vchNombre,
                "Placa":this.EmpleadoLista[index].vchPlaca,
            }
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/transporteModifi";
        },
        Modi:function(dato){
            let _this=this;
            console.log(this.EmpleadoLista);
            this.A_Local(dato);       
    },
       CosultaDatos:function(){
        let formato= new FormData();
        let _this=this;
        formato.append('Opc',"10");
        axios.post(UrlPeticionesAjax,formato).then(function(response){
            console.log(response.data);
           _this.EmpleadoLista=response.data;
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