<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 28/09/2018
 * Time: 19:47
 */

class avaliacao
{
    private $idAvaliacao;
    private $Curso_idCurso;
    private $Turma_idTurma;
    private $Aluno_idAluno;
    private $Nota1;
    private $Nota2;
    private $NotaFinal;

    /**
     * avaliacao constructor.
     * @param $idAvaliacao
     * @param $Curso_idCurso
     * @param $Turma_idTurma
     * @param $Aluno_idAluno
     * @param $Nota1
     * @param $Nota2
     * @param $NotaFinal
     */
    public function __construct($idAvaliacao, $Curso_idCurso, $Turma_idTurma, $Aluno_idAluno, $Nota1, $Nota2, $NotaFinal)
    {
        $this->idAvaliacao = $idAvaliacao;
        $this->Curso_idCurso = $Curso_idCurso;
        $this->Turma_idTurma = $Turma_idTurma;
        $this->Aluno_idAluno = $Aluno_idAluno;
        $this->Nota1 = $Nota1;
        $this->Nota2 = $Nota2;
        $this->NotaFinal = $NotaFinal;
    }

    /**
     * @return mixed
     */
    public function getIdAvaliacao()
    {
        return $this->idAvaliacao;
    }

    /**
     * @param mixed $idAvaliacao
     */
    public function setIdAvaliacao($idAvaliacao): void
    {
        $this->idAvaliacao = $idAvaliacao;
    }

    /**
     * @return mixed
     */
    public function getCursoIdCurso()
    {
        return $this->Curso_idCurso;
    }

    /**
     * @param mixed $Curso_idCurso
     */
    public function setCursoIdCurso($Curso_idCurso): void
    {
        $this->Curso_idCurso = $Curso_idCurso;
    }

    /**
     * @return mixed
     */
    public function getTurmaIdTurma()
    {
        return $this->Turma_idTurma;
    }

    /**
     * @param mixed $Turma_idTurma
     */
    public function setTurmaIdTurma($Turma_idTurma): void
    {
        $this->Turma_idTurma = $Turma_idTurma;
    }

    /**
     * @return mixed
     */
    public function getAlunoIdAluno()
    {
        return $this->Aluno_idAluno;
    }

    /**
     * @param mixed $Aluno_idAluno
     */
    public function setAlunoIdAluno($Aluno_idAluno): void
    {
        $this->Aluno_idAluno = $Aluno_idAluno;
    }

    /**
     * @return mixed
     */
    public function getNota1()
    {
        return $this->Nota1;
    }

    /**
     * @param mixed $Nota1
     */
    public function setNota1($Nota1): void
    {
        $this->Nota1 = $Nota1;
    }

    /**
     * @return mixed
     */
    public function getNota2()
    {
        return $this->Nota2;
    }

    /**
     * @param mixed $Nota2
     */
    public function setNota2($Nota2): void
    {
        $this->Nota2 = $Nota2;
    }

    /**
     * @return mixed
     */
    public function getNotaFinal()
    {
        return $this->NotaFinal;
    }

    /**
     * @param mixed $NotaFinal
     */
    public function setNotaFinal($NotaFinal): void
    {
        $this->NotaFinal = $NotaFinal;
    }


}