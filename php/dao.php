<?php
    function conectar($host, $user, $password, $database) {
        $conexao = mysqli_connect($host, $user, $password, $database);

        if (!$conexao) {
            throw new Exception("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }

        return $conexao;
    }
?>