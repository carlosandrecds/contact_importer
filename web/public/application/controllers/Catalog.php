<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/CTRL_PAI.php');

class Catalog extends CTRL_PAI {

	function __construct() {

        parent::__construct();

        $this->menuativo = strtolower(base_url().get_class());

        $this->rota 	 = strtolower(get_class());

        $iduser = $this->session->userdata('id'); 

        $f_experiments = $this->db->query("select idexperiments, experiment from experiments where status = 1 and idusuario = $iduser")->result_array();

        $fonte_experiments = array_column($f_experiments, 'experiment', 'idexperiments');


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pokeapi.co/api/v2/pokemon?offset=0&limit=1118',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
    
        $this->dados['api'] = json_decode($response);

		$this->configuracao = (object) [

			'tabela' => 'pacientes',
			'descritivo' => 'My Pokemons',
			'subtitulo' => 'Manage your pokemons',
			'icone'		=> 'fa fa-shopping-basket',
			'chave' => 'idpacientes',
		];
    }

    function listagem(){

		$this->load->library('table');
		$this->per_page = 20;

        $this->data['view'] = 'catalog/listagem';
        $this->load->view('app/template', $this->data);
    }

    public function adicionar() 
    {
		parent::adicionar();
    }
	
	public function adicionar_acao() 
    {
		parent::adicionar_acao();	

        $iduser = $this->session->userdata('id');
        $this->dados['status'] = 1;
        $this->dados['idusuario'] = $iduser;
        
        if ($this->db->insert($this->configuracao->tabela, $this->dados)){
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
        //Cuidado
        // $passa_upload = ''; 
        if ( $this->db->update($this->configuracao->tabela, $this->dados) ){
        // if ( $this->db->update($this->configuracao->tabela, $this->dados) and $passa_upload ){
        	$this->session->set_flashdata('message', msg_json('Registro atualizado com sucesso!', 1) );
        }else{
        	if ($passa_upload) {
        		$this->session->set_flashdata('message', msg_json('Erro ao atualizar dados!', 2) );
        	}
        }

        redirect(site_url($this->router->class).$this->querystringpai);
	}
    
    public function save_pokemon($pokemonName){

        $iduser = $this->session->userdata('id');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pokeapi.co/api/v2/pokemon/'.$pokemonName.'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
    
        $res = json_decode($response);

        $PokemonBx = $res->base_experience;
        $PokemonName = $res->name;
        $PokemonId = $res->id;
        $pokemonpic = $res->sprites->front_default;

		$result = $this->db->query("insert into pokemon (idusuario, pokemon_name, bx, pokemon_pic, pokemon_id) values ($iduser, '$PokemonName',$PokemonBx, '$pokemonpic', $PokemonId)");
		
		if ($result)
		{
        	$this->session->set_flashdata('message', msg_json('Pokemon added to your set', 1) );
		} else

		{
			$this->session->set_flashdata('message', msg_json('Sorry! There was a problem when trying to add the Pokemon !', 2) );
        }

		redirect(site_url($this->router->class));
    }
}