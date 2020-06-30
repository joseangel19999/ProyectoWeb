$(document).ready(function(){

	$('.btn-sideBar-SubMenu').on('click', function(e){
		e.preventDefault();
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.zmdi-caret-down');
		if(SubMenu.hasClass('show-sideBar-SubMenu')){
			iconBtn.removeClass('zmdi-hc-rotate-180');
			SubMenu.removeClass('show-sideBar-SubMenu');
		}else{
			iconBtn.addClass('zmdi-hc-rotate-180');
			SubMenu.addClass('show-sideBar-SubMenu');
		}
	});
	$('.btn-menu-dashboard').on('click', function(e){
		e.preventDefault();
		var body=$('.dashboard-contentPage');
		var sidebar=$('.dashboard-sideBar');
		if(sidebar.css('pointer-events')=='none'){
			body.removeClass('no-paddin-left');
			sidebar.removeClass('hide-sidebar').addClass('show-sidebar');
		}else{
			body.addClass('no-paddin-left');
			sidebar.addClass('hide-sidebar').removeClass('show-sidebar');
		}
	});

	//peticion ajax del catalogo socursal
	$('.FormularioAjax').submit(function(e){
		e.preventDefault();
		var form=$(this);
		var tipo=form.attr('data-form');
		var accion=form.attr('action');
		var metodo=form.attr('method');
		var respuesta=form.children('.RespuestaAjax');
		var msjError="<script> swal('Ocurrio un Error','Porfavor Recarge la Pagina','error'); </script>";
		//realiza un arreglo de los datos que se va a enviar
		var formdata=new FormData(this);
		var textoAlerta;
		if(tipo=="save"){
			textoAlerta="Los datos que enviaras se guardaran en el siestema";
		}else if(tipo=="delete"){
			textoAlerta="Los datos se eliminaran completamente del sistema";

		}else if(tipo=="update"){
			textoAlerta="Los datos seran actualizados en el sistema";
		}else{
			textoAlerta="Quieres hacer la solicitud ?";
		}
		swal({
			title:"Estas seguro ?",
			text:textoAlerta,
			type:"question",
			showCancelButton:true,
			confirmButtonText:"Aceptar",
			cancelButtonText:"Cancelar"
		}).then(function(){
			$.ajax({
				type:metodo,
				url:"http://localhost/pet/PET/ajax/administradorAjax.php",
				data:formdata ? formdata : formdata.serialize(),
				cache: false,
				contentType:false,
				processData:false,
				success:function(data){
					alert(data);
					//respuesta.html(data);
				},error:function(xhr, ajaxOptions, thrownError){
					//console.log(xhr);
					 //alert(xhr);
					//console.log(e.data);
					//respuesta.html(msjError);
				}
			})

		});

	});
});
(function($){
    $(window).on("load",function(){
        $(".dashboard-sideBar-ct").mCustomScrollbar({
        	theme:"light-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
        $(".dashboard-contentPage, .Notifications-body").mCustomScrollbar({
        	theme:"dark-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
    });
})(jQuery);