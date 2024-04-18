<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tabela de Dados</title>

</head>
<body>

<table>
    <thead>
        <tr>
            <th>Nota Fiscal</th>
            <th>CNPJ</th>
            <th>Conta Contrato</th>
            <th>Unidade</th>
            <th>Código de Barras</th>
            <th>Fisco</th>
            <th>Chave de Acesso</th>
            <th>Constante</th>
            <th>Leitura Atual</th>
            <th>Leitura Anterior</th>
            <th>Consumo Faturado</th>
            <th>Consumo Registrado</th>
            <th>Alíquota PIS</th>
            <th>PIS</th>
            <th>PIS Fatura</th>
            <th>Alíquota COFINS</th>
            <th>COFINS</th>
            <th>COFINS Fatura</th>
            <th>Alíquota ICMS</th>
            <th>ICMS</th>
            <th>ICMS Fatura</th>
            <th>Total Fatura</th>
            <th>Contribuição de Iluminação Pública</th>
            <th>Consumo</th>
            <th>Consumo Injetado (KWH)</th>
            <th>Observação</th>
            
        </tr>
    </thead>
    <tbody>
<?php
$localArquivos = 'C:\Users\patricia.silva\Desktop\Teste_robo';
$folder = $localArquivos;
$files = scandir($folder);
require_once './Functions/valid.php';

foreach ($files as $file) {  
    if (substr($file, -3) == "csv" && ($getfile = fopen($folder . "\\" . $file, "r")) !== false) {
        // Lê a primeira linha do arquivo CSV para obter os cabeçalhos
        $header = fgetcsv($getfile);
        // Loop para ler cada linha do arquivo
        while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
            // echo '<pre>';
            // var_dump($data);
            $unidade = ValidaUnidade($data[2]);
            $conta_contrato = ValidaContaContrato($data[3]);
            $CNPJ = ValidaCnpj($data[0]);
            $nota_fiscal = ValidaNotaFiscal($data[1]);
            $cod_de_barras = ValidaCodBarras($data[7]);
            $fisco = ValidaFisco($data[5]);
            $chave_de_acesso = ValidaChave($data[4]);
            $constante = ValidaConstante($data[11]);
            $leitura_anterior = ValidaLeituraAnt ($data[9]);
            $leitura_atual = ValidaLeituraAtual($data[10]);
            $consumo = ValidaConsumo($data[15]);
            $PIS = ValidaPis($data[16]);
            $COFINS = ValidaCofins($data[17]);
            $ICMS = ValidaIcms($data[18]);
            $ICMS_2 = $data[20];
            $valor_total = ValidaTotalFatura($data[6]);
            $CIP = ValidaCip($data[9]);
            $consumo_faturado = ValidaConsumoFat($data[13]);
            $consumo_injetado = $data[13];
            $consumo_registrado = $data[15];
            $observacao = $data[21];

            echo "<tr>";
            echo "<td>$nota_fiscal</td>";
            echo "<td>$CNPJ</td>";
            echo "<td>$conta_contrato</td>";
            echo "<td>$unidade</td>";
            echo "<td>$cod_de_barras</td>";
            echo "<td>$fisco</td>";
            echo "<td>$chave_de_acesso</td>";
            echo "<td>$constante</td>";
            echo "<td>$leitura_anterior</td>";
            echo "<td>$leitura_atual</td>";
            echo "<td>$consumo_faturado</td>";
            echo "<td>$consumo_registrado</td>";
            echo "<td>$PIS</td>";
            echo "<td>$data[14]</td>";
            echo "<td>$data[15]</td>";
            echo "<td>$COFINS</td>";
            echo "<td>$COFINS</td>";
            echo "<td>$data[18]</td>";
            echo "<td>$ICMS</td>";
            echo "<td>$data[20]</td>";
            echo "<td>$data[21]</td>";
            echo "<td>$valor_total</td>";
            echo "<td>$data[23]</td>";
            echo "<td>$consumo</td>";
            echo "<td>$data[25]</td>";
            echo "</tr>";
        }
        
        // Fecha o arquivo CSV
        fclose($getfile);
    }
}
        
        
?>
    </tbody>
</table>
</body>
</html>

<style>
body {
  background: #87CEEB;
  color: 000;
}
table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
    font-family: Helvetica, sans-serif;
}

th {
    background-color:rgb(255,255,255);
}
</style>