(()=>{
    var app = new Vue({
   el:'#app',
   data:{
       nameapp:'tarea vue.js',
       Empleados:[],
       Empleado:[],
       EmpleadoLista:[],
   },
   methods:{
       ConvertFormData:function(){
           event.preventDefault();
        let formato= new FormData();
        let serverurl="jsaxios/cliente/Crud.php";
        let _this=this;
        formato.append('Curp',this.Empleado[0]);
        formato.append('Nombre',this.Empleado[1]);
        formato.append('Apepa',this.Empleado[2]);
        formato.append('Apema',this.Empleado[3]);
        formato.append('Telefono',this.Empleado[4]);
        formato.append('Cargo',this.Empleado[5]);
        formato.append('Direccion',this.Empleado[6]);
        formato.append('Usuario',this.Empleado[7]);
        formato.append('Password',this.Empleado[8]);
        formato.append('Opc',"1");
        axios.post(serverurl,formato).then(function(response){
            console.log(response.data);
         if(response.data==1){
           _this.MsConfirmacion();
        }
        }).catch(function(error){
            alert("Error "+error);
        })
    },
       agregarTarea:function(e){
           e.preventDefault(e);
           let che=false;
           for(let i=0; i<10; i++){
               if(this.Empleado[i]=='' || this.Empleado[i]==null || this.Empleado[i].trim().length<=0){
               che=true;
               }
           }
           if(che==false){
               if(this.Empleado[8]==this.Empleado[9]){
                this.ConvertFormData();
               }else{
                $.notify("Contraseña no Coinciden");
               }

           }else{
               $.notify("Campos vacios");
           }
       },
       MsConfirmacion:function(){	
            swal({
                title: 'MENSAJE DE CONFIRMACION !',
                text: "Registro Exitoso...",
                type: 'success',
                confirmButtonColor: '#03A9F4',
                cancelButtonColor: '#F44336',
                confirmButtonText: ' OK...'
            }).then(function () {
                window.location.href="http://localhost/pet/PET/sociolist";
            });
       },
       CosultaDatos:function(){
            let formato= new FormData();
            let serverurl="jsaxios/cliente/Crud.php";
            let _this=this;
            formato.append('Opc',"2");
            axios.post(serverurl,formato).then(function(response){
            alert(response.data);
            if(response.data=='1'){
                _this.EmpleadoLista=response.data;
                }
            }).catch(function(error){
                alert("Error "+error);
            })
       },
   },
   mounted:function(){
   }
})
})();