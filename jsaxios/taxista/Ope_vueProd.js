import {
    datos
} from "../validar/validacion.js";
(() => {
    var UrlPeticionesAjax="ajax/motoTaxistaAjax.php";
    var app = new Vue({
        el: '#AppProd',
        data: {
            nameapp: 'tarea vue.js',
            ProdServ: [],
            ListaCate: [],
            ListaMotos: [],
            ListaSocursal: [],
            Id: '',
            Pass1: '',
            Pass2: ''
        },
        methods: {
            Msconfirmacion: function () {
                swal({
                    title: 'MENSAJE DE CONFIRMACION !',
                    text: "Registro Exitoso...",
                    type: 'success',
                    confirmButtonColor: '#03A9F4',
                    cancelButtonColor: '#F44336',
                    confirmButtonText: ' OK...'
                }).then(function () {
                    window.location.href = "http://localhost/ProyectMoto/Moto-Taxi/taxistalist";
                });
            },
            ConvertFormData: function () {
                let _this = this;
                var parametros = new FormData($("#form-input")[0]);
                parametros.append("Opc",'1');
                axios.post(UrlPeticionesAjax, parametros).then(function (response) {
                    if (response.data>=0) {
                        _this.Msconfirmacion();
                    }
                }).catch(function (error) {
                    alert("Error " + error);
                })
            },
            agregarTarea: function (e) {
                e.preventDefault(e);
                this.ConvertFormData();
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
            ConsultaAreaTrabajo: function () {
                let formato = new FormData();
                let _this = this;
                formato.append('Opc', "8");
                axios.post(UrlPeticionesAjax, formato).then(function (response) {
                    if(response.data!=null){
                        _this.ListaMotos = response.data;
                    }
                }).catch(function (error) {
                    alert(error);
                })
            },
            ConsultaSocursal: function () {
                let formato = new FormData();
                let _this = this;
                formato.append('Opc', "9");
                axios.post(UrlPeticionesAjax, formato).then(function (response) {
                    if(response.data!=null){
                        _this.ListaSocursal = response.data;
                    }
                }).catch(function (error) {
                    alert(error);
                })
            }
        },
        mounted: function () {
            this.ConsultaAreaTrabajo();
            this.ConsultaSocursal();
        }
    })
})();