
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuario
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/usuarios/store" method="POST">

                            <div class="form-group">
                                <label for="ci">Ci:</label>
                                <input type="text" class="form-control" id="ci" name="ci">
                            </div>
                             <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos">
                            </div>
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres">
                            </div>
                           <div class="form-group">
                                <label for="gmail">Gmail:</label>
                                <input type="text" class="form-control" id="gmail" name="gmail">
                            </div>
                            <div class="form-group">
                                <label for="nomusuario">Usuario:</label>
                                <input type="text" class="form-control" id="nomusuario" name="nomusuario">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="grado">Grado:</label>
                                <input type="text" class="form-control" id="grado" name="grado">
                            </div>
                             <div class="form-group">
                                <label for="rol">Rol_id:</label>
                                <input type="text" class="form-control" id="rol" name="rol">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
