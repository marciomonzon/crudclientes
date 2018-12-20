<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menu de Navegação</li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/home" onclick="waitingDialog.show();">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Cadastros</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>index.php/cliente/"><i class="fa fa-circle-o"></i> Clientes</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>