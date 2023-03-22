<?php

namespace Model;

class Carro {
    private $id, $fabricante, $modelo, $veiculo;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFabricante() {
        return $this->fabricante;
    }

    public function setFabricante($fabricante) {
        $this->fabricante = $fabricante;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getVeiculo() {
        return $this->veiculo;
    }

    public function setVeiculo($veiculo) {
        $this->veiculo = $veiculo;
    }
}

?>