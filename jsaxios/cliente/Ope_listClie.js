(()=>{
   var app = new Vue({
   el:'#app2',
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
        Confirmacion:function(mensaje){
            swal({
                title: 'MENSAJE DE CONFIRMACION !',
                text: mensaje,
                type: 'success',
                confirmButtonColor: '#03A9F4',
                cancelButtonColor: '#F44336',
                confirmButtonText: ' OK...'
             }).then(function () {
                window.location.href="http://localhost/pet/PET/sociolist";
            });
        },
        Eliminar:function(id){
            event.preventDefault();
            var confirmar=confirm("¡ESTAS SEGURO DE ELIMINAR ¡");
            if(confirmar==true){
                let formato= new FormData();
                let serverurl="jsaxios/cliente/Crud.php";
                let _this=this;
                formato.append("Opc",'3');
                formato.append("Curp",id);
                axios.post(serverurl,formato).then(function(response){
                    _this.Confirmacion("Eliminacion Exitoso...");
                }).catch(function(error){
                    alert("Error "+error);
                })
            }    
        },
        A_Local:function(index){
            var data={
                "Curp":this.EmpleadoLista[index].vchCurp,
                "Nombre":this.EmpleadoLista[index].vchNombre,
                "Apepa":this.EmpleadoLista[index].vchApePa,
                "Apema":this.EmpleadoLista[index].vchApeMa,
                "Telefono":this.EmpleadoLista[index].vchTelefono,
                "Correo":this.EmpleadoLista[index].vchCorreo,
                "Usuario":this.EmpleadoLista[index].vchUsuario,
                "Password":this.EmpleadoLista[index].vchPassword,
                "Direccion":this.EmpleadoLista[index].vchDireccion,
            }
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href="http://localhost/pet/PET/sociosModifi";
        },
        Modi:function(dato){
            this.A_Local(dato);
       },
       CosultaDatos:function(){
        let formato= new FormData();
        let serverurl="jsaxios/cliente/Crud.php";
        let _this=this;
        formato.append('Opc',"2");
        axios.post(serverurl,formato).then(function(response){
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