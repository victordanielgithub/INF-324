    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        usuario
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row"> 
                   <div class="col-md-12">
                        <a href="<?php echo base_url();?>mantenimiento/usuarios/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Usuario</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ci</th>
                                    <th>Grado</th>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Password</th>                                    
                                    <th>Rol</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($usuarios)):?>
                                    <?php foreach($usuarios as $usuario):?>
                                        <tr>
                                            <td><?php echo $usuario->id;?></td>
                                            <td><?php echo $usuario->ci_pol;?></td>
                                            <td><?php echo $usuario->grado;?></td>
                                            <td><?php echo $usuario->apellido;?></td>
                                            <td><?php echo $usuario->nombre;?></td>
                                            <td><?php echo $usuario->email;?></td>
                                            <td><?php echo $usuario->username;?></td>
                                            <td><?php echo $usuario->password;?></td>
                                            <td><?php echo $usuario->rol_id;?></td>
                                            <td><?php if($usuario->estado==1){
                                                    echo "Activo";
                                            }else echo "Inactivo";?></td>

    <?php $datausuario = $usuario->ci_pol."*".$usuario->apellido."*".$usuario->nombre."*".$usuario->email."*".$usuario->username."*".$usuario->password."*".$usuario->rol_id."*".$usuario->estado;?>
                                           

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-usuario" data-toggle="modal" data-target="#modal-default" value="<?php echo $datausuario?>">
                                                      <span class="fa fa-search"></span>
                                                    </button>

                                                    <a href="<?php echo base_url()?>mantenimiento/usuarios/edit/<?php echo $usuario->ci_pol;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                    <a href="<?php echo base_url();?>mantenimiento/usuarios/delete/<?php echo $usuario->ci_pol;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                </div>
                                            </td>
                                        
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Categoria</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
