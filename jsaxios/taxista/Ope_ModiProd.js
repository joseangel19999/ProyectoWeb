import {datos} from "../validar/validacion.js";
(()=>{
    var UrlPeticionesAjax="ajax/motoTaxistaAjax.php";
    var app = new Vue({
   el:'#AppProd',
   data:{
       nameapp:'tarea vue.js',
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
       Password2:''
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
                window.location.href="http://localhost/ProyectMoto/Moto-Taxi/taxistalist";
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
        var parametros=new FormData($("#form-input")[0]);
        parametros.append('Opc',"2");
        parametros.append('IdTaxista',_this.Id);
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
           //let img=document.getElementById("foto").value;
             
           /*let img=document.getElementById("foto").value;
           alert(" imagen r "+img);*/
           //let formulario=document.getElementById("form-input");
           //let cm=document.getElementById("comboSocursal").options[select.selectedIndex];
           //let mensaje=datos(formulario,cm,2);
           //if(mensaje==true){
            //alert("peticiones 22");
            this.ConvertFormData();
            //}
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
        _this.ConvertFormData();
        /* let cmPuesto=document.getElementById("combo").value;
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
            }*/
            
        },
       CosultaDatos:function(){
            var datafromlocal=JSON.parse(localStorage.getItem("data"));
            this.Id=datafromlocal.Id;
        },
        CosultaDatosTaxista:function(){
            let formato= new FormData();
            let _this=this;
            formato.append('Opc',"10");
            formato.append('Id',_this.Id);
            axios.post(UrlPeticionesAjax,formato).then(function(response){
                console.log(response.data);
                _this.ListaDatos=response.data;
                _this.Password1=_this.ListaDatos[0].vchPassword;
                _this.Password2=_this.ListaDatos[0].vchPassword;
            }).catch(function(error){
                alert("Error "+error);
            })
        }
    },
   mounted:function(){
    this.CosultaDatos();
    this.CosultaDatosTaxista();
   }

})
})();