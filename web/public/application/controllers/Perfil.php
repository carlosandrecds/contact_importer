<?php
//MOEDAS
defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/CTRL_PAI.php');

class Perfil extends CTRL_PAI {

	function __construct() {

		parent::__construct();		

        $this->menuativo = strtolower(base_url().get_class());
        
		$this->configuracao = (object) 
		[
			'tabela' => 'usuarios',
			'descritivo' => 'Settings',
			'subtitulo' => 'Configure your basic informations',
			'icone'		=> 'fa fa-tasks',
			'chave' => 'idusuario',

			'colunas' => 
			[
				'idusuario' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],

				'nome' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Full Name', 
					'tamanho' => 8
				],

                'email' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'E-Mail', 
					'tamanho' => 8
                ],

                'profissao' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Job Title', 
					'tamanho' => 8
                ],

                'idade'	=> (object) 
                [
                    'tipo' => 'int', 
                    'descricao' => 'Age',
                    'tamanho' => 3
				],
				
				'fotoperfil'=> (object) 
                [
                    'tipo' => 'file', 
                    'descricao' => 'Profile Pic', 
					'tamanho' => 10,
                    'diretorio' => 'fotouser/',
                    'tipos'	=> 'gif|jpg|jpeg|png',
                ],
                
			],

			'colunas_editar' => 
			[
				'idusuario' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],
				
				'nome' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Full Name', 
					'tamanho' => 6
                ],

                'email' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'E-Mail', 
					'tamanho' => 6
                ],

                'profissao' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Job Title', 
					'tamanho' => 3
                ],

                'idade'	=> (object) 
                [
                    'tipo' => 'int', 
                    'descricao' => 'Age',
                    'tamanho' => 3
                ],

                'fotoperfil'=> (object) 
                [
                    'tipo' => 'file', 
                    'descricao' => 'Profile Pic', 
                    'tamanho' => 2,
                    'diretorio' => 'fotouser/',
                    'tipos'	=> 'gif|jpg|jpeg|png',
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

		$this->dados['status'] = 1;
		
		if ( $this->db->insert($this->configuracao->tabela, $this->dados) ){
        	$this->session->set_flashdata('message', msg_json('Registro adicionado com sucesso!!!', 1) );
        }else{
        	$this->session->set_flashdata('message', msg_json('Erro ao adicionar registro', 1) );
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
        	$this->session->set_flashdata('message', msg_json('Registro atualizado com sucesso!', 1) );
        }else{
        	if ($this->passa_upload) {
        		$this->session->set_flashdata('message', msg_json('Erro ao atualizar dados!', 2) );
        	}
        }

        redirect(site_url($this->router->class));
    }
}