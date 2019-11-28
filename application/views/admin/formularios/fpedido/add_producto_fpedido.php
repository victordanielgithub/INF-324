
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Nuevo al Pedido</small>
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
                        <form action="<?php echo base_url();?>formularios/guardar_producto" method="POST">
                            
                            <div class="form-group">
                                <label for="nombre">Nro Formulario Pedido:</label>
                                <input type="text" class="form-control" id="id_fp" readonly="readonly" name="id_fp" value="<?php echo $id_form?>">
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad">
                            </div>
                              <div class="form-group">
                                <label for="unidad">Unidad:</label>
                                
                                 <select name="unidad" >
                                       <option value="Amarros">Amarros</option> 
                                       <option value="Cargas">Cargas</option>
                                       <option value="QQ">QQ</option> 
                                       <option value="Cajas">Cajas</option> 
                                    </select>
                            </div>

                             <div class="form-group">
                                <label for="id_producto">Descripcion del Producto:</label>
                                <select name="id_producto" id="id_producto" class="form-control">
                                    <?php foreach($productos as $producto):?>
                                        <option value="<?php echo $producto->id_producto?>"><?php echo $producto->descripcion;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="observacion">Observacion:</label>
                                <input type="text" class="form-control" id="observacion" name="observacion">
                            </div>
                         <!--   
                            <button type="submit"  class="btn btn-success btn-danger" onClick="<?php echo base_url();?>formularios/listar_pedido/<?php echo $pedido->id_fp;?>">Cancelar </button>
                         -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>

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
