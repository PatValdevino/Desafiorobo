<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>


<?php

//Função para a Nota Fiscal
function ValidaNotaFiscal($nota_fiscal){
    $nota_fiscal = preg_replace('/[^0-9]/', " ", $nota_fiscal);
    return $nota_fiscal;
}

//Função para o CNPJ
function ValidaCnpj($CNPJ){
    if (preg_match('/[0-9\-]+/', $CNPJ, $data)){
        $CNPJ = preg_replace('/[^0-9]/', "", $CNPJ);
        $exploded = explode(' ',$CNPJ);
        $CNPJ = $exploded[0];
        return $CNPJ;
    }
}

//Função para a Conta Contrato
function ValidaContaContrato($conta_contrato){
    $conta_contrato = trim(preg_replace('/[^0-9, A-Z, a-z]/', " ", $conta_contrato));
    return $conta_contrato;
}
    
// Se o campo estiver vazio, adiciona uma observação.
function ValidaObs($observacao){ 
    $conta_contrato = "";
    if (empty($conta_contrato)) {
        $observacao = "Não possui o campo";
    }
}

//Função para o Código de Barras
function ValidaCodBarras($cod_de_barras){
    if (preg_match('/[0-9]{10,12} [0-9]{10,12} [0-9]{10,12} [0-9]{1} [0-9]{10,14}/', $cod_de_barras, $data)){
        $cod_de_barras = preg_replace('/[^0-9]/', "", $cod_de_barras);
        $exploded = explode(' ',$cod_de_barras);
        $cod_de_barras = $exploded[0] . ' ' . $exploded[1] . ' ' . $exploded[2] . $exploded[3] . ' ' . $exploded[4];
        return $cod_de_barras;
    }
}


//Função para a Unidade Consumidora
function ValidaUnidade($unidade){
        $unidade = trim(preg_replace('/[^0-9, A-Z, a-z]/', " ", $unidade));
        return $unidade;
    }

//Função para o Fisco
function ValidaFisco($fisco){
    $fisco = trim(preg_replace('/[^0-9, A-Z, a-z]/', " ", $fisco));
    return $fisco;
}

//Função para o Fisco
function ValidaChave($chave_de_acesso){
    if (preg_match('/[0-9\-]+/', $chave_de_acesso, $data)){
        $chave_de_acesso = preg_replace('/[^0-9]/', "", $chave_de_acesso);
        $exploded = explode(' ',$chave_de_acesso);
        $chave_de_acesso = $exploded[0];
        return $chave_de_acesso;
    }
}

//Função para a Constante
function ValidaConstante($constante){
    $constante = preg_replace('/[^0-9]/', " ", $constante);
    return $constante;
}

//Função para a Leitura Anterior
function ValidaLeituraAnt($leitura_anterior){
    $leitura_anterior = preg_replace('/[^0-9]/', " ", $leitura_anterior);
    return $leitura_anterior;
}

//Função para a Leitura Atual
function ValidaLeituraAtual($leitura_atual){
    $leitura_atual = preg_replace('/[^0-9]/', " ", $leitura_atual);
    return $leitura_atual;
}

//Função para o Consumo KWH
function ValidaConsumo($consumo){
    if (preg_match('/USO\s+SIST.\s+DISTR.\s+(\W|)TUSD(\W|)\s+KWH\s+[0-9,.]+/', $consumo, $data)){
        $exploded = explode(' ',$consumo);
        $consumo = $exploded[5];
        return $consumo;
    }
}

//Função para o Consumo Faturado
function ValidaConsumoFat($consumo_faturado){
    if (preg_match('/Custo\s+de\s+Disponibilidade\s+[aA-zZ]{3}\s+[0-9]+/i', $consumo_faturado, $data)){
        $exploded = explode(' ',$consumo_faturado);
        $consumo_faturado = $exploded[4];
        return $consumo_faturado;
    }
}

//Função para o PIS
function ValidaPis($PIS){
    if (preg_match('/PIS\/PASEP\s+[0-9.,]+\s+[0-9.,]+\W\s+[0-9.,]+/i', $PIS, $data)){
        $exploded = explode(' ',$PIS);
        $PIS = $exploded[2];
        $PIS = preg_replace('/[^0-9.,]/', "", $PIS);
        return $PIS;
    }
}

//Função para o ICMS
function ValidaIcms($ICMS){
    if (preg_match('/[0-9.,]+\s+[0-9.,]+\s+[0-9.,]+/i', $ICMS, $data)){
        $exploded = explode(' ',$ICMS);
        $ICMS = $exploded[1];
        $ICMS = preg_replace('/[^0-9.,]/', "", $ICMS);
        return $ICMS;
    }
}

//Função para o COFINS
function ValidaCofins($COFINS){
    if (preg_match('/COFINS\s+[0-9.,]+\s+[0-9.,]+\W\s+[0-9.,]+/i', $COFINS, $data)){
        $exploded = explode(' ',$COFINS);
        $COFINS = $exploded[2];
        $COFINS = preg_replace('/[^0-9.,]/', "", $COFINS);
        return $COFINS;
    }
}

//Função para o Total Fatura
function ValidaTotalFatura($valor_total){
    $valor_total = preg_replace('/[^0-9.,]/', " ", $valor_total);
    return $valor_total;
}

//Função para o CIP
function ValidaCip($CIP){
    if (preg_match('/Contribuicao\s+de\s+Ilum\s+Pub[0-9.,]+\s+[0-9.,]+\s+[0-9.,]+/i', $CIP, $data)){
        $exploded = explode(' ',$CIP);
        $CIP = $exploded[1];
        $CIP = preg_replace('/[^0-9.,]/', "", $CIP);
        return $CIP;
    }
}

?>
