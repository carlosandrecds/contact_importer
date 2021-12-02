<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/CTRL_PAI.php');

class Logs extends CTRL_PAI {

	function __construct() {
		parent::__construct();
		
		$this->menuativo = strtolower(base_url().get_class());

		$id = $this->session->userdata('id');

		$ident = $id;

		$this->configuracao = (object) 
		[
			'tabela' => 'logs',
			'descritivo' => 'Error logs',
			'subtitulo' => "Here you can find the contacts that couldn't be imported",
			'icone'		=> 'fa fa-user-times',
			'chave' => 'idlogs',

			'colunas' => 
			[
				'idlogs' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],

				'name' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Contact Name', 
					'tamanho' => 10
				],

				'data' => (object) 
				[
					'tipo' => 'datetime', 
					'descricao' => 'Date of error', 
					'tamanho' => 10
				],

				'email' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Cause of the error', 
					'tamanho' => 10
				],

				'cause' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Cause of the error', 
					'tamanho' => 10,
					'style' 	=> 'color: red',
				],

				'status' => (object) 
				[
					'tipo' => 'bit', 
					'descricao' => 'Status'
				],
				
			],

			'colunas_view' => 
			[
				'idlogs' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],

				'name' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Name', 
					'tamanho' => 4
				],

				'cause' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Cause of the error', 
					'tamanho' => 10,
					'style' 	=> 'color: red',
				],

				'data' => (object) 
				[
					'tipo' => 'datetime', 
					'descricao' => 'Date of error', 
					'tamanho' => 10
				],


			],

			'colunas_editar' => 
			[
				'name' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Contact Name', 
					'tamanho' => 10
				],

				'email' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Cause of the error', 
					'tamanho' => 10
				],
			]
		];
    }    

    public function adicionar() 
    {
		parent::adicionar();
    }
	
	public function adicionar_acao() 
    {
		parent::adicionar_acao();

		//PEGA O ID DO USUÁRIO LOGADO PARA SER USADO COMO FILTRO NAS QUERIES
		$iduser = $this->session->userdata('id');
		$this->dados['status'] = 1;
		//INSERE NA TABELA "usuarios" O ID DO USUÁRIO LOGADO PARA QUE SEJA USADO POSTERIORMENTE NAS QUERIES
		$this->dados['idusuario'] = $iduser;
		
		//CASO A INSERÇÃO FUNCIONE ELE INSERE E RETORNA UMA MENSAGEM DE SUCESSO OU NÃO
		if ( $this->db->insert($this->configuracao->tabela, $this->dados) ){
        	$this->session->set_flashdata('message', msg_json('Added!!!', 1) );
        }else{
        	$this->session->set_flashdata('message', msg_json('Erro to add', 2) );
		}
		redirect(site_url($this->router->class));
    }
	
	public function editar($id) 
    {		
		parent::editar($id);
    }
	
	public function editar_acao() 
    {	
		parent::editar_acao();
		
		$this->db->where($this->configuracao->chave, $this->input->post($this->configuracao->chave ,TRUE));

        if ( $this->db->update($this->configuracao->tabela, $this->dados) and $this->passa_upload ){
        	$this->session->set_flashdata('message', msg_json('Updated!', 1) );
        }else{
        	if ($this->passa_upload) {
        		$this->session->set_flashdata('message', msg_json('Erro when updating!', 2) );
        	}
        }
        redirect(site_url($this->router->class));
    }
}
