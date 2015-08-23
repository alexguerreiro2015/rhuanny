<?php  


/**
* 
*/
class AdminLTE
{
	
	function __construct(){		
	}	

	public function createNormalBox(){}

	public function createFullTable(	$tituloTabela, 
										$tabelaId, 
										$arrayNomeColunas, 
										$arrayValores, 
										$podeEditar=false, 
										$controllerPath										
									) {
		
		$stringHTML = "
							<div class='box'>							
								<div class='box-body'>
									<table id='". $tabelaId. "'class='table table-bordered table-striped'>
										<thead>
											<tr>
						";
		
		$stringHTMLCabecalho = "";
		foreach ($arrayNomeColunas as $nomeColuna) {
			$stringHTMLCabecalho .=	"<th>". $nomeColuna ."</th>";				
		}

		$stringHTML .= $stringHTMLCabecalho;

		$stringHTML .= "</tr></thead><tbody>";

		foreach ($arrayValores as $row) {
			$stringHTML .= "<tr>";
			
			foreach ($row as $column) {
				$stringHTML .= "<td>".$column."</td>";			
			}

			if($podeEditar){
				$stringHTML .= "<td>
									<a href='". $controllerPath."/editar/".$row['id']. "'
										<i class='fa fa-fw fa-pencil'>
										</i>									
									<a>
									<a href='". $controllerPath."/excluir/".$row['id']."'
										<i class='fa fa-fw fa-times'>
										</i>									
									</a>
								</td>";
			}	

			$stringHTML .= "</tr>";	
		}

		$stringHTML .= "</tbody><tfoot>";
		$stringHTML .= '</tfoot></table></div></div>
						<script>
							$(function () {
								$( "#'.$tabelaId.'").DataTable();        
							});
						</script>';

		return $stringHTML;
	}
}

?>
