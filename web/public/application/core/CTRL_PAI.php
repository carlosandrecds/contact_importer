<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "CTRL_PAI_FILTROS.php";

class CTRL_PAI extends CI_Controller {

	function __construct() {

        parent::__construct();

        $this->iduser = $this->session->userdata('id');

        $this->filtros = new Filtros();
		$iduser = $this->session->userdata('id');
        $this->configuracao_filtros = [];

        // MASTER DETALHE
        $this->master_detalhe 		    	= false;
        $this->master_detalhe_coluna		= '';
		$this->master_detalhe_querystring	= '';
		//ESTÁ VARIÁVEL FILTRA A QUERY SELECT QUE RETORNA OS CONTEÚDOS DAS PÁGINAS
		//TRAZENDO APENAS O QUE DIZ RESPEITO O USUÁRIO
		$this->master_detalhe_filtro 	 	= 'and idusuario = '.$iduser.'';
		
        // CONFIGURAÇÃO PAGINAÇÃO
        $this->per_page = 10;

        $this->botoes_listagem = [];

        $this->rota = 'rota_pai';

        $this->script_footer = '';

        // INCLUDES DAS VIEWS

        $this->listagem_header 		   = 'listagem_header.php';
        $this->listagem_tabela_colunas = 'listagem_tabela_colunas.php';
        $this->listagem_tabela_botoes  = 'listagem_tabela_botoes.php';

    }

    public function index()
	{
        return $this->listagem();		
	}

