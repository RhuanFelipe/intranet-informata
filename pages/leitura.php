<?php 
$ponteiro = fopen ("../db_scripts/VALIDACAO.LOG","r");
$i = 1;
while (!feof ($ponteiro)) {

  $linha = fgets($ponteiro,4096);
  //$function = strripos($linha,"FUNCTION");

  //echo $linha. "<br>";
  
  $i++;
}

fclose ($ponteiro);

$arquivo = file("../db_scripts/VALIDACAO.LOG");
for($i = 0; $i < count($arquivo); $i++) {
	$function = strpos($arquivo,"FUNCTION");
	var_dump($function);
	print $arquivo[$i]."<br>".$i;
}
?>