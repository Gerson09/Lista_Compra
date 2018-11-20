<?php
	include_once 'model/clsProduto.php';
	include_once 'dao/clsConexao.php';
	include_once 'dao/clsprodutoDAO.php';
	$ttt = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista Compras</title>
	<meta charset="utf-8">
</head>
<body>

	<h1 align="center">produtos</h1>

	<br><br><br>

	<a href="frmProduto.php"><button>Cadastrar novo produto</button></a>

	<br><br>
	<?php
		$lista = produtoDAO::getProdutos();
		if ($lista->count()==0) {
			echo "<h2><b>Nenhum produto cadastrada</b></h2>";
		}else{
	?>
	<table border="1">
		<tr>
			<th>Código</th>
			<th>Foto</th>
			<th>Nome do produto</th>
			<th>Preço</th>
			<th>Editar</th>
			<th>Excluir</th>
			<th>Total</th>
		</tr>

		<?php
			foreach ($lista as $produto) {

				$total= $produto->getPreco() * $produto->getQuantidade();




				echo "<tr> <td>".$produto->getId()."</td>";
				echo "<td>".$produto->getNome()."</td>";
				echo "<td>".$produto->getPreco()."</td>";
				echo "<td>".$produto->getQuantidade()."</td>";
				echo "<td> <a href='frmProduto.php?editar&idProduto=".$produto->getId()."'>
					<button>Editar</button></a></td>";
				echo "<td> <a href='controller/salvarProduto.php?excluir&idProduto=".$produto->getId()."'>
					<button>Excluir</button></a></td>";
					echo "<td>R$ ".$total."</td>";
				echo "</tr>";
			}
		?>

		<tr>
			<td colspan="6"></td>
			<td colspan="1"><?php foreach ($lista as $total) {
				$t = $total->getPreco();
				$p = $total->getQuantidade();
				$ttt += $p * $t;
			} echo "R$ " . $ttt;?></td>
		</tr>

	</table>

	<br><br><br>
	<?php
		}
	?>
</body>
</html>
