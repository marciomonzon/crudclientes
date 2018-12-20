<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model responsável por retornar os dados
 * para popular dropdowns
 */

 class Dropdown_model extends CI_Model {

    public function getSexo()
    {
        $sexoArray = array(
            '' => '',
            'F' => 'FEMININO',
            'M' => 'MASCULINO'
        );
        return $sexoArray;
    }

    public function getTipoCliente()
    {
        $tipoArray = array(
            '' => '',
            'J' => 'JURIDICO',
            'F' => 'FÍSICO'
        );
        return $tipoArray;
    }

 }