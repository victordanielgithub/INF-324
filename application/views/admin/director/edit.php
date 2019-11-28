
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Director
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
                        <form action="<?php echo base_url();?>mantenimiento/director/update" method="POST">
                            <input type="hidden" name="ci_direc" value="<?php echo $director->ci_direc;?>">
                            <div class="form-group">
                                <label for="ci_direc">Ci:</label>
                                <input type="text" class="form-control" id="ci_direc" name="ci_direc" value="<?php echo $director->ci_direc;?>"readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="grado_d">Grado:</label>
                                <input type="text" class="form-control" id="grado_d" name="grado_d" value="<?php echo $director->grado_d;?>">
                            </div>
                            <div class="form-group">
                                <label for="apellido_d">Apellidos:</label>
                                <input type="text" class="form-control" id="apellido_d" name="apellido_d" value="<?php echo $director->apellido_d;?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre_d">Nombres:</label>
                                <input type="text" class="form-control" id="nombre_d" name="nombre_d" value="<?php echo $director->nombre_d;?>">
                            </div>
                            

                            <div class="form-group">
                                <label for="estado_d">Estado:</label>
                                
                                 <select name="estado_d" value="<?php echo $director->estado_d;?>">
                                       <option value="1">Activo</option> 
                                       <option value="0">Inactivo</option> 
                                    </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="submit"  class="btn btn-success btn-danger" onClick="<?php echo base_url();?>mantenimiento/director/list">Cancelar </button>
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
