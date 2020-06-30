(()=>{
    var app = new Vue({
   el:'#app',
   data:{
       nameapp:'tarea vue.js',
       Empleados:[],
       Empleado:[],
       EmpleadoLista:[]
   },
   methods:{
       eliminarTarea:function(tarea){
           this.tareas.splice(this.tareas.indexOf(tarea),1);
       },
       ConvertFormData:function(){
        alert("hola");
        let formato= new FormData();
        let serverurl="Peticiones/Crud.php";
        let _this=this;
        formato.append('Curp',this.Empleado[0]);
        formato.append('Nombre',this.Empleado[1]);
        /*formato.append('Apepa',this.Empleado[2]);
        formato.append('Apema',this.Empleado[3]);
        formato.append('Telefono',this.Empleado[4]);
        formato.append('Direccion',this.Empleado[5]);
        formato.append('Correo',this.Empleado[6]);
        formato.append('Imagen',this.Empleado[7]);
        formato.append('Usuario',this.Empleado[8]);
        formato.append('Password',this.Empleado[9]);*/
        //axios.post(serverurl,formato).then(function(response){
            alert(response)
         /*if(response.data=='1'){
             swal.fire({
                  type: 'success',
                 title: 'Registro Exitoso', 
             });
             _this.CosultaDatos();
            }*/
        //}).catch(function(error){
            alert("Error "+error);
        //})
    },
       agregarTarea:function(e){
           e.preventDefault(e);
           alert("hola");
           /*let che=false;
           for(let i=0; i<6; i++){
               if(this.Empleado[i]=='' || this.Empleado[i]==null){
               che=true;
               }
           }
           if(che==false){*/
               this.ConvertFormData();
           /*}else{
               alert("Campos vacios");
           }*/
       },
       MostrarId:function(id){	
           let _this=this;
           swal.fire({
             title: 'Desea Eliminar ?',
             type: 'question',
           showCancelButton: true,
             confirmButtonColor: '#03A9F4',
             cancelButtonColor: '#F44336',
             confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, Salir!',
             cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
           }).then(function (result) {
               
               if(result.value){
               let formdata=new FormData();
               let serverurl="Peticiones/delete.php";
               formdata.append("Id",id);
               axios.post(serverurl,formdata).then(function(response){
                   _this.CosultaDatos();
               }).catch(function(error){
               alert("Error al eliminar"+error);
               });
               }
           });
       },
       CosultaDatos:function(){
           var serverurl="Peticiones/consulta.php";
           let _this=this;
           axios.get(serverurl).then(function(response){
           _this.EmpleadoLista=response.data;
           }).catch(function(error){
           alert("Error al cargar"+error);
       });
       },
       VerId:function(){
           alert("hola vue");
       },
      
   },
   mounted:function(){
       //this.CosultaDatos();
   }
})
})();