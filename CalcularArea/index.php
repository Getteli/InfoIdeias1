<?php
// usando o PHP 7, costumo deixar claro o tipo dos dados para facilitar
declare(strict_types=1);

/* Exemplo que usei para identificar a logica por tras
	n  q
	1 = 1
	2 = 5
	3 = 13
	4 = 25

	           some iq + r
	n   q      iq      r
	1   1   -   0  =   1
	2	5   -   1  =   4
	3	13  -   5  =   8
	4	25  -  13  =  12

	5   x   -  25  =  16  | x = 41
	6   x   -  41  =  20  | x = 61
	...
*/

// para isso decidi criar uma funcao recursiva
function calcularArea(int $n)
{
	// uma variavel auxiliar para pegar o multiplo de 4 (diminui o 1 pois o multiplo de 4 começa a partir do 2° indice, entao nao conta o 1°)
	$aux = ($n - 1) * 4;

	// se for 1 entao retorna 1
	if ($n == 1) {
		return 1;
	}
	else
	{
		// se nao eu somo au auxiliar e faço a recursão
		return $aux + calcularArea($n-1);
	}
}

$num = isset($_POST["n"]) && !empty($_POST["n"]) ? (int) $_POST["n"] : NULL;
?>
<form action="#" method="POST">
	N: <input type="number" name="n">
	<input type="submit" value="Enviar">
	<br><br>
	<img src="img_area.png" width="550">
</form>
<?php
if (!empty($num)) {
	echo "N <strong>".$num."</strong> = <strong>" . calcularArea($num) . "</strong> quadrados na área da imagem acima";
}
?>