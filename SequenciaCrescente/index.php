<?php
// usando o PHP 7, costumo deixar claro o tipo dos dados para facilitar
declare(strict_types=1);

function SequenciaCrescente(array $nums_array)
{
	$aux = 0;
	$aux_igual = 0;
	// $aux_array = array();
	$result = true;
	$i = 0;

	// for ($i = 0; $i < sizeof($nums_array); $i++) {
	while ($i < sizeof($nums_array)) {
		$atual = $i;
		$ant = $i - 1;
		$prox = $i + 1;
		
		echo "atual: " . $atual;
		echo "<br>";

		echo "o valor do array agora: i = " .$atual . " | valor: " . $nums_array[$atual];
		echo "<br>";

		if (isset($nums_array[$ant])) {
			echo "existe um valor anterior";
			echo "<br>";
			echo "---------";
			echo "<br>";
			echo $nums_array[$ant];
			echo "<br>";
			if ($nums_array[$atual] > $nums_array[$ant]) {
				echo "o valor agora é maior que o anterior. continua";
				echo "<br>";
				$i++;
			}
			else
			{
				if ($nums_array[$atual] == $nums_array[$ant]) {
					$aux_igual++;
				}
				if ($aux_igual > 1) {
					$result = false;
					// break;
				}
				else
				{
					$result = true;
				}

				echo "o valor de agora É MENOR QUE O ANTERIOR, remover !!!!";
				echo "<br>";
				if ($aux < 1) {
					if (isset($nums_array[$prox])) {
						// 10 > 1 && (10 >= 2)
						// 5 > 3
						if ($nums_array[$ant] > $nums_array[$atual]) {
							echo "remove o anterior";
							echo "<br>";
							echo "remover o valor: " . $nums_array[$ant];
							echo "<br>";
							unset($nums_array[$ant]);
							$nums_array = array_values($nums_array);
							$aux++;
							echo "<strong>aumentou o aux.</strong>";
							echo "<br>";
							echo "array atual . " . print_r($nums_array, true);
							//
						}
						else
						{
							echo "remove o atual";
							echo "<br>";
							echo "remover o valor: " . $nums_array[$atual];
							echo "<br>";
							unset($nums_array[$atual]);
							$nums_array = array_values($nums_array);
							$aux++;
							echo "<strong>aumentou o aux.</strong>";
							echo "<br>";
							echo "array atual . " . print_r($nums_array, true);
						}
					}
					else
					{
						$i++;
					}
				}
				else
				{
					echo "<strong>ja removeu mais de 1. PARAR</strong>";
					echo "<br>";
					$result = false;
					// break;
				}
			}
		}
		else
		{
			echo "1° valor que passamos";
			echo "<br>";
			$i++;
		}

		if (isset($nums_array[$prox])) {
			echo "verificar o valor proximo";
			echo "<br>";
			if ($nums_array[$atual] > $nums_array[$prox]) {
				echo "<hr>";
				// if ($nums_array[$atual] == $nums_array[$prox]) {
				// 	$aux_igual++;
				// }
				// if ($aux_igual > 0) {
				// 	$result = false;
				// }
				// else
				// {
				// 	$result = true;
				// }
				// echo "o valor de agora É MAIOR QUE O PROXIMO, remover !!!!";
				// echo "<br>";
				// if ($aux < 1) {
				// 	echo "remover o valor: " . $nums_array[$atual];
				// 	echo "<br>";
				// 	unset($nums_array[$atual]);
				// 	$nums_array = array_values($nums_array);
				// 	$aux++;
				// 	echo "<strong>aumentou o aux.</strong>";
				// 	echo "<br>";
				// 	echo "array atual . " . print_r($nums_array, true);
				// 	//
				// }
				// else
				// {
				// 	echo "<strong>ja removeu mais de 1. PARAR</strong>";
				// 	echo "<br>";
				// 	$result = false;
				// 	// break;
				// }
				continue;
			}
			else
			{
				echo "o valor proximo nao é menor que o atual. continuar";
				echo "<br>";
			}
		}

		if ($result == false) {
			break;
		}
		echo "<hr>";
	}

	if (sizeof($nums_array) <= 2) {
		$result = true;
	}

	return $result;
}

$nums = $_POST["nums"];
// remove qualquer espaço
$nums = str_replace(' ', '', $nums);
// transforma em array
$nums = explode(",", $nums);

?>
<form action="#" method="POST">
	Números: <input type="text" name="nums" value="<?php echo $_POST['nums'] ?? NULL?>">
	<input type="submit" value="Enviar">
</form>
<?php
if(SequenciaCrescente($nums)){
	echo "<h1>TRUE</h1>";
}
else
{
	echo "<h2>FALSE</h2>";
}
?>