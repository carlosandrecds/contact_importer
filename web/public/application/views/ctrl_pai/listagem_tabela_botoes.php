<?php

echo '<td align="center">';

// echo '<span style="display: flex; float: center;">';
echo '<span style="display: flex; justify-content: space-around;">';

// INCLUI BOTÕES ADICIONAIS DE LISTAGEM
foreach ($this->botoes_listagem as $k => $botao) {	

	$substituir = [];
	preg_match_all('/\[[^\]]*\]/', $botao->href, $substituir);										

	$hrefcorrigido = $botao->href;

	foreach ($substituir[0] as $kiu => $sub) {
			$var_substituir = $sub;

			$semultimo = substr($var_substituir, 0, -1);
			$variavel = substr( $semultimo , 1);

			$hrefcorrigido = str_replace($var_substituir, $r->$variavel, $hrefcorrigido);
	
	}

	echo '<a href="'.$hrefcorrigido.'" class="'.$botao->classe.'"> '.(($botao->icone != '') ? "<i class='$botao->icone'></i>" : '' ).' '.$botao->texto.' </a>';
}

echo '<div class="btn-group m-l-10" role="group" title="" >';

	echo '<a style="padding-right: 10px !important;" href="'.base_url().$this->router->class.'/editar/'.$r->$chave.'/'.$this->master_detalhe_querystring.'"><button  class="btn waves-effect waves-light btn-warning btn-outline-warning" style="border-radius: 15px !important;><i class="icofont icofont-exchange"></i>Edit</button></a>';
	
	echo '<a href="javascript:void(0)" role="button" 
	'.$this->configuracao->chave.'="'.$r->$chave.'" class="botaoexcluir" title="Excluir">
		<button class="btn waves-effect waves-light btn-danger btn-outline-danger" style="border-radius: 15px !important;"><i class="icofont icofont-not-allowed"></i>Delete</button>
  </a>';

echo '</div>';

echo '</span>';

echo '</td>';

