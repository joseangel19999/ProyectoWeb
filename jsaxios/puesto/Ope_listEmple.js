(()=>{
    var UrlPeticionesAjax="ajax/puestosAjax.php";
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
                window.location.href="http://localhost/ProyectMoto/Moto-Taxi/puestolist";
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
                "Id":this.EmpleadoLista[index].chIdPuesto,
                "Salario":this.EmpleadoLista[index].fltSalario,
                "Nombre":this.EmpleadoLista[index].vchNomPuesto,
                "Descripcion":this.EmpleadoLista[index].vchDescPuesto,
            }
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href="http://localhost/ProyectMoto/Moto-Taxi/puestoModifi";
        },
        Modi:function(dato){
            let _this=this;
            console.log(this.EmpleadoLista);
            this.A_Local(dato);       
        },
       CosultaDatos:function(){
        let formato= new FormData();
        let _this=this;
        formato.append('Opc',"4");
        axios.post(UrlPeticionesAjax,formato).then(function(response){
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