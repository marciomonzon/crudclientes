<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Model responsável pela validação e 
 * persistir os dados no banco de dados.
 */
class Cliente_model extends CI_Model {

    public function getClientesCadastrados()
    {
        $query = "select cpfcnpj, tipo, nome, sexo, email, telefone from cliente";
        
        $res = $this->db->query($query);
        if($res->num_rows() > 0)
        {
            return $res->result_array();
        } else {
            return false;
        }
    }

    public function getClienteByCpfCnpj($cpfCnpj)
    {
        $cpfCnpj = $this->db->escape($cpfCnpj);

        $query = "select clienteid, cpfcnpj, tipo, nome, sexo, email, telefone from cliente 
        where cpfcnpj = $cpfCnpj";
        
        $res = $this->db->query($query);
        if($res->num_rows() > 0)
        {
            return $res->row();
        } else {
            return false;
        }
    }

    public function verificaClienteExiste($cpfCnpj)
    {
        $cpfCnpj = $this->db->escape($cpfCnpj);

        $query = "select clienteid, cpfcnpj, tipo, nome, sexo, email, telefone from cliente 
        where cpfcnpj = $cpfCnpj";
        
        $res = $this->db->query($query);
        if($res->num_rows() > 0)
        {
            return true;
        } else {
            return false;
        }
    }

    public function getClienteById($id)
    {
        $id = $this->db->escape($id);

        $query = "select clienteid, cpfcnpj, tipo, nome, sexo, email, telefone from cliente 
        where clienteid = $id";
        
        $res = $this->db->query($query);
        if($res->num_rows() > 0)
        {
            return $res->row();
        } else {
            return false;
        }
    }

    public function addCliente($objCliente)
    {
        $telefone = str_replace('(', '', $objCliente->Telefone);
        $telefone = str_replace(')', '', $telefone);
        $telefone = str_replace(' ', '', $telefone);

        $query = "insert into cliente (CpfCnpj, Tipo, Nome, Sexo, Email, Telefone) values
        (
            '$objCliente->CpfCnpj',
            '$objCliente->Tipo',
            '$objCliente->Nome',
            '$objCliente->Sexo',
            '$objCliente->Email',
            '$telefone'
        )";
        //echo $query; exit();
        $res = $this->db->query($query);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function updateCliente($obj)
    {
        $telefone = str_replace('(', '', $obj->Telefone);
        $telefone = str_replace(')', '', $telefone);
        $telefone = str_replace(' ', '', $telefone);

        $query = "update cliente set Tipo = '$obj->Tipo', Nome = '$obj->Nome', 
        Sexo = '$obj->Sexo', Email = '$obj->Email', Telefone = '$obj->Telefone' 
        where clienteid = $obj->ClienteId";
        //echo $query; exit();

        $res = $this->db->query($query);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function deleteCliente($clienteId)
    {
        $clienteId = $this->db->escape($clienteId);
        $query = "delete from cliente where clienteid = $clienteId";
        
        $res = $this->db->query($query);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }


}