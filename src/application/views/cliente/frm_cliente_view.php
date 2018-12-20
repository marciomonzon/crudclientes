<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>Cadastrar Cliente</h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <?php 
            if ($this->session->userdata("mensagem")) {
                echo $this->session->userdata("mensagem");
                $this->session->unset_userdata("mensagem");
            }
        ?>

        <?php //echo form_open('cliente/efetivarCliente', array('id' => 'frmEfetivarCliente'))?>
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-cogs"></i>
                <h3 class="box-title">Preencha os campos</h3>
            </div>
            <div class="box-body">

            <div class="row">
                <div class="form-group col-md-4">
                    <?php
                        echo form_label('Tipo Cliente:*', 'selTipoCliente');
                        echo form_dropdown('txtFoneCliente', $dropDownTipoCliente, '', array("class" => 'form-control obrigatorio', 'id' => 'selTipoCliente'));
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?php
                        echo form_label('Nome:*', 'txtNome');
                        echo form_input('txtNome', '', array("class" => 'form-control obrigatorio', 'id' => 'txtNome', 'maxlength' => '45'));
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?php
                        echo form_label('CPF/CNPJ:*', 'txtCpfCnpj');
                        echo form_input('txtCpfCnpj', '', array("class" => 'form-control obrigatorio', 'id' => 'txtCpfCnpj', 'maxlength' => '14'));
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <?php
                        echo form_label('Sexo:', 'selSexo');
                        echo form_dropdown('selSexo', $dropDownSexo, '', array("class" => 'form-control', 'id' => 'selSexo'));
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?php
                        echo form_label('E-mail:', 'txtEmail');
                        echo form_input('txtEmail', '', array("class" => 'form-control', 'id' => 'txtEmail', 'maxlength' => '45'));
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <?php
                        echo form_label('Telefone:', 'txtTelefone');
                        echo form_input('txtTelefone', '', array("class" => 'form-control telefone', 'placeholder' => '(__) _________', 'id' => 'txtTelefone'));
                    ?>
                </div>
            </div>


            </div>      
        </div>

        <div class="box box-solid">
            <div class="box-body">
                <div class="col-md-6">
                    <?php echo form_button('salvar', 'Salvar', array('class' => 'btn btn-primary', 'id' => 'btnSalvar'));?>
                    <?php echo anchor('cliente/', 'Voltar a Pesquisa', array('class' => 'btn btn-success'));?>
                </div>
            </div>
        </div>
        <?php //echo form_close();?>
        
    </section>
    
</div>


<div class="modal fade modal_confirm_cliente">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Atenção!</h4>
      </div>
      <div class="modal-body">
        Deseja <strong>efetivar</strong> o cadastro?
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-danger efetivar_cliente" >Sim</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary">Não</button>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function() {
    // somente numeros!!
    $('#txtCpfCnpj').on('input', function(){
        this.value = this.value.replace(/\D/g,'');
    });
})

// VALIDAR CPF/CNPJ
$('#txtCpfCnpj').focusout(function(){

    if($('#txtCpfCnpj').val().trim() != '') 
    {
        var base_url = "<?php echo base_url();?>";
        var cpfCnpj = $('#txtCpfCnpj').val();

        $.ajax({
            url: base_url + 'index.php/cliente/validarCpfCnpj',
            type: "POST",
            data: jQuery.param({ CpfCnpj: cpfCnpj }),
            success: function(resp) {
                if(resp != 1) {
                    toastr['error']('CPF/CNPJ inválido!', 'Atenção');
                    $('#txtCpfCnpj').val('');
                }
            }
        })
        
        validarExistencia();
    }
})

function validarExistencia()
{
    var base_url = "<?php echo base_url();?>";
    var cpfCnpj = $('#txtCpfCnpj').val();

    $.ajax({
        url: base_url + 'index.php/cliente/verificaClienteExiste',
        type: "POST",
        data: jQuery.param({ CpfCnpj: cpfCnpj }),
        success: function(resp) {
            console.log(resp);
            if(resp == 1) {
                toastr['error']('CPF/CNPJ já foi cadastrado!', 'Atenção');
                $('#txtCpfCnpj').val('');
            }
        }
    })
}



// SALVAR CLIENTE
$('#btnSalvar').on('click', function(e){
    e.preventDefault();
    var flagObrigatorio = false;

    $(".obrigatorio").each(function() {
        if($(this).val() == ''){
            flagObrigatorio = true;
        }
        if($(this).val() == null){
            flagObrigatorio = true;
        }
    });

    if(flagObrigatorio == true){
        toastr['error']('Campos com * são obrigatórios!', 'Atenção');
    } else {

        $('.modal_confirm_cliente').modal({
            backdrop: 'static',
            keyboard: false
        })
        .one('click', '.efetivar_cliente', function(e) {
            salvarCliente();
        });

    }

});

function salvarCliente()
{
    var tipoCliente = $('#selTipoCliente').val();
    var nomeCliente = $('#txtNome').val();
    var cpfCnpj = $('#txtCpfCnpj').val();
    var sexoCliente = $('#selSexo').val();
    var emailCliente = $('#txtEmail').val();
    var telefoneCliente = $('#txtTelefone').val();

    var objCliente = {
        TipoCliente: tipoCliente,
        NomeCliente: nomeCliente,
        CpfCnpj: cpfCnpj,
        SexoCliente: sexoCliente,
        EmailCliente: emailCliente,
        TelefoneCliente: telefoneCliente
    }

    var base_url = "<?php echo base_url();?>";

    $.ajax({
        url: base_url + "index.php/cliente/efetivarCadastro",
        type: 'POST',
        data: jQuery.param({ObjCliente: objCliente}),
        success: function(resp) {
            console.log(resp);
            if(resp == '1') {
                toastr['success']('Cliente cadastrado com sucesso!', 'Sucesso');
                $('#btnSalvar').prop('disabled', true);
            } else {
                //console.log(resp);
                toastr['error']('Problemas ao cadastrar o Cliente!', 'Atenção');
            }
        }
    })
}

</script>
