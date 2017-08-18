<?php
	@$consult = (int) $_REQUEST['position'];
	$tipoMsg = (!isset($_REQUEST['tipoMsg'])) ? '' : $_REQUEST['tipoMsg'];
	$responsavel = (!isset($_REQUEST['responsavel'])) ? 'Fulano' : trim(str_replace("_"," ",$_REQUEST['responsavel']));
	$numRel = (!isset($_REQUEST['numRel'])) ? '00.00.00.00' : $_REQUEST['numRel'];
	@$tipo = (int) $_REQUEST['tipo'];
	@$padrao = 0;
	@$linha = $_REQUEST['linha'];
	$dia = date('d');
	$mes = date('m');
	$ano = date('Y');
	$arquivo = (!isset($_REQUEST['arquivo'])) ? 'arquivo': $_REQUEST['arquivo'];
	$banco = (!isset($_REQUEST['banco'])) ? '11.11.11.11' : $_REQUEST['banco'];
	$reversao = (!isset($_REQUEST['reversao'])) ? '00.00.00.00' : $_REQUEST['reversao'];
	@$release = $_REQUEST['release'];
	$bases = (!isset($_REQUEST['bases'])) ? 'BASE' : $_REQUEST['bases'];
	$obj_name = (!isset($_REQUEST['obj_name'])) ? '' : $_REQUEST['obj_name'];
	$invalid = (!isset($_REQUEST['invalid'])) ? '' : $_REQUEST['invalid'];
	$inEnd = (!isset($_REQUEST['inEnd'])) ? '' : $_REQUEST['inEnd'];
	@$linhaBanco = $_REQUEST['linhaBanco'];

	if($consult == 0){

		if($release == 0)
			$release = 'PRJ';
		else
			$release = 'SAC';

		$sql = "begin <br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					dbagabos.montagem_pacotes.monta_pacote
				('E:\\app\\Monta_Pacote\\".$ano."\\".$mes."\\".$dia."\\".$arquivo."',
														  '".$banco."',
														  '".$reversao."', 
														  '".$release."',
														  'NORMAL',
														  'S');
						<br>
			end;<br>
			/
			";

	}else if($consult == 1){
		$sql = "";

		if($linha != ""){
			$sql = "select * from DBAMDATA.T994_VERSAO_SISTEMA where T994_VERSAO like '".$linha.".%' order by T994_DATA_APLICACAO desc;";	
			if($tipo == 1){
				$sql = str_replace("DBAMDATA","DBAWMS",$sql);
				$sql = str_replace("T994","TW994",$sql);
				$sql = str_replace($padrao,$linha,$sql);	
			}else{
				$sql = $sql;
			}

		}else{
			if(($linhaBanco == 17 || $linhaBanco == 30 || $linhaBanco == 60 || $linhaBanco == 10 || $linhaBanco == 11 || 
				$linhaBanco == 90 || $linhaBanco == 50 || $linhaBanco == 16 || $linhaBanco == 12 || $linhaBanco == 15)){
					$sql = "select * from DBAMDATA.T994_VERSAO_SISTEMA where T994_VERSAO like '".$linhaBanco.".%' order by T994_DATA_APLICACAO desc;";	
				}else{
					$sql = "select * from DBAWMS.T994_VERSAO_SISTEMA where T994_VERSAO like '".$linhaBanco.".%' order by T994_DATA_APLICACAO desc;";
					$sql = str_replace("T994","TW994",$sql);
				}
		}
		
	}else if($consult == 2){
		if($tipoMsg == 1){
			if($inEnd == 0){
				$sql = "Srs, ".$responsavel.",<br>
						Boa Tarde!<br>
						A base ".$bases." ira ficar indisponivel por 30min para atualização do release ".$numRel.".<br>
						Por favor, finalizem sua conexão com esse base, pois dentro de 1min o acesso será interrompido!
						Pela compreensão obrigado!
						Obs: Eu aviso se a base for liberada antes do estimado.";
			}else{
				$sql = "Srs, ".$responsavel."<br>
							Boa Tarde!<br>
							A base ".$bases." esta disponivel!
							Pela compreensão obrigado!
							.";
			}			
		}else{
			$sql = "";
			if($obj_name == 1){
				$sql = "FALHA AO APLICAR RELEASE!! <br>";
			}
			$sql .= 'Prezados, '.$responsavel.'. <br>
						release '.$numRel.' aplicado com sucesso na(s) bases: '.$bases.';<br>
						Todos os objetos foram recompilados com sucesso, não existem objetos inválidos

				';
			if($obj_name == 1){
				$sql = str_replace("com sucesso","sem sucesso",$sql);
				$sql .= "obs.: Em Anexo segue pacote montado e os logs de aplicação e reversão.
					Segue lista de erros o corridos na aplicação e reversão:";
			}else if($obj_name == 2){
				$sql = str_replace("não existem objetos inválidos","",$sql);
				$sql .= "Porém existe ".$invalid." objetos Inválidos, favor verificar o arquivo de log para identificar os objetos da base : ".$bases.".<br>";

				if($invalid == 1){
					$sql = str_replace("objetos Inválidos","objeto válido",$sql);
				}
			}
		}
	}else{
		$sql = 'aguardando...';
	}
	
	echo $sql;

?>
