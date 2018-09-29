<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 28/09/2018
 * Time: 19:18
 */

class professor
{
    private $idProfessor;
    private $Nome;
    private $Cargo;

    /**
     * professor constructor.
     * @param $idProfessor
     * @param $Nome
     * @param $Cargo
     */
    public function __construct($idProfessor, $Nome, $Cargo)
    {
        $this->idProfessor = $idProfessor;
        $this->Nome = $Nome;
        $this->Cargo = $Cargo;
    }

    /**
     * @return mixed
     */
    public function getIdProfessor()
    {
        return $this->idProfessor;
    }

    /**
     * @param mixed $idProfessor
     */
    public function setIdProfessor($idProfessor)
    {
        $this->idProfessor = $idProfessor;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * @param mixed $Nome
     */
    public function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->Cargo;
    }

    /**
     * @param mixed $Cargo
     */
    public function setCargo($Cargo)
    {
        $this->Cargo = $Cargo;
    }


}