(()=>{

   var app = new Vue({
   el:'#AppModi',
   data:{
       nameapp:'tarea vue.js',
       ListaSocios:[],
       Curp:'',
       Nombre:'',
       Apepa:'',
       Apema:'',
       Dire:'',
       Telefono:'',
       Correo:'',
       Usuario:'',
       Password:'',
       Password2:'',
       ListaValida:[]
   },
   methods:{
       Msconfirmacion:function(){
        swal({
            title: 'MENSAJE DE CONFIRMACION !',
            text: "Modificacion Exitoso...",
            type: 'success',
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: ' OK...'
         }).then(function () {
            window.location.href="http://localhost/pet/PET/sociolist";
        });
       },
       Validacion:function(){
           this.ListaValida[0]=this.Curp;
           this.ListaValida[1]=this.Nombre;
           this.ListaValida[2]=this.Apepa;
           this.ListaValida[3]=this.Apema;
           this.ListaValida[4]=this.Direccion;
           this.ListaValida[5]=this.Telefono;
           this.ListaValida[6]=this.Correo;
           this.ListaValida[7]=this.Password;
           this.ListaValida[8]=this.Usuario;
       },
       Modificar:function(){
            this.Validacion();
            let che=false;
            for(let i=0; i<9; i++){
                if(this.ListaValida[i]=='' || this.ListaValida[i]==null || this.ListaValida[i].trim().length<=0){
                che=true;
                }
            }
            if(che==false){
                if(this.Password==this.Password2){
                    this.ConvertFormData();
                }
                else{
                    $.notify("Contraseña no coinciden");
                }
                
            }else{
                $.notify("Campos Vacios");
            }
       },
       ConvertFormData:function(){
        let formato= new FormData();
        let serverurl="jsaxios/cliente/Crud.php";
        let _this=this;
        formato.append('Curp',this.Curp);
        formato.append('Nombre',this.Nombre);
        formato.append('Apepa',this.Apepa);
        formato.append('Apema',this.Apema);
        formato.append('Direccion',this.Direccion);
        formato.append('Telefono',this.Telefono);
        formato.append('Correo',this.Correo);
        formato.append('Usuario',this.Usuario);
        formato.append('Password',this.Password);
        formato.append('Opc','4');
        console.log(formato);
        axios.post(serverurl,formato).then(function(response){
        if(response.data=='1'){
            _this.Msconfirmacion();
        }
        }).catch(function(error){
            alert("Error "+error);
        })
    },
       CosultaDatos:function(){
        var datafromlocal=JSON.parse(localStorage.getItem("data"));
        //this.ListaSocios=datafromlocal;
        this.Curp=datafromlocal.Curp;
        this.Nombre=datafromlocal.Nombre;
        this.Apepa=datafromlocal.Apepa;
        this.Apema=datafromlocal.Apema;
        this.Direccion=datafromlocal.Direccion;
        this.Usuario=datafromlocal.Usuario;
        this.Password=datafromlocal.Password;
        this.Password2=datafromlocal.Password;
        this.Telefono=datafromlocal.Telefono;
        this.Correo=datafromlocal.Correo;
    }
   },
   mounted:function(){
    this.CosultaDatos();
   }
})
})();