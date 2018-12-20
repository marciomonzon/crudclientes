<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>Gerenciamento de Clientes</h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <?php 
            if ($this->session->userdata("mensagem")) {
                echo $this->session->userdata("mensagem");
                $this->session->unset_userdata("mensagem");
            }
        ?>

        <div class="box box-solid">
            <div class="box-body form-inline">

                <div class="form-group">
                    <?php echo anchor('cliente/frmNovoCliente', 'Novo Cliente', array('class' => 'btn btn-primary'));?>
                    <?php echo anchor('cliente/', 'Voltar a Pesquisa', array('class' => 'btn btn-success'));?>
                </div>
            
            </div>
        </div>

        
        <div class="box box-solid">

            <div class="box-header with-border">
                <i class="fa fa-cogs"></i>
                <h3 class="box-title">Cliente Encontrado</h3>
            </div>
            <div class="box-body">

                 <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>CPF/CNPJ</th>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($cliente)){?>
                                
                                <?php

                                    $tipo = '';
                                    if($cliente->tipo == 'J') $tipo = 'JURIDICO';
                                    if($cliente->tipo == 'F') $tipo = 'FISICO';

                                    $sexo = '';
                                    if($cliente->sexo == 'M') $sexo = 'MASCULINO';
                                    if($cliente->sexo == 'F') $sexo = 'FEMININO';
                                
                                ?>

                                <tr>
                                    <td><?php echo $tipo;?></td>
                                    <td><?php echo $cliente->cpfcnpj?></td>
                                    <td><?php echo $cliente->nome;?></td>
                                    <td><?php echo $sexo?></td>
                                    <td><?php echo $cliente->email?></td>
                                    <td><?php echo $cliente->telefone?></td>
                                    <td>

                                        <?php
                                            $clienteId = $cliente->clienteid;
                                            echo anchor('cliente/frmEditar/'.$clienteId, 'Editar', array('class' => 'btn btn-success'));
                                        ?>
                                    
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->