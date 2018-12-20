<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model para notificações
 */
class Mensagem_model extends CI_Model {

    public function dataInvalida()
    {
        return "<script>toastr['error']
        ('Data inválida', 'Atenção');</script>";
    }

    public function cpfInvalido()
    {
        return "<script>toastr['error']
        ('CPF inválido', 'Atenção');</script>";
    }

    public function camposObrigatorios()
    {
        return "<script>toastr['error']
        ('Todos os campos são obrigatórios', 'Atenção');</script>";
    }

    public function dadosNaoEncontrados()
    {
        return "<script>toastr['error']
        ('Dados não encontrados', 'Atenção');</script>";
    }

    public function campoExcedeuTamanho()
    {
        return "<script>toastr['error']
        ('Quantidade de caracteres não permitida!', 'Atenção');</script>";
    }

    public function insercaoSucesso()
    {
        return "<script>toastr['success']
        ('Inserção realizada com sucesso', 'Sucesso');</script>";
    }

    public function personalizada($mensagem, $tipo)
    {
        return "<script>toastr['$tipo']
        ('$mensagem', 'Atenção');</script>";
    }
}