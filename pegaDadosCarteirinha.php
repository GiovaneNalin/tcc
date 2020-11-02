<?php
    include("conexao.php");
    session_start();
    $cpf = $_SESSION["autorizado"];
    $acao = $_POST['acao'];

    if($acao == 1){
        $consulta = "SELECT d.lote, 
        d.data_tomada, 
        d.data_agendada, 
        d.local, 
        d.aplicador,
        d.confirmacao, 
        l.tipo_vacina 
        FROM dose d
        INNER JOIN lote l
        ON d.lote = l.id
        INNER JOIN vacina v
        ON l.tipo_vacina = v.tipo
        WHERE cpf_paciente = '$cpf'";
        
        $con = mysqli_query($conexao, $consulta) or die ($mysqli->error);

        while($row_carteirinha = mysqli_fetch_assoc($con)){
            echo json_encode([
                $row_carteirinha["tipo_vacina"],
                $row_carteirinha["lote"],
                $row_carteirinha["data_tomada"],
                $row_carteirinha["data_agendada"],
                $row_carteirinha["local"],
                $row_carteirinha["aplicador"]
            ]);
        }
    }
    else{
        $consulta_dependente = "SELECT
        d.lote,
            d.data_tomada,
            d.data_agendada,
            d.local,
            d.aplicador,
            d.confirmacao,
            l.tipo_vacina,
            p.nome,
            p.cpf
        FROM paciente p
        INNER JOIN dose d ON
        p.cpf = d.cpf_paciente
        INNER JOIN lote l ON
            d.lote = l.id
        INNER JOIN vacina v ON
            l.tipo_vacina = v.tipo
        WHERE
            p.cpf_responsavel = '$cpf'";

        $con_dependente = mysqli_query($conexao, $consulta_dependente) or die ($mysqli->error);

        echo json_encode(mysqli_fetch_all($con_dependente, MYSQLI_ASSOC));
    }
?>