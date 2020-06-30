(()=>{
    var serverurl="jsaxios/area_trabajo/Crud.php";
    var serverurlAjax="ajax/areaAjax.php";
    var UrlArea="http://localhost/ProyectMoto/Moto-Taxi/"
    var app = new Vue({
   el:'#AppProd',
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
                window.location.href=UrlArea+"arealist";
            });
        },
        Eliminar:function(id){
            var confirmar=confirm("¡ESTAS SEGURO DE ELIMINAR ¡");
            if(confirmar==true){
                let formato= new FormData();
                let _this=this;
                formato.append("Opc",'4');
                formato.append("Id",id);
                axios.post(serverurlAjax,formato).then(function(response){
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
            formato.append('Curp',Curp);
            formato.append('Nombre',Nombre);
            formato.append('Apepa',Apepa);
            formato.append('Apema',Apema);
            formato.append('Telefono',Tele);
            formato.append('Opc','4');
            axios.post(serverurl,formato).then(function(response){
             alert("MODIFICACION EXITOSO");
             window.location.href=UrlArea+"arealist";
            }).catch(function(error){
                alert("Error "+error);
            })
        },
        A_Local:function(index){
            var data={
                "Id":this.EmpleadoLista[index].chIdArea,
                "NombreArea":this.EmpleadoLista[index].vchNomArea,
                "Descripcion":this.EmpleadoLista[index].vchDescripcion,
            }
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href=UrlArea+"areaModifi";
        },
        Modi:function(dato){
            let _this=this;
            this.A_Local(dato);       
    },
       CosultaDatos:function(){
        let formato= new FormData();
        let _this=this;
        formato.append('Opc',"5");
        axios.post(serverurl,formato).then(function(response){
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