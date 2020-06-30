(()=>{
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
                window.location.href="http://localhost/pet/PET/prodservlist";
            });
       },
        Eliminar:function(id){
            event.preventDefault();
            var confirmar=confirm("¡ESTAS SEGURO DE ELIMINAR ¡");
            if(confirmar==true){
                let formato= new FormData();
                let serverurl="jsaxios/prodserv/CrudProd.php";
                let _this=this;
                formato.append("Opc",'3');
                formato.append("Id",id);
                axios.post(serverurl,formato).then(function(response){
                    console.log(response.data);
                    //_this.MsConfirmacion();
                }).catch(function(error){
                    alert("Error "+error);
                })
            }    
        },
        A_local:function(index){
            var data={
                "Id":this.ListaProd[index].vchIdproducto,
                "Nombre":this.ListaProd[index].vchNombre,
                "Desc":this.ListaProd[index].vchDescripcion,
                "Idcate":this.ListaProd[index].vchIdcategoria,
                "Precio":this.ListaProd[index].fltPrecio,
                "Imagen":this.ListaProd[index].vchImagen,
            };
            localStorage.setItem("data",JSON.stringify(data));
            window.location.href="http://localhost/pet/PET/prodservModifi";
        },
        Modi:function(id){
            this.A_local(id);
        },
        CosultaDatos:function(){
            let formato= new FormData();
            let serverurl="jsaxios/prodserv/CrudProd.php";
            let _this=this;
            formato.append('Opc',"2");
            axios.post(serverurl,formato).then(function(response){
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