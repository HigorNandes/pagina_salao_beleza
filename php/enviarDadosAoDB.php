<?php
require('dao.php');

try {
    // Conexão ao banco de dados
    $ret = conectar('localhost', 'root', '0410', 'salao_beleza');
    mysqli_set_charset($ret, 'utf8');

    // Recebendo os dados do formulário
    $nome = mysqli_real_escape_string($ret, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($ret, $_POST['sobrenome']);
    $telefone = mysqli_real_escape_string($ret, $_POST['telefone']);
    $email = mysqli_real_escape_string($ret, $_POST['email']);

    // Verificando se o cliente já existe
    $sql = "SELECT * FROM pessoas WHERE nome = '$nome' AND sobrenome = '$sobrenome'";
    $consulta = mysqli_query($ret, $sql);

    if (!$consulta) {
        throw new Exception("Erro na consulta: " . mysqli_error($ret));
    }

    $retorno = mysqli_num_rows($consulta);

    if ($retorno > 0) {
        echo 'Cliente já existe';
    } else {
        // Inserindo novo cliente
        $sql = "INSERT INTO pessoas (nome, sobrenome, telefone, email) VALUES ('$nome', '$sobrenome', '$telefone', '$email')";
        $consulta = mysqli_query($ret, $sql);

        if ($consulta) {
            echo 'Cadastro realizado com sucesso!';
        } else {
            echo 'Problema para realizar o cadastro: ' . mysqli_error($ret);
        }
    }
} catch (Exception $e) {
    echo 'Falha de conexão: ' . $e->getMessage();
}

echo '<br>';
echo '<a href="formCadastroBD.php">Voltar ao Cadastro</a>';
?>
