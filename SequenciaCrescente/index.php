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
		
		if (isset($nums_array[$ant])) {
			if ($nums_array[$atual] > $nums_array[$ant]) {
				$i++;
			}
			else
			{
				if ($nums_array[$atual] == $nums_array[$ant]) {
					$aux_igual++;
				}
				if ($aux_igual > 1) {
					$result = false;
				}
				else
				{
					$result = true;
				}
				if ($aux < 1) {
					if (isset($nums_array[$prox])) {
						if ($nums_array[$ant] >= $nums_array[$atual]
							&& $nums_array[$ant] >= $nums_array[$prox]) {
							if (isset($nums_array[$prox+1])) {
								if ($nums_array[$ant] >= $nums_array[$prox+1]) {
									unset($nums_array[$ant]);
									$nums_array = array_values($nums_array);
									$aux++;
								}
								else
								{
									unset($nums_array[$atual]);
									$nums_array = array_values($nums_array);
									$aux++;
								}
								continue;
							}
							else
							{
								unset($nums_array[$ant]);
								$nums_array = array_values($nums_array);
								$aux++;
							}
						}
						else
						{
							unset($nums_array[$ant]);
							$nums_array = array_values($nums_array);
							$aux++;
						}
					}
					else
					{
						$i++;
					}
				}
				else
				{
					$result = false;
				}
			}
		}
		else
		{
			$i++;
		}

		if (isset($nums_array[$prox])) {
			if ($nums_array[$atual] > $nums_array[$prox]) {
				continue;
			}
		}

		if ($result == false) {
			break;
		}
	}

	if (sizeof($nums_array) <= 2) {
		$result = true;
	}

	return $result;
}

$nums = $_POST["nums"] ?? NULL;
if ($nums) {
	// remove qualquer espaço
	$nums = str_replace(' ', '', $nums);
	// transforma em array
	$nums = explode(",", $nums);
}
?>
<form action="#" method="POST">
	Números: <input type="text" name="nums" value="<?php echo $_POST['nums'] ?? NULL?>">
	<input type="submit" value="Enviar">
</form>
<?php
if ($nums) {
	if(SequenciaCrescente($nums)){
		echo "<h1>TRUE</h1> se remover 1 elemento o array se torna <strong>crescente</strong> OU já <strong>crescente</strong>.";
	}
	else
	{
		echo "<h2>FALSE</h2> Mesmo que remova 1 elemento o array ainda <strong>não é crescente</strong>.";
	}
}
?>