import {datos} from "../validar/validacion.js";
(()=>{
    var serverurl="jsaxios/prodserv/CrudProd.php";
    var UrlPeticionesAjax="ajax/EmpleadoAjax.php";
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
       ProdServ:[],
       seleccione:'-Seleccione-',
       ListaCate:[],
       ListaDatos:[],
       listaCateArea:[],
       nomSocursal:'',
       IdCateSocursal:'',
       Id:'',
       iss:'3',
       IdCatePuesto:'',
       idcate2:'',
       Nombre:'',
       Apellidos:'',
       Telefono:'',
       Direccion:'',
       Correo:'',
       Usuario:'',
       NombrePuesto:'',
       Password1:'',
       Password2:'',
       IdCateArea:'',
       nomCateArea:'',
       cate:'',
       miMapa:null,
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
                window.location.href="http://localhost/ProyectMoto/Moto-Taxi/prodservlist";
            });
       },
       Validar:function(){
           this.ProdServ[0]=this.Nombre_P;
           this.ProdServ[1]=this.Precio_P;
           this.ProdServ[2]=this.Desc_P;
           this.ProdServ[3]=this.Imagen_P;
       },
       ConvertFormData:function(){
        var _this=this;
        var parametros=new FormData($("#form-input")[0]);
        parametros.append('Opc','2');
        parametros.append('IdEmp',_this.Id);
        axios.post(UrlPeticionesAjax,parametros).then(function(response){
            if(response.data>=0){
                _this.Msconfirmacion();
            }
        }).catch(function(error){
            alert("Error "+error);
        })
       },
       Modificar:function(e){
           e.preventDefault(e);
           this.ConvertFormData();
           //let img=document.getElementById("foto").value;
             
           /*let img=document.getElementById("foto").value;
           alert(" imagen r "+img);*/
          /* let formulario=document.getElementById("form-input");
           let cm=document.getElementById("combo").options[select.selectedIndex];
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
                $.notirefy("Campos vacios");
            }  */
       },
       modificarEmpleado:function(e){
        e.preventDefault(e);
        let _this=this;
        let cmPuesto=document.getElementById("combo").value;
        let cmArea=document.getElementById("comboArea").value;
        let cmASocursal=document.getElementById("comboSocursal").value;
            //console.log(this.miMapa.get("jose"));
            if(cmPuesto==this.seleccione){
                alert("seleccione combo ");
            }else{
                if(cmArea==this.seleccione){
                    alert("seleccione combo area ");
                }else{
                    _this.ConvertFormData();
                }
            }
        },
       CosultaDatos:function(){
            var datafromlocal=JSON.parse(localStorage.getItem("data"));
            this.Id=datafromlocal.Id;
            this.IdCatePuesto=datafromlocal.Id;
            this.idcate2=datafromlocal.Idcate;
            this.NomPuesto=datafromlocal.nomPuesto;
            this.IdCateArea=datafromlocal.IdArea;
            this.nomCateArea=datafromlocal.nomArea;
            this.nomSocursal=datafromlocal.nomSocursal,
            this.IdCateSocursal=datafromlocal.IdSocursal
        },
        CosultaDatosEmpleado:function(){
            let formato= new FormData();
            let _this=this;
            formato.append('Opc',"10");
            formato.append('Id',_this.Id);
            axios.post(UrlPeticionesAjax,formato).then(function(response){
                console.log(response.data);
                _this.IdCate=response.data[0].chIdPuesto;
                _this.ListaDatos=response.data;
            }).catch(function(error){
                alert("Error "+error);
            })
        },
        CargarcomboPuesto:function(){
            this.miMapa= new Map();
            let formato= new FormData();
            let _this=this;
            formato.append('Opc',"5");
            formato.append('Idcate',_this.idcate2);
            axios.post(serverurl,formato).then(function(response){
                _this.ListaCate=response.data;
               /* alert(response.data.length);
                if(response.data.length>=0){
                    alert();
                    for(let i=0;i<response.data.length;i++){
                        _this.miMapa.set(response.data[i].vchNomPuesto,response.data[i].chIdPuesto);
                    }
                    _this.miMapa.set(_this.NomPuesto,_this.idcate2);
                    
                }*/
                //_this.ListaCate[2]={"vchIdcategoria":"0","vchNombre":"Elige Categoria"};
            }).catch(function(error){
                alert("Error "+error);
            })
       }, CargarcomboArea:function(){
        this.miMapa= new Map();
        let formato= new FormData();
        let _this=this;
        formato.append('Opc',"8");
        formato.append('Idarea',_this.IdCateArea);
        axios.post(serverurl,formato).then(function(response){
            _this.listaCateArea=response.data;
            //_this.ListaCate[2]={"vchIdcategoria":"0","vchNombre":"Elige Categoria"};
        }).catch(function(error){
            alert("Error "+error);
        })
   },
    },
   mounted:function(){
    this.CosultaDatos();
    this.CosultaDatosEmpleado();
    this.CargarcomboPuesto();
    this.CargarcomboArea();
   }
})
})();