        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU NAVEGACION</li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Mantenimiento</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/categorias"><i class="fa fa-circle-o"></i> Almacenes</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/productos"><i class="fa fa-circle-o"></i> Productos</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/Administrador"><i class="fa fa-circle-o"></i> Administrador</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/economo"><i class="fa fa-circle-o"></i> Economo</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/director"><i class="fa fa-circle-o"></i> Director</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/cocinero"><i class="fa fa-circle-o"></i> Cocinero</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/proveedor"><i class="fa fa-circle-o"></i> Proveedor</a></li>
                   
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share-alt"></i> <span>Movimientos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>formularios/list_pedido"><i class="fa fa-circle-o"></i>Listado Pedidos</a></li>
                            <li><a href="<?php echo base_url();?>formularios/list_entrega_eco"><i class="fa fa-circle-o"></i>Actas Entrega Economo</a></li>
                            <li><a href="<?php echo base_url();?>formularios/list_recepcion_prod"><i class="fa fa-circle-o"></i>Actas Recepcion Producto</a></li>
                            <li><a href="<?php echo base_url();?>formularios/list_entrega_cocina"><i class="fa fa-circle-o"></i>Actas Entrega Cocina</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->