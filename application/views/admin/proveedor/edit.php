
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Proveedor
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
                        <form action="<?php echo base_url();?>mantenimiento/proveedor/update" method="POST">
                            <input type="hidden" name="ci_prov" value="<?php echo $proveedor->ci_prov;?>">
                            <div class="form-group">
                                <label for="ci_prov">Ci:</label>
                                <input type="text" class="form-control" id="ci_prov" name="ci_prov" value="<?php echo $proveedor->ci_prov;?>"readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellidos:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $proveedor->apellido;?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombres:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $proveedor->nombre;?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="telefono">telefono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $proveedor->telefono;?>">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                
                                 <select name="estado" value="<?php echo $proveedor->estado;?>">
                                       <option value="1">Activo</option> 
                                       <option value="0">Inactivo</option> 
                                    </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="submit"  class="btn btn-success btn-danger" onClick="<?php echo base_url();?>mantenimiento/proveedor/list">Cancelar </button>
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
