<script>
    $(document).ready(function() {
        $('.btn-exit-system').on('click', function(e) {
            e.preventDefault();
            var Token=$(this).attr('href');
            swal({
                title: 'Quieres Salir del Sistema?',
                text: "La session sera Cerrada ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#03A9F4',
                cancelButtonColor: '#F44336',
                confirmButtonText: 'Salir',
                cancelButtonText: 'Cancelar'
            }).then(function() {
                $.ajax({
                    url:'<?php echo serverurl; ?>ajax/loginAjax.php?Token='+Token,
                    success:function(response){
                        if(response=="true"){
                            window.location.href = "http://localhost/ProyectMoto/";
                        }else{
                            swal(
                                "Ocurrio un Errror",
                                "No se puede cerrar la Session",
                                "Intente de Nuevo"
                            );
                        }
                    }
                });
            });
        });
    });
</script>