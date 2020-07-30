import {
    datos
} from "../validar/validacion.js";
(() => {
    var serverurlAjax = "ajax/paqueteriaAjax.php";
    var serverurl = "jsaxios/paqueteria/CrudProd.php";
    var UrlPeticionesAjax="ajax/puestosAjax.php";
    var app = new Vue({
        el: '#AppProd',
        data: {
            nameapp: 'tarea vue.js',
            ProdServ: [],
            ListaPquete:[],
            ListaCate: [],
            ListaMotos: [],
            ListaDat:[],
            ListaTipoPaquete: [],
            Id: '',
            PrecioDes: '',
            PrecioPaq: '',
            PrecioT:0,
            PesoP:0,
            comboDestino:'',
            comboTipoPaqiuete:'',
            IdEmpleado:'',
            ElecionCal:0
        },
        methods: {
            Msconfirmacion: function () {
                swal({
                    title: 'MENSAJE DE CONFIRMACION !',
                    text: "Transaccion Exitoso...",
                    type: 'success',
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: ' OK...'
                }).then(function () {
                    window.location.href = "http://localhost/ProyectMoto/Moto-Taxi/paquete";
                });
            },
            ConvertFormData: function () {
                let _this=this;
                var parametros = new FormData();
                parametros.append("Datos",JSON.stringify(this.ProdServ));
                parametros.append('Opc','42');
                axios.post(serverurl, parametros).then(function (response) {
                    console.log(response.data);
                    if (response.data == 0) {
                        _this.Msconfirmacion();
                    }
                }).catch(function (error) {
                    alert("Error " + error);
                })
            },
            Verificar:function(){
                let cmTipo= document.getElementById("comboTipoPaquete");
                var Div=document.getElementById("IdPeso");
                var Idpeso=document.createElement("input");
                var label=document.createElement("label");
                var TipoPaquete=this.ListaTipoPaquete[cmTipo.selectedIndex-1].vchNombreTipoP;
                if(TipoPaquete!="Folders"){
                    label.classList.add("control-label");
                    label.innerText="Peso Paquete";
                    Idpeso.setAttribute("id", "IdPesoPaquete");
                    Idpeso.classList.add("form-control");
                    Div.appendChild(label);
                    Div.appendChild(Idpeso);
                    this.ElecionCal=1;
                }else{
                    while (Div.firstChild) {
                        Div.removeChild(Div.firstChild);
                    }
                    this.ElecionCal=0;
                }
                
            },
            CalcularTotla:function(){
                this.IdEmpleado=document.getElementById("IdUserEmp").value;
                let cmTipo= document.getElementById("comboTipoPaquete");
                let cmDes= document.getElementById("comboDestino");
                this.PrecioPaq=this.ListaMotos[cmTipo.selectedIndex-1].fltPrecio;
                this.PrecioDes=this.ListaTipoPaquete[cmDes.selectedIndex-1].fltPrecio;
                this.comboTipoPaqiuete=cmTipo.value;
                this.comboDestino=cmDes.value;
                if(this.ElecionCal==1){
                    this.PesoP=document.getElementById("IdPesoPaquete").value;
                    if(this.Peso>5){
                        let KilosExtra=this.Peso-5;
                        this.PrecioT=this.PrecioT+(KilosExtra*10)+this.PrecioDes+this.PrecioPaq;
                    }else{
                        this.PrecioT=this.PrecioT+this.PrecioPaq+this.PrecioDes;
                    }
                }else{
                    this.PrecioT=this.PrecioT+this.PrecioPaq+this.PrecioDes;
                }
            },
            EnviaDatos:function(e){
                e.preventDefault(e);
                this.ConvertFormData();
            },
            agregarTarea: function (e) {
                e.preventDefault(e);
                this.A_local();
               // this.CalcularTotla();
               
              /*  let cmDestino    = document.getElementById("comboDestino");
                let cmTipoPaquete=document.getElementById("comboTipoPaquete");

                let cmSocursalValue =cmSocursal.value;
                this.PrecioDes =this.ListaMotos[cmDestino.selectedIndex-1].fltPrecio;
                //this.PrecioPaq=
                alert("index "+selectedOption);
                //this.ConvertFormData();
                /*var formulario = document.getElementById("form-input");
                let cmSocursal = document.getElementById("comboSocursal").value;
                let mensaje = datos(formulario);
                if(mensaje){
                    if (cmSocursal != 0) {
                        if (this.Pass1 == this.Pass2) {
                            this.ConvertFormData();
                        } else {
                            $.notify("La contraseña no coiciden");
                        }
                        
                    } else {
                        $.notify("Debe selecionr Los combo Box");
                    }
                }*/
            },
            Eliminar:function(index){
                this.ProdServ.splice(this.ProdServ.indexOf(index),1);
            },
            Limpiar:function(){
                this.ListaPquete[0]='',
                this.ListaPquete[1]='',
                this.ListaPquete[2]='',
                this.ListaPquete[3]='',
                document.getElementById("comboTipoPaquete").selectedIndex=0;
                document.getElementById("comboDestino").selectedIndex=0;
                if(document.getElementById("IdPesoPaquete")){
                    document.getElementById("IdPesoPaquete").value='';
                }
            },
            A_local:function(iddes,idTipo){
                this.CalcularTotla();
                this.ProdServ.push({
                    "TelefonoR":this.ListaPquete[0],
                    "NombreDest":this.ListaPquete[1],
                    "TelefonoDest":this.ListaPquete[2],
                    "Fecha":this.ListaPquete[3],
                    "IdDestino":this.comboDestino,
                    "IdTipoPaquete":this.comboTipoPaqiuete,
                    "Total":this.PrecioT,
                    "IdEmp":this.IdEmpleado,
                    "PesoP":this.PesoP
                });
                this.ListaDat=this.ProdServ;
                console.log(this.ProdServ);
                this.Limpiar();
            },
            CosultaDatos: function () {
                let formato = new FormData();
                let _this = this;
                formato.append('Opc', "14");
                axios.post(serverurl, formato).then(function (response) {
                    _this.ListaCate = response.data;
                }).catch(function (error) {
                    alert("Error " + error);
                })
            },
            ConsultaDestinos: function () {
                let formato = new FormData();
                let _this = this;
                formato.append('Opc', "20");
                axios.post(serverurl, formato).then(function (response) {
                    _this.ListaMotos = response.data;
                }).catch(function (error) {
                    alert(error);
                })
            },
            ConsultaTipoPaquete: function () {
                let formato = new FormData();
                let _this = this;
                formato.append('Opc', "9");
                axios.post(serverurl, formato).then(function (response) {
                    _this.ListaTipoPaquete = response.data;
                }).catch(function (error) {
                    alert(error);
                })
            }
        },
        mounted: function () {
            this.CosultaDatos();
            this.ConsultaDestinos();
            this.ConsultaTipoPaquete();
        }
    })
})();