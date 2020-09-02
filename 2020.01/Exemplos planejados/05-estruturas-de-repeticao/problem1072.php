<?php
$n = $_GET['n'] ?? null;
$in = 0;
$out = 0;
foreach ($_GET as $key => $value) {
    if ($key != 'n') {
        if ($value >= 10 && $value <= 20) {
            $in++;
        } else {
            $out++;
        }
    }
}
?>
<?php if ($in > 0 || $out > 0): ?>
	<h1>SAÍDA:</h1>
	<p><?=$in;?> in</p>
	<p><?=$out;?> out</p>
<?php endif;?>
<h1>ENTRADA:</h1>
<form>
	<p>
		Informe o valor de N: <br>
		<input type="text" name="n" value="<?=$n;?>">
		<input type="submit" value="Mostrar campos">
	</p>
</form>
<?php if (!is_null($n)): ?>
	<form>
		<?php for ($i = 0; $i < $n; $i++): ?>
			<p>
				Informe N<?=$i;?>: <br>
				<input type="text" name="n<?=$i;?>">
			</p>
		<?php endfor;?>
		<p>
			<input type="hidden" name="n" value="<?=$n;?>">
			<input type="submit" value="Verificar">
		</p>
	</form>
<?php endif;?>