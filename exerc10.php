<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Programação WEB com PHP</title>
    <link rel="stylesheet" href="formata-formulario-10.css">
</head>

<body>
    <h1> Processando a venda de produtos farmacêuticos - resposta da aplicação </h1>
    <?php

    $valorCompra = $_POST['valor-compra'];

    if (filter_var($valorCompra, FILTER_VALIDATE_FLOAT)) 
    {   
        if (isset($_POST['faixa-etaria']))
        {
            $faixaEtaria = $_POST['faixa-etaria'];

            if ($faixaEtaria == "Menos-55")
            {
                $valorParcialCompra = $valorCompra;
            }
            else if ($faixaEtaria == "De-55-a-70")
            {
                $valorParcialCompra = $valorCompra * 95/100;
            }
            else
            {
                $valorParcialCompra = $valorCompra * 93/100;
            }

            if (isset($_POST['fidelidade']))
            {
                $valorDesconto = $valorCompra * 5/100;
                $valorFinalCompra = $valorParcialCompra - $valorDesconto;
            }
            else
            {
                $valorFinalCompra = $valorParcialCompra;
            }

            $valorFinalCompraFormat = number_format($valorFinalCompra, 2, ",", ".");

            echo "<p> Valor total a ser pago é de: <span> R$ $valorFinalCompraFormat </span>.</p>";
        }
        else
        {
            die("<p> É necessário informar a <span> faixa-etária </span> do cliente. Por favor, tente novamente! </p>");
        }
    }
    else 
    {
        die("<p> O <span> valor da compra </span> é um dado obrigatório. Por favor, tente novamente! </p>");
    }
    ?>   
</body>
</html>