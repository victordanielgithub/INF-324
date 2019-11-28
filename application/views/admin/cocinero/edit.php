
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Cocinero
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
                        <form action="<?php echo base_url();?>mantenimiento/cocinero/update" method="POST">
                            <input type="hidden" name="ci_coci" value="<?php echo $cocinero->ci_coci;?>">
                            
                             <div class="form-group">
                                <label for="ci_coci">Ci:</label>
                                <input type="text" class="form-control" id="ci_coci" name="ci" value="<?php echo $cocinero->ci_coci;?>">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellidos:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $cocinero->apellido;?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombres:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $cocinero->nombre;?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="cargo">cargo:</label>
                                <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $cocinero->cargo;?>">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                
                                 <select name="estado" value="<?php echo $Cocinero->estado;?>">
                                       <option value="1">Activo</option> 
                                       <option value="0">Inactivo</option> 
                                    </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="submit"  class="btn btn-success btn-danger" onClick="<?php echo base_url();?>mantenimiento/cocinero/list">Cancelar </button>
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