	function listagem(){

		$this->load->library('table');

        $this->load->library('pagination');
		
		$config['base_url'] = strtolower(base_url().$this->rota).'/listagem';

		// echo "select count(".$this->configuracao->chave.") total 
		// 										  from ".$this->configuracao->tabela." 
		// 										  where status = 1 $this->master_detalhe_filtro";
		
        $config['total_rows'] = $this->db->query("select count(".$this->configuracao->chave.") total 
												  from ".$this->configuracao->tabela." 
												  where status = 1 $this->master_detalhe_filtro")->row()->total;
		
												  
		$this->data['total'] = $config['total_rows'];

		$config['per_page'] = $this->per_page;
		
		$config = configuraPaginacao($config);
		
		$this->pagination->initialize($config);
		
		$this->data['paginacao'] = $this->pagination->create_links();

		$inicio = ( is_numeric($this->uri->segment(3)) ) ? $this->uri->segment(3) : 0;

		$userId = $this->session->userdata('id');

		$this->data[$this->configuracao->tabela] = $this->db->query("select * from ".$this->configuracao->tabela." 
														             where status = 1 $this->master_detalhe_filtro
																	 limit ".$inicio.", ".$this->per_page)->result();
		 
		$this->data['view'] = 'ctrl_pai/listagem';

		$this->load->view('app/template', $this->data);
    }

    function relatorio(){

		$this->load->library('table');
        $this->load->library('pagination');        
		
		$config['base_url'] = $this->base_url;
        $config['total_rows'] = $this->db->query($this->sql_total)->row()->total;
												  
		$this->data['total'] = $config['total_rows'];
		$config['per_page'] = $this->per_page;
		
		$config = configuraPaginacao($config);
		
		$this->pagination->initialize($config);
		
		$this->data['paginacao'] = $this->pagination->create_links();
		$inicio = ( is_numeric($this->uri->segment(3)) ) ? $this->uri->segment(3) : 0;
		
		$this->data[$this->configuracao->tabela] = $this->db->query("$this->sql_dados
														             limit ".$inicio.", ".$this->per_page)->result();
        $this->data['view'] = $this->view;
        $this->load->view('app/template', $this->data);	
    }

    public function adicionar() 
    {

		$this->data = array(
			'button' => 'Adicionar',
			'action' => site_url($this->router->class.'/adicionar_acao/').$this->master_detalhe_querystring
		);
		
		foreach($this->configuracao->colunas as $c => $v ) :
			$this->data[$c] = set_value($c);
		endforeach;

		$this->data['view'] = 'ctrl_pai/editar';
		$this->load->view('app/template', $this->data);

    }

    public function adicionar_acao() 
    {

    	$passa_upload = true;
		
		$this->dados = [];
		foreach($this->configuracao->colunas as $c => $v ) :
			if($v->tipo == 'datetime') :
				$this->dados[$c] = dateTimeToUS($this->input->post($c), true); 
			elseif($v->tipo == 'decimal') :
				$this->dados[$c] = moeda_unmask($this->input->post($c));
			elseif($v->tipo == 'moedadigital') :
				$this->dados[$c] = moeda_unmask($this->input->post($c));
			elseif($v->tipo == 'file') :

				$config['upload_path'] = 'files/'.$v->diretorio;
				$config['allowed_types'] = $v->tipos;
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload($c))
				{
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('message', msg_json('There was a problem during the upload: '.$error, 2) );
					$passa_upload = false;
				}else{

					$data = array('upload_data' => $this->upload->data());
					$nomeFinal = $data['upload_data']['file_name'];
					$diretorioTotal = $data['upload_data']['file_path'];
					$this->dados[$c] = $this->upload->data()['file_name'];		
				}
			else:
				$this->dados[$c] = $this->input->post($c, true);
			endif;								
		endforeach;	

		if ($this->master_detalhe == true) :
			$this->dados[$this->master_detalhe_coluna] = $this->input->get($this->master_detalhe_coluna);
		endif;
		
    }

    public function editar($id) 
    {
		
		$this->db->where($this->configuracao->chave, $id);
		
        $row = $this->db->get($this->configuracao->tabela)->row();
		
        if ($row) {
            $this->data = array(
                'button' => 'Atualizar',
                'action' => site_url($this->router->class.'/editar_acao/').$this->master_detalhe_querystring
			);
			
			foreach($this->configuracao->colunas as $c => $v ) :
					$this->data[$c] = set_value($c, $row->$c);						
			endforeach;

			$this->data['view'] = 'ctrl_pai/editar';
			$this->load->view('app/template', $this->data);
        } else {
            $this->session->set_flashdata('message', msg_json('File not found!', 2) );
			redirect(site_url(get_class()).$this->master_detalhe_querystring);
			
        }
	}

    public function editar_acao() 
    {
    	$this->db->where($this->configuracao->chave, $this->input->post($this->configuracao->chave ,TRUE));
        $row = $this->db->get($this->configuracao->tabela)->row();
		
		$this->passa_upload = true;
		
		$this->dados = [];
		foreach($this->configuracao->colunas as $c => $v ) :
			if($v->tipo == 'datetime') :
				$this->dados[$c] = dateTimeToUS($this->input->post($c)); 
			elseif($v->tipo == 'decimal') :
				$this->dados[$c] = moeda_unmask($this->input->post($c));
			elseif($v->tipo == 'moedadigital') :
				$this->dados[$c] = moeda_unmask($this->input->post($c));
			elseif($v->tipo == 'file') :

				// só altera se o arquivo for diferente

				//if ($row->$c != $_FILES[$c]['name']) :

					$config['upload_path'] = 'files/'.$v->diretorio;
					$config['allowed_types'] = $v->tipos;
					$config['encrypt_name'] = TRUE;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload($c))
					{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('message', msg_json('There was a problem during the upload: '.$error, 2) );
						$this->passa_upload = false;
					}else{

						$data = array('upload_data' => $this->upload->data());
						$nomeFinal = $data['upload_data']['file_name'];
						$diretorioTotal = $data['upload_data']['file_path'];
						$this->dados[$c] = $this->upload->data()['file_name'];			
					}

				//endif;
			else:
				$this->dados[$c] = $this->dados[$c] = $this->input->post($c);
			endif;								
		endforeach;	

		if ($this->master_detalhe) :
			$this->dados[$this->master_detalhe_coluna] = $this->input->get($this->master_detalhe_coluna);
		endif;

    }

    function excluir($id) 
    {	
		
        $this->db->where($this->configuracao->chave, $id);
        $row = $this->db->get($this->configuracao->tabela)->row();
		
        if ($row) {
            $this->db->where($this->configuracao->chave, $id);
			$this->db->update($this->configuracao->tabela, ['status' => 2] );
			
            $this->session->set_flashdata('message', msg_json('Record successfully deleted!', 1) );
            redirect(site_url($this->router->class).$this->master_detalhe_querystring);
        } else {
            $this->session->set_flashdata('message', msg_json('Register not found!', 2) );
            redirect(site_url($this->router->class).$this->master_detalhe_querystring);
        }
    }

}
