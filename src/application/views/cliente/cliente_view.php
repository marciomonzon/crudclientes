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

            <div class="box-header with-border">
            <i class="fa fa-cogs"></i>
            <h3 class="box-title"><strong>Pesquisar Cliente - Informe o CPF/CNPJ</strong></h3>
            </div>        
            <div class="box-body form-inline">

            <?php echo form_open('cliente/pesquisarCliente', array('id' => 'frmPesquisarCliente'))?>
                <div class="form-group">
                    <?php
                        echo form_label('CPF/CNPJ*: ', 'txtCpfCnpjPesquisa');
                        echo form_input('txtCpfCnpjPesquisa', '', array("class" => 'form-control', 'id' => 'txtCpfCnpjPesquisa', 'maxlength' => '14'));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_submit('pesquisar', 'Pesquisar', array('class' => 'btn btn-primary', 'id' => 'btnPesquisar'));?>
                </div>
                <div class="form-group">
                    <?php echo anchor('cliente/frmNovoCliente', 'Novo Cliente', array('class' => 'btn btn-success'));?>
                </div>
                <?php echo form_button('exportarexcel', 'Exportar para o Excel', array('class' => 'btn btn-default', 'id' => 'excelcliente')); ?>
            <?php echo form_close();?>
            
            </div>
        </div>

        
        <div class="box box-solid">

            <div class="box-header with-border">
                <i class="fa fa-cogs"></i>
                <h3 class="box-title">Clientes Cadastrados</h3>
            </div>
            <div class="box-body">

                 <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover tabelapaginada">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>CPF/CNPJ</th>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Email</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($clientes)){?>
                                <?php foreach($clientes as $cliente):?>
                                
                                <?php

                                    $tipo = '';
                                    if($cliente['tipo'] == 'J') $tipo = 'JURIDICO';
                                    if($cliente['tipo'] == 'F') $tipo = 'FISICO';

                                    $sexo = '';
                                    if($cliente['sexo'] == 'M') $sexo = 'MASCULINO';
                                    if($cliente['sexo'] == 'F') $sexo = 'FEMININO';
                                
                                ?>

                                <tr>
                                    <td><?php echo $tipo;?></td>
                                    <td><?php echo $cliente['cpfcnpj']?></td>
                                    <td><?php echo $cliente['nome'];?></td>
                                    <td><?php echo $sexo?></td>
                                    <td><?php echo $cliente['email']?></td>
                                    <td><?php echo $cliente['telefone']?></td>
                                </tr>
                                <?php endforeach;?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->


    <!-- PARA O EXCEL -->
    <div class="hide">
     <table class="table table-bordered table-striped table-hover" id="tabelaclientes">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>CPF/CNPJ</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Email</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($clientes)){?>
                <?php foreach($clientes as $cliente):?>
                
                <?php

                    $tipo = '';
                    if($cliente['tipo'] == 'J') $tipo = 'JURIDICO';
                    if($cliente['tipo'] == 'F') $tipo = 'FISICO';

                    $sexo = '';
                    if($cliente['sexo'] == 'M') $sexo = 'MASCULINO';
                    if($cliente['sexo'] == 'F') $sexo = 'FEMININO';
                
                ?>

                <tr>
                    <td><?php echo $tipo;?></td>
                    <td><?php echo $cliente['cpfcnpj']?></td>
                    <td><?php echo $cliente['nome'];?></td>
                    <td><?php echo $sexo?></td>
                    <td><?php echo $cliente['email']?></td>
                    <td><?php echo $cliente['telefone']?></td>
                </tr>
                <?php endforeach;?>
            <?php }?>
        </tbody>
    </table>
    </div>



</div>
<!-- /.content-wrapper -->

<script>
$(document).ready(function(){
   // somente numeros!!
   $('#txtCpfCnpjPesquisa').on('input', function(){
        this.value = this.value.replace(/\D/g,'');
    });
});

</script>