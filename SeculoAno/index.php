<?php
// usando o PHP 7, costumo deixar claro o tipo dos dados para facilitar
declare(strict_types=1);

// retorna o século a qual o ano informado pertence.
function SeculoAno(int $ano)
{
	// esse metodo pode ser feito de N formas, uma das formas é:
	// dividir o ano por 100 e arredondar para cima
	// isso fará com que vc pegue o o numero quebrado e arredonde para cima, já que o século sempre vira a partir do ano 1
	// então em 2000 ainda é século 20
	// mas em 2001 (q será 20,01 vai arredondar para cima e ficará 21) ja é século 21

	if (intval($ano)) {
		$sec = ceil($ano/100);

		if ($sec <= 0) {
			return "Não é um ano válido";
		}
		
		return $sec;
	}
	else
	{
		return "não é um ano valido";
	}

	// outras formas de se fazer é pegando os 2 primeiros digitos e somando com o ultimo
	// ou criando um switch ou if encadeado com cada opcao (uma forma porem nao muito prático nem boa)
}
// recebe o ano use um cast para transformar em int OU podemos usar um 
$ano = isset($_POST["ano"]) && !empty($_POST["ano"]) ? (int) $_POST["ano"] : NULL;

?>
<form action="#" method="POST">
	Ano: <input type="number" name="ano">
	<input type="submit" value="Enviar">
</form>

<?php
if (!empty($ano) && isset($ano)) {
	echo "O século do ano <strong>" . $ano . "</strong> é: <strong>" . SeculoAno($ano) . "</strong>";
}
?>