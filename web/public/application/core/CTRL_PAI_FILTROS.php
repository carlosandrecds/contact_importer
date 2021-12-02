<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filtros {

	function __construct() {
		$this->CI =& get_instance();
	}

	function seta_valores(){

		foreach($this->CI->configuracao_filtros as $c => $filtros ) :	
											
			$$c = $this->CI->input->get($c);

			if ( isset($$c) ){
				$filtros->valor = $$c;
			}else{
				$filtros->valor = $filtros->valor_default;
			}	

	    endforeach;
	}

	function gera_sql_filtro(){

		$sql_retorno = '';

		foreach($this->CI->configuracao_filtros as $c => $filtros ) :	

			// substitui a variavel [VALOR] pelo valor do filtro
			$sql_corrigida = str_replace('[VALOR]', "'$filtros->valor'", $filtros->filtro_sql);

			if ($filtros->valor == '') :
				if (!$filtros->branco_tudo) :
					$sql_retorno .= " AND $sql_corrigida";
				endif;
			else :
				$sql_retorno .= " AND $sql_corrigida";			
			endif;
			

	    endforeach;

	    return $sql_retorno;
	}

}