    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Economo
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
                        <a href="<?php echo base_url();?>mantenimiento/economo/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Economo</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th>Ci</th>
                                    <th>Grado</th>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>

                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($economo)):?>
                                    <?php foreach($economo as $economo):?>
                                        <tr>
                                            <td><?php echo $economo->ci_eco;?></td>
                                            <td><?php echo $economo->grado_e;?></td>
                                            <td><?php echo $economo->apellido_e;?></td>
                                            <td><?php echo $economo->nombre_e;?></td>
                                            <td><?php if($economo->estado_e==1){
                                                    echo "Activo";
                                            }else echo "Inactivo";?></td>

    <?php $dataeconomo = $economo->ci_eco."*".$economo->apellido_e."*".$economo->nombre_e."*".$economo->grado_e."*".$economo->estado_e;?>
                                           

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-economo" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataeconomo?>">
                                                      <span class="fa fa-search"></span>
                                                    </button>

                                                    <a href="<?php echo base_url()?>mantenimiento/economo/edit/<?php echo $economo->ci_eco;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                    <a href="<?php echo base_url();?>mantenimiento/economo/delete/<?php echo $economo->ci_eco;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
        <h4 class="modal-title">Informacion de Economo</h4>
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
