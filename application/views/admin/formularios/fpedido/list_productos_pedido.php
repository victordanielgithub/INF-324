
<!-- /.modal *****************************************************************-->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Listado de Productos en Pedidos Nro: <?php echo $id_form;?>
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
                        <a href="<?php echo base_url();?>formularios/add_producto_fpedido/<?php echo $id_form;?>" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Productos al Pedido Nro: <?php echo $id_form;?></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Cantidad: </th>
                                    <th>Unidad</th>
                                    <th>Descripcion Producto</th>
                                    <th>Observacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($fpedidos)):?>
                                    <?php foreach($fpedidos as $pedido):?>
                                        <tr>
                                            
                                            <td><?php echo $pedido->cantidad;?></td>
                                            <td><?php echo $pedido->unidad;?></td>
                                            <td><?php echo $pedido->descripcion;?></td>
                                            <td><?php echo $pedido->observacion;?></td>
                                            
                                            <?php $datapedidoss = $pedido->id."*".$pedido->cantidad."*".$pedido->unidad."*".$pedido->descripcion."*".$pedido->observacion;?>
                                            <td>
                                                <div class="btn-group">
                                                   
                                                    <a href="<?php echo base_url();?>formularios/delete/<?php echo $pedido->id_fp;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
