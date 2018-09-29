<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 09/01/2018
 * Time: 13:33
 */

//carrega o cabeçalho e menus do site
include_once 'estrutura/Template.php';

//Class
require_once 'dao/avaliacaoDAO.php';

$template = new Template();

$template->header();
$template->sidebar();
$template->navbar();

$object = new avaliacaoDAO();

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $Curso_idCurso = (isset($_POST["Curso_idCurso"]) && $_POST["Curso_idCurso"] != null) ? $_POST["Curso_idCurso"] : "";
    $Turma_idTurma = (isset($_POST["Turma_idTurma"]) && $_POST["Turma_idTurma"] != null) ? $_POST["Turma_idTurma"] : "";
    $Aluno_idAluno = (isset($_POST["Aluno_idAluno"]) && $_POST["Aluno_idAluno"] != null) ? $_POST["Aluno_idAluno"] : "";
    $Nota1 = (isset($_POST["Nota1"]) && $_POST["Nota1"] != null) ? $_POST["Nota1"] : "";
    $Nota2 = (isset($_POST["Nota2"]) && $_POST["Nota2"] != null) ? $_POST["Nota2"] : "";
    $NotaFinal = (isset($_POST["NotaFinal"]) && $_POST["NotaFinal"] != null) ? $_POST["NotaFinal"] : "";

} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $Curso_idCurso = NULL;
    $Turma_idTurma = NULL;
    $Aluno_idAluno = NULL;
    $Nota1 = NULL;
    $Nota2 = null;
    $NotaFinal = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    $avaliacao = new avaliacao($id, '','','','','','');
    $resultado = $object->atualizar($avaliacao);
    $Curso_idCurso = $resultado->getCursoIdCurso();
    $Turma_idTurma = $resultado->getTurmaIdTurma();
    $Aluno_idAluno = $resultado->getAlunoIdAluno();
    $Nota1 = $resultado->getNota1();
    $Nota2 = $resultado->getNota2();
    $NotaFinal = $resultado->getNotaFinal();
}
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" ) {
    $avaliacao = new avaliacao($id, $Curso_idCurso, $Turma_idTurma, $Aluno_idAluno, $Nota1, $Nota2, $NotaFinal);
    var_dump($avaliacao);
    $msg =$object->salvar($avaliacao);
    $id = null;
    $Curso_idCurso = NULL;
    $Turma_idTurma = NULL;
    $Aluno_idAluno = NULL;
    $Nota1 = NULL;
    $Nota2 = null;
    $NotaFinal = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $avaliacao = new avaliacao($id, 0, '', '',0,0,0);
    $msg = $object->remover($avaliacao);
    $id = null;
}

?>
    <div class='content' xmlns="http://www.w3.org/1999/html">
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='card'>
                            <div class='header'>
                                <h4 class='title'>Avaliação</h4>
                                <p class='category'>Lista de Avaliações do sistema</p>

                            </div>
                            <div class='content table-responsive'>

                                <form action="?act=save" method="POST" name="form1" >
                                    <hr>
                                    <i class="ti-save"></i>
                                    <input type="hidden" name="id" value="<?php
                                    // Preenche o id no campo id com um valor "value"
                                    echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                                    ?>" />
                                    Curso:
                                    <select name="Curso_idCurso">
                                        <?php
                                        $query = "SELECT * FROM curso order by Nome;";
                                        $statement = $pdo->prepare($query);
                                        if ($statement->execute()) {
                                            $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($result as $rs) {
                                                if ($rs->idCurso == $curso) {
                                                    echo "<option value='$rs->idCurso' selected>$rs->Nome</option>";
                                                } else {
                                                    echo "<option value='$rs->idCurso'>$rs->Nome</option>";
                                                }
                                            }
                                        } else {
                                            throw new PDOException("Erro: Não foi possível executar a declaração sql");
                                        }
                                        ?>
                                    </select>
                                    Turma:
                                    <select name="Turma_idTurma">
                                        <?php
                                        $query = "SELECT * FROM turma order by Nome;";
                                        $statement = $pdo->prepare($query);
                                        if ($statement->execute()) {
                                            $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($result as $rs) {
                                                if ($rs->idCurso == $turma) {
                                                    echo "<option value='$rs->idTurma' selected>$rs->Nome</option>";
                                                } else {
                                                    echo "<option value='$rs->idTurma'>$rs->Nome</option>";
                                                }
                                            }
                                        } else {
                                            throw new PDOException("Erro: Não foi possível executar a declaração sql");
                                        }
                                        ?>
                                    </select>
                                    Aluno:
                                    <select name="Aluno_idAluno">
                                        <?php
                                        $query = "SELECT * FROM aluno order by Nome;";
                                        $statement = $pdo->prepare($query);
                                        if ($statement->execute()) {
                                            $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($result as $rs) {
                                                if ($rs->idCurso == $aluno) {
                                                    echo "<option value='$rs->idAluno' selected>$rs->Nome</option>";
                                                } else {
                                                    echo "<option value='$rs->idAluno'>$rs->Nome</option>";
                                                }
                                            }
                                        } else {
                                            throw new PDOException("Erro: Não foi possível executar a declaração sql");
                                        }
                                        ?>
                                    </select>
                                    Nota1:
                                    <input type="number"  name="Nota1" value="<?php
                                    // Preenche o nome no campo nome com um valor "value"
                                    echo (isset($Nota1) && ($Nota1 != null || $Nota1 != "")) ? $Nota1 : '';
                                    ?>" />
                                    Nota1:
                                    <input type="number"  name="Nota2" value="<?php
                                    // Preenche o nome no campo nome com um valor "value"
                                    echo (isset($Nota2) && ($Nota2 != null || $Nota2 != "")) ? $Nota2 : '';
                                    ?>" />
                                    Nota Final:
                                    <input type="number"  name="NotaFinal" value="<?php
                                    // Preenche o nome no campo nome com um valor "value"
                                    echo (isset($NotaFinal) && ($NotaFinal != null || $NotaFinal != "")) ? $NotaFinal : '';
                                    ?>" />

                                    <input type="submit" VALUE="Cadastrar"/>
                                    <hr>
                                </form>
                                <?php
                                echo (isset($msg) && ($msg != null || $msg != "")) ? $msg : '';
                                //chamada a paginação
                                $object->tabelapaginada();
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php
$template->footer();
?>