<script src="<?php echo serverurl; ?>vistas/js/notify.js"></script>
<div class="container-fluid">
    <div class="page-header">
        <div class="text-t full-box text-uppercase">CATALOGO DE PUESTOS</div>
    </div>
</div>
<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">
        <li>
            <a href="<?php echo serverurl; ?>empresa" class="btn botones">
                <i class="zmdi zmdi-plus ico"></i> &nbsp;NUEVO
            </a>
        </li>
        <li>
            <a href="<?php echo serverurl; ?>empresalist" class="btn botones">
                <i class="zmdi zmdi-format-list-bulleted ico"></i> &nbsp;LISTA
            </a>
        </li>
    </ul>
</div>

<!-- Panel nuevo cliente -->
<div id="AppProd">
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DE PUESTO</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="<?php echo serverurl;?>ajax/administradorAjax.php" id="form-input" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
                    <fieldset>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">DMI PUESTO*</label>
                                        <input  class="form-control" type="text" name="clavePuesto" required="" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre Puesto*</label>
                                        <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombrePuesto" required="" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Descripcion*</label>
                                        <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="descPuesto" required="" maxlength="30">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <?php
                    //require_once "./modelo/ModeloPuesto/modeloPuesto.php";
                   /* $registro = CtrPuesto::ctrRegistroPuesto();
                    if ($registro == "ok") {
                        echo '<script>
                                        if ( window.history.replaceState ) {
                                            window.history.replaceState( null, null, window.location.href );
                                        }
                                    </script>';
                        echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                    }*/
                    ?>
                    <br>
                    <p class="text-center" style="margin-top: 20px;">
                        <button type="submit" class="btn botones"><i class="zmdi zmdi-floppy ico"></i> Guardar</button>
                    </p>
                    <div class="RespuestaAjax" ></div>
                </form>
            </div>
        </div>
    </div>
</div>