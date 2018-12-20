<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller responsável pelo CRUD de Clientes
 */
class Cliente extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('util/Dropdown_model', 'dropdown');
        $this->load->model('util/Validar_model', 'validar');
        $this->load->model('util/Mensagem_model', 'mensagem');
    }
    
    public function index()
    {
        $this->load->model('cliente/Cliente_model', 'cliente');
        $res = $this->cliente->getClientesCadastrados();

        $data = array(
            'clientes' => $res
        );

        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('cliente/cliente_view', $data);
		$this->load->view('layouts/footer');
    }

    public function frmNovoCliente()
    {
        $data = array(
            'dropDownSexo' => $this->dropdown->getSexo(),
            'dropDownTipoCliente' => $this->dropdown->getTipoCliente()
        );

        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('cliente/frm_cliente_view', $data);
		$this->load->view('layouts/footer');
    }

    public function pesquisarCliente()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $cpfCnpj = trim($this->input->post('txtCpfCnpjPesquisa'));
            $this->load->model('cliente/Cliente_model', 'cliente');
            
            if($cpfCnpj > 0) 
            {   
                $cliente = $this->cliente->getClienteByCpfCnpj($cpfCnpj);
                $data = array(
                    'cliente' => $cliente
                );
                $this->load->view('layouts/header');
                $this->load->view('layouts/aside');
                $this->load->view('cliente/cliente_res_view', $data);
                $this->load->view('layouts/footer');

            } else {

                $mensagem = "Campo CPF/CNPJ é obrigatório!";
                $tipo = "error";
                $data = array(
                    'mensagem' => $this->mensagem->personalizada($mensagem, $tipo)
                );
                $this->session->set_userdata($data);
                redirect('cliente');    
            }
        } else {
            redirect('cliente');
        }
    }

    public function validarCpfCnpj()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $cpfCnpj = trim($this->input->post('CpfCnpj'));
            if($cpfCnpj > 0)
            {
                $res = $this->validar->ValidarCpfCnpj($cpfCnpj);
                echo $res;
            } else {
                echo 'false';
            }

        } else {
            redirect('cliente');
        }
    }

    public function efetivarCadastro()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $this->load->model('cliente/Cliente_model', 'cliente');
            $objView = $this->input->post('ObjCliente');

            $objCadCliente = (object) array(
                'CpfCnpj' => $objView['CpfCnpj'],
                'Tipo' => $objView['TipoCliente'],
                'Nome' => $objView['NomeCliente'],
                'Sexo' => $objView['SexoCliente'],
                'Email' => $objView['EmailCliente'],
                'Telefone' => $objView['TelefoneCliente']
            );
            $res = $this->cliente->addCliente($objCadCliente);
            echo $res;

        } else {
            redirect('cliente');
        }
    }

    public function frmEditar($clienteId)
    {
        if($clienteId > 0) 
        {
            $this->load->model('cliente/Cliente_model', 'cliente');
            $cliente = $this->cliente->getClienteById($clienteId);

            $data = array(
                'dropDownSexo' => $this->dropdown->getSexo(),
                'dropDownTipoCliente' => $this->dropdown->getTipoCliente(),
                'cliente' => $cliente
            );
    
            $this->load->view('layouts/header');
            $this->load->view('layouts/aside');
            $this->load->view('cliente/frm_editar_cliente_view', $data);
            $this->load->view('layouts/footer');

        } else {
            redirect('cliente');
        }
    }

    public function efetivarAlteracao()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $this->load->model('cliente/Cliente_model', 'cliente');
            $objView = $this->input->post('ObjCliente');

            $objCadCliente = (object) array(
                'ClienteId' => $objView['ClienteId'],
                'Tipo' => $objView['TipoCliente'],
                'Nome' => $objView['NomeCliente'],
                'Sexo' => $objView['SexoCliente'],
                'Email' => $objView['EmailCliente'],
                'Telefone' => $objView['TelefoneCliente']
            );
            $res = $this->cliente->updateCliente($objCadCliente);
            echo $res;

        } else {
            redirect('cliente');
        }
    }

    public function excluirCliente()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $this->load->model('cliente/Cliente_model', 'cliente');
            $clienteId = $this->input->post('ClienteId');
            $res = $this->cliente->deleteCliente($clienteId);

            echo $res;
        } else {
            redirect('cliente');
        }
    }

    public function verificaClienteExiste()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $this->load->model('cliente/Cliente_model', 'cliente');
            $cpfCnpj = $this->input->post('CpfCnpj');
            $res = $this->cliente->verificaClienteExiste($cpfCnpj);

            echo $res;
        } else {
            redirect('cliente');
        }
    }

}