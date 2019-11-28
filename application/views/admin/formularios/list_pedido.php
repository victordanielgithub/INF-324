
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Listado de Formularios de Pedido
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
                        <a href="<?php echo base_url();?>formularios/add_pedido" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Nuevo Pedido </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#Nro</th>
                                    <th>Por El Mes de: </th>
                                    <th>Fecha</th>
                                    <th>Motivo</th>
                                    <th>Destino</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($fpedidos)):?>
                                    <?php foreach($fpedidos as $pedido):?>
                                        <tr>
                                            <td><?php echo $pedido->id_fp;?></td>
                                            <td><?php echo $pedido->mes;?></td>
                                            <td><?php echo $pedido->fecha;?></td>
                                            <td><?php echo $pedido->motivo;?></td>
                                            <td><?php echo $pedido->destino;?></td>
                                            
                                            <?php $datapedido = $pedido->id_fp."*".$pedido->mes."*".$pedido->fecha."*".$pedido->motivo."*".$pedido->destino;?>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-producto" data-toggle="modal" data-target="#modal-default" value="<?php echo $datapedido;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>formularios/listar_pedido/<?php echo $pedido->id_fp;?>" class="btn btn-warning"><span class="fa fa-pencil">Listado Productos</span></a>
                                                   

                                                    <a href="<?php echo base_url();?>reportes/reportepdf/pdf/<?php echo $pedido->id_fp;?>" class="btn btn-success"><span class="fa fa-print">Generar Formulario</span></a>

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
