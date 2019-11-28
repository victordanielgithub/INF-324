
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuario
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
                        <form action="<?php echo base_url();?>mantenimiento/usuarios/update" method="POST">
                            <input type="hidden" name="ci" value="<?php echo $usuario->ci_pol;?>">
                            <div class="form-group">
                                <label for="ci">Ci:</label>
                                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $usuario->ci_pol;?>"readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="grado">Grado:</label>
                                <input type="text" class="form-control" id="grado" name="grado" value="<?php echo $usuario->grado;?>">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellidos:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario->apellido;?>">
                            </div>
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario->nombre;?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $usuario->email;?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $usuario->username;?>">
                            </div>
                            <div class="form-group">
                                <label for="password">password:</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $usuario->password;?>">
                            </div>

                            <div class="form-group">
                                <label for="rol">Rol_id:</label>
                                <input type="text" class="form-control" id="rol" name="rol" value="<?php echo $usuario->rol_id;?>">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                
                                 <select name="estado" value="<?php echo $usuario->estado;?>">
                                       <option value="1">Activo</option> 
                                       <option value="0">Inactivo</option> 
                                    </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <button type="submit"  class="btn btn-success btn-danger" onClick="<?php echo base_url();?>mantenimiento/usuarios/list">Cancelar </button>
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
