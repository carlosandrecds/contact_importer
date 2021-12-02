<?php

foreach($this->configuracao->colunas_view as $c => $v ) :

	if (isset($v->style)) :
		$style = "$v->style";
	else :
		$style = '';
	endif;

	if (isset($v->class)) :
		$class = "$v->class";
	else :
		$class = '';
	endif;
	

	if ( $v->tipo == 'FK' ) :
		$conteudo = @$v->fonte[$r->$c];

	elseif ( $v->tipo == 'datetime') :
		$conteudo = formataDataHora($r->$c);

	elseif ( $v->tipo == 'fileimagem') :
		$urlimagem = $r->$c;
		$conteudo = "<img src='$urlimagem' style='$style'/>";

	elseif ( $v->tipo == 'decimal') :
		$conteudo = moeda($r->$c);
		$style = 'text-align:right; '.$style;

	elseif ( $v->tipo == 'moedadigital') :
		$conteudo = moedadigital($r->$c);
		$style = 'text-align:right; '.$style;

	else :
		$conteudo = $r->$c;
	endif;	

	$style = "style='$style'";
	$class = "style='$class'";

	echo "<td $style $class>";
		echo $conteudo;
	echo "</td>";			
endforeach;	