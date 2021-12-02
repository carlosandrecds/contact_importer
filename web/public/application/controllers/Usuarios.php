<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/CTRL_PAI.php');

class Usuarios extends CTRL_PAI {

	function __construct() 
	{

        parent::__construct();

        $this->menuativo = strtolower(base_url().get_class());

        // $f_experiments = $this->db->query("select experiment, experiment from experiments where status = 1")->result_array();

		// $fonte_experiments = array_column($f_experiments, 'experiment', 'experiment');
		
		$nivel = array(
			//Administradores do sistema
			'admin' 		=> 'Administrador',
			
			//Profissional solo
			'medico' 		=> 'Medico',

			//Estabelecimento que possui vários profissionais
			'instituicao' 	=> 'Instituição',

			//Médico associado a uma determinada instituição
            'associado' 	=> 'Associado'
		);
		
		$this->configuracao = (object) [
			'tabela' => 'usuarios',
			'descritivo' => 'USUÁRIOS',
			'subtitulo' => 'Gerenciamento de usuários e suas permissões no sistema',
			'icone'		=> 'fa fa-building',
			'chave' => 'idusuario',
            
			'colunas' => [

				'idusuario' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],

				'nome'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Nome', 
					'tamanho' => 5
				],

				'email'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'E-mail', 
					'tamanho' => 5
				],
				
				'profissao'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Profissão', 
					'tamanho' => 5
                ],

				'nivel'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Nivel administrativo', 
					'tamanho' => 5, 
					'fonte' => $nivel
				],

				// 'CPF_CNPJ' => (object) 
				// [
				// 	'tipo' => 'int', 
				// 	'descricao' => 'CPF/CNPJ', 
				// 	'tamanho' => 5
				// ],

				'idade' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => 'Idade', 
					'tamanho' => 3
				],

				// 'cep' => (object) 
				// [
				// 	'tipo' => 'varchar', 
				// 	'descricao' => 'CEP', 
				// 	'tamanho' => 2
				// ],

				// 'endereco_bairro'	=> (object) 
				// [
				// 	'tipo' => 'varchar', 
				// 	'descricao' => 'Bairro', 
				// 	'tamanho' => 3
				// ],

				// 'endereco_rua'	=> (object) 
				// [
				// 	'tipo' => 'varchar', 
				// 	'descricao' => 'Rua', 
				// 	'tamanho' => 3
				// ],

				'senha'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Senha', 
					'tamanho' => 4
				],

				'status' => (object) 
				[
					'tipo' => 'decimal', 
					'descricao' => 'Status'
				],

            ],

            //VIEW
			'colunas_view' => [
				'idusuario' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],

				'nome'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Nome'
				],

				'status' => (object) 
				[
					'tipo' => 'decimal', 
					'descricao' => 'Status'
				],

				'nivel'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Nivel administrativo', 
					'tamanho' => 3, 
					'fonte' => $nivel
                ],
			],

			//EDITION
			'colunas_editar' => [
				'nome'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Nome',
					'tamanho' => 4
				],

				'nivel'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Nível'
				],

				'email'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'E-mail', 
					'tamanho' => 3
				],

				'profissao'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Profissão', 
					'tamanho' => 3
				],

				'idade' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => 'Idade', 
					'tamanho' => 1
				],

				// 'CPF_CNPJ' => (object) 
				// [
				// 	'tipo' => 'varchar', 
				// 	'descricao' => 'CPF/CNPJ', 
				// 	'tamanho' => 2
				// ],

				// 'cep' => (object) 
				// [
				// 	'tipo' => 'varchar', 
				// 	'descricao' => 'CEP', 
				// 	'tamanho' => 2
				// ],

				// 'endereco_rua'	=> (object) 
				// [
				// 	'tipo' => 'varchar', 
				// 	'descricao' => 'Rua', 
				// 	'tamanho' => 4
				// ],

				// 'endereco_bairro'	=> (object) 
				// [
				// 	'tipo' => 'varchar', 
				// 	'descricao' => 'Bairro', 
				// 	'tamanho' => 4
				// ],

				'status' => (object) 
				[
					'tipo' => 'decimal', 
					'descricao' => 'Status'
				],

				'nivel'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Nivel administrativo', 
					'tamanho' => 3, 
					'fonte' => $nivel
				],
				
				'senha'	=> (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Senha', 
					'tamanho' => 3
				],
			]
		];
	}    
	
    public function listagem() 
    {
		$this->load->library('table');

		$this->data['amostras'] = $this->db->query("select * from ".$this->configuracao->tabela." 
													where status = 1")->result();
		
		$this->data['view'] = 'users/listagem';

		$this->load->view('app/template', $this->data);
    }   


    public function adicionar() 
    {
		parent::adicionar();
    }
	
	public function adicionar_acao() 
    {
		
		parent::adicionar_acao();	

		$this->dados['status'] = 1;
		
		if ( $this->db->insert($this->configuracao->tabela, $this->dados) ){
        	$this->session->set_flashdata('message', msg_json('Registro adicionado com sucesso!!!', 1) );
        }else{
        	$this->session->set_flashdata('message', msg_json('Erro ao adicionar registro', 2) );
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
        		$this->session->set_flashdata('message', msg_json('Error when updating!', 2) );
        	}
        }

        redirect(site_url($this->router->class));
	}
}
