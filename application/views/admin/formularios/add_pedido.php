
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Formulario Pedido
        <small>Nuevo</small>
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
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error");?></p>                                
                             </div>
                        <?php endif;?>

                        <form action="<?php echo base_url();?>formularios/store" method="POST">
                            <div class="form-group">
                                <label for="fecha">fecha:</label>
                                 <input type="date" name="fecha" step="1" min="2019-01-01" max="2021-12-31" value="<?php echo date("Y-m-d");?>">
                            </div>
                            <div class="form-group">
                                <label for="mes">Por Mes de :</label>
                                 <select name="mes">
                                       <option value="enero">Enero</option> 
                                       <option value="febrero">Febrero</option> 
                                       <option value="Marzo">Marzo</option>
                                       <option value="Abrir">Abrir</option> 
                                       <option value="Mayo">Mayo</option> 
                                       <option value="Junio">Junio</option>
                                       <option value="Julio">Julio</option>
                                       <option value="Agosto">Agosto</option>
                                       <option value="Septiembre">Septiembre</option> 
                                       <option value="Octubre">Octubre</option>
                                       <option value="Noviembre">Noviembre</option>
                                       <option value="Diciembre">Diciempre</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="motivo">Motivo:</label>
                                <input type="text" class="form-control" id="motivo" name="motivo">
                            </div>
                            <div class="form-group">
                                <label for="destino">Destino:</label>
                                <input type="text" class="form-control" id="destino" name="destino">
                            </div>
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
