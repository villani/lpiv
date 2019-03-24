<?php
$raio = $_GET['raio'] ?? null;

if (!is_null($raio)) {
    $area = 3.14159 * pow($raio, 2);
    echo "A=" . round($area, 4);
}
?>
<form>
	<p>Raio: <br>
		<input type="real" name="raio" value="<?=$raio;?>"></p>
	<p>
		<input type="submit" value="Calcular">
	</p>
</form>