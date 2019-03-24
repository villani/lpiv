<?php
$linhas = $_GET['linhas'] ?? null;
$colunas = $_GET['colunas'] ?? null;

if (!is_null($linhas) && !is_null($colunas)) {
    $tabela = "<table border=\"1\">\n";
    for ($i = 0; $i < $linhas; $i++) {
        $tabela .= "\t<tr>\n";
        for ($j = 0; $j < $colunas; $j++) {
            $tabela .= "\t\t<td>valor</td>\n";
        }
        $tabela .= "\t</tr>\n";
    }
    $tabela .= "</table>";

    echo $tabela;
}
?>
<form>
	<p>Linhas: <br>
		<input type="number" name="linhas" value="<?=$linhas;?>"></p>
	<p>Colunas: <br>
		<input type="number" name="colunas" value="<?=$colunas;?>"></p>
	<p>
		<input type="submit" value="Processar"></p>
</form>
