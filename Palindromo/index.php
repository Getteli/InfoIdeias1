<?php

// usando o PHP 7, costumo deixar claro o tipo dos dados para facilitar
declare(strict_types=1);

function palindromo(string $text)
{
	// poderia ser feito com um FOR de tras para frente e ir armazenando em uma variavel
	// cada indice (ja que uma string é um array), e depois verificar o se são iguais
	// POREM o PHP possui um metodo proprio q inverte strrev()
	$reverse = strrev($text);
	
	if ($reverse === $text) {
		return true;
	}
	else
	{
		return false;
	}
}

$string = isset($_POST["texto"]) && !empty($_POST["texto"]) ? $_POST["texto"] : NULL;
?>

<form action="#" method="POST">
	texto: <input type="text" name="texto">
	<input type="submit" value="Enviar">
</form>

<?php
if (!empty($string)) {
	// responde se é um palindromo ou nao
	if (palindromo($string)) {
		echo "O texto: <strong>" . $string . "</strong> é um <strong>palindromo</strong>";
	}
	else
	{
		echo "O texto: <strong>" . $string . "</strong> Não é um <strong>palindromo</strong>";
	}
}
?>