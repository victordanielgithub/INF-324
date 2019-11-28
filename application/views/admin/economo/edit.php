
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Economo
        <small>Editar</small>
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
                        <form action="<?php echo base_url();?>mantenimiento/economo/update" method="POST">
                            <input type="hidden" name="ci_eco" value="<?php echo $economo->ci_eco;?>">
                            <div class="form-group">
                                <label for="ci_eco">Ci_Eco:</label>
                                <input type="text" class="form-control" id="ci_eco" name="ci_eco" value="<?php echo $economo->ci_eco;?>"readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="grado_e">Grado:</label>
                                <input type="text" class="form-control" id="grado_e" name="grado_e" value="<?php echo $economo->grado_e;?>">
                            </div>
                            <div class="form-group">
                                <label for="apellido_e">Apellidos:</label>
                                <input type="text" class="form-control" id="apellido_e" name="apellido_e" value="<?php echo $economo->apellido_e;?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre_e">Nombres:</label>
                                <input type="text" class="form-control" id="nombre_e" name="nombre_e" value="<?php echo $economo->nombre_e;?>">
                            </div>

                            <div class="form-group">
                                <label for="estado_e">Estado:</label>
                                
                                 <select name="estado_e" value="<?php echo $economo->estado_e;?>">
                                       <option value="1">Activo</option> 
                                       <option value="0">Inactivo</option> 
                                    </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="submit"  class="btn btn-success btn-danger" onClick="<?php echo base_url();?>mantenimiento/economo/list">Cancelar </button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
            <!-- /.box-
<input type="text" class="form-control" id="estado" name="estado" value="<?php echo $usuario->estado;?>">
                body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
