
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Actas de Entrega del Producto Al Economo
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
                        <a href="<?php echo base_url();?>formularios/add_acta_entrega_eco" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Acta Entrega</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                           <thead>
                                <tr>
                                    <th>#Nro</th>
                                    <th>Fecha</th>
                                    <th>Unidad Academica</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($actas)):?>
                                    <?php foreach($actas as $acta):?>
                                        <tr>
                                            <td><?php echo $acta->id_acta;?></td>
                                            <td><?php echo $acta->fecha;?></td>
                                            <td>"ANAPOL"></td>   
                                           
                                            <td>
                                                <div class="btn-group">
                                                   
                                                    <a href="<?php echo base_url()?>formularios/edit/<?php echo $acta->id_acta;?>" class="btn btn-info"><span class="fa fa-pencil">Editar</span></a>
                                                      <a href="<?php echo base_url()?>formularios/listar_pedido/<?php echo $acta->id_pedido;?>" class="btn btn-warning"><span class="fa fa-pencil">Listado Productos</span></a>
                                                     <a href="<?php echo base_url();?>reportes/reportepdf/pdfentrega/<?php echo $acta->id_acta;?>" class="btn btn-success"><span class="fa fa-print">Generar Formulario</span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/productos/delete/<?php echo $acta->id_acta;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>

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
