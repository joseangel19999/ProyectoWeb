import {datos} from "../validar/validacion.js";
(()=>{
    var serverurl="jsaxios/prodserv/CrudProd.php";
    var app = new Vue({
   el:'#AppModifi',
   data:{
       nameapp:'tarea vue.js',
       ProdServ:[],
       ListaCate:[],
       Id_P:'',
       Nombre_P:'',
       Precio_P:'',
       Desc_P:'',
       Id_P:'',
       Imagen_P:'',
       Imagen_P2:'',
       cate:'',
       NomPuesto:''
   },
   methods:{
       Msconfirmacion:function(){
            swal({
                title: 'MENSAJE DE CONFIRMACION !',
                text: "Se Modifico con Exitoso...",
                type: 'success',
                confirmButtonColor: '#03A9F4',
                cancelButtonColor: '#F44336',
                confirmButtonText: ' OK...'
            }).then(function () {
                window.location.href="http://localhost/pet/PET/prodservlist";
            });
       },
       Validar:function(){
           this.ProdServ[0]=this.Nombre_P;
           this.ProdServ[1]=this.Precio_P;
           this.ProdServ[2]=this.Desc_P;
           this.ProdServ[3]=this.Imagen_P;
       },
       ConvertFormData:function(){
        let _this=this;
        var serverurl="jsaxios/prodserv/ModifiProd.php";
        var parametros=new FormData($("#form-input")[0]);
        if(this.Imagen_P!=this.Imagen_P2){
            this.Imagen_P=this.Imagen_P2;
        }
        parametros.append('Img',this.Imagen_P);
        parametros.append('Id',this.Id_P);
        axios.post(serverurl,parametros).then(function(response){
            _this.Msconfirmacion();
        }).catch(function(error){
            alert("Error "+error);
        })
    },
    Modificar:function(e){
           e.preventDefault(e);
           //let img=document.getElementById("foto").value;
             
           /*let img=document.getElementById("foto").value;
           alert(" imagen r "+img);*/
           let formulario=document.getElementById("form-input");
           let cm=document.getElementById("combo").value;
           let mensaje=datos(formulario,cm,2);
           if(mensaje==true){
            alert("peticiones 22");
            this.ConvertFormData();
            }
           /*let cm=document.getElementById("combo").value;
           this.Validar();
           let che=false;
            for(let i=0; i<4; i++){
                if(this.ProdServ[i]=='' || this.ProdServ[i]==null){
                che=true;
                }
            }
            if(che==false){
                if(cm!=0){
                    this.ConvertFormData(cm);
                }
                else{
                $.notify("Selecione El tipo de Puesto");
                } 
            }else{
                $.notify("Campos vacios");
            }  */
       },
       Cargarcombo:function(){
            let formato= new FormData();
            let _this=this;
            formato.append('Opc',"5");
            axios.post(serverurl,formato).then(function(response){
                _this.ListaCate=response.data;
                _this.ListaCate[2]={"vchIdcategoria":"0","vchNombre":"Elige Categoria"};
            }).catch(function(error){
                alert("Error "+error);
            })
       },
       CosultaDatos:function(){
            var datafromlocal=JSON.parse(localStorage.getItem("data"));
            this.Id_P=datafromlocal.Id;
            this.Nombre_P=datafromlocal.Nombre;
            this.Precio_P=datafromlocal.Precio;
            this.Desc_P=datafromlocal.Desc;
            this.cate=datafromlocal.Idcate;
            this.Imagen_P=datafromlocal.Imagen;
           
            this.Imagen_P2=datafromlocal.Imagen;
            if(this.cate==1){
                this.NomPuesto="Servicio"
            }
            else if(this.cate==2){
                this.NomPuesto="Productos"
            }  
            console.log(datafromlocal);
        },
    },
   mounted:function(){
    this.CosultaDatos();
    this.Cargarcombo();
   }
})
})();