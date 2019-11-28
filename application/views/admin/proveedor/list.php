    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Proveedor
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
                        <a href="<?php echo base_url();?>mantenimiento/proveedor/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Proveedor</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Ci</th>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>                                   
                                    <th>Telefono</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($proveedor)):?>
                                    <?php foreach($proveedor as $proveedor):?>
                                        <tr>
                                            <td><?php echo $proveedor->ci_prov;?></td>
                                            <td><?php echo $proveedor->apellido;?></td>
                                            <td><?php echo $proveedor->nombre;?></td>
                                            <td><?php echo $proveedor->telefono;?></td>
                                            <td><?php if($proveedor->estado==1){
                                                    echo "Activo";
                                            }else echo "Inactivo";?></td>

    <?php $dataproveedor = $proveedor->ci_prov."*".$proveedor->apellido."*".$proveedor->nombre."*".$proveedor->telefono."*".$proveedor->estado;?>
                                           

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-proveedor" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataproveedor?>">
                                                      <span class="fa fa-search"></span>
                                                    </button>

                                                    <a href="<?php echo base_url()?>mantenimiento/proveedor/edit/<?php echo $proveedor->ci_prov;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                    <a href="<?php echo base_url();?>mantenimiento/proveedor/delete/<?php echo $proveedor->ci_prov;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
        <h4 class="modal-title">Informacion de Proveedor</h4>
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
