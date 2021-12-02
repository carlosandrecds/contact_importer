<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/CTRL_PAI.php');

class ContactList extends CTRL_PAI {

	function __construct() {
		parent::__construct();

		$available = array(
            '0' => 'Not Available',
			'1' => 'Available'
        );		
		
		$this->menuativo = strtolower(base_url().get_class());

		$id = $this->session->userdata('id');

		$this->configuracao = (object) 
		[
			'tabela' => 'contacts',
			'descritivo' => 'Manage your contacts',
			'subtitulo' => 'Here you view and manage your contacts',
			'icone'		=> 'fa fa-group',
			'chave' => 'idcontacts',

			'colunas' => 
			[
				'idcontacts' => (object) 
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

				'phone' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Contact Phone number', 
					'tamanho' => 10
				],

				'address' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Contact Address', 
					'tamanho' => 10
				],

				'lastDigits' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Last Card Digits', 
					'tamanho' => 10
				],

				'date_of_birth' => (object) 
				[
					'tipo' => 'datetime', 
					'descricao' => 'Brith date', 
					'tamanho' => 10
				],

				'email' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Contact email', 
					'tamanho' => 10
				],

				'status' => (object) 
				[
					'tipo' => 'bit', 
					'descricao' => 'Status'
				],
				
			],

			'colunas_view' => 
			[
				'idcontacts' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],

				'name' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Trade name', 
					'tamanho' => 4
				],

				'date_of_birth' => (object) 
				[
					'tipo' => 'datetime', 
					'descricao' => 'Birth date', 
					'tamanho' => 10
				],

				'lastDigits' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Last Card Digits', 
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

				'phone' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Contact Phone number', 
					'tamanho' => 10
				],

				'address' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Contact Address', 
					'tamanho' => 10
				],

				'lastDigits' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Last Card Digits', 
					'tamanho' => 10
				],

				'email' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Contact email', 
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

		$iduser = $this->session->userdata('id');

		$this->dados['status'] = 1;

		$this->dados['idusuario'] = $iduser;
		

		if ( $this->db->insert($this->configuracao->tabela, $this->dados) ){
        	$this->session->set_flashdata('message', msg_json('Added successfully!!!', 1) );

        }else{
        	$this->session->set_flashdata('message', msg_json('Error adding record!', 2) );
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
		$iduser = $this->session->userdata('id');

		
		$this->db->where($this->configuracao->chave, $this->input->post($this->configuracao->chave ,TRUE));

        if ( $this->db->update($this->configuracao->tabela, $this->dados) and $this->passa_upload ){
        	$this->session->set_flashdata('message', msg_json('Updated successfully!', 1) );
        }else{
        	if ($this->passa_upload) {
        		$this->session->set_flashdata('message', msg_json('Error updating data!', 2) );
        	}
        }
        redirect(site_url($this->router->class));
    }



	// public function getresponse(){
		
	// 	$iduser = $this->session->userdata('id');

	// 	//THE TRADE LIST CONTAINS THE POKEMONS THAT WILL BE REPLACED IN THE USER SET
	// 	$trade_list = $_POST['trade_listing'];

	// 	//THE USER LIST CONTAINS THE POKEMONS THAT WILL BE GIVEN AWAY
	// 	$user_list = $_POST['user_list'];

	// 	//POKEMON THAT LOGGED USER IS RECEIVING
	// 	$result_trade_list = $this->db->query("select * from trade where idtrade = '$trade_list' and status = 1")->result();

	// 	foreach(@$result_trade_list as $key1)
	// 	{
	// 		$bx_trade = $key1->bx;
	// 		$idtrade = $key1->idtrade;
	// 		$id_user_creator_trade = $key1->idusuario;
	// 		$slot1 = $key1->slot1;
	// 		$slot2 = $key1->slot2;
	// 		$slot3 = $key1->slot3;
	// 		$slot4 = $key1->slot4;
	// 		$slot5 = $key1->slot5;
	// 		$slot6 = $key1->slot6;
	// 	}

	// 	//POKEMON THAT LOGGED USER IS GIVING
	// 	$result_user_list = $this->db->query("select * from trade where idtrade = '$user_list' and status = 1")->result();

	// 	//GIVEN AWAY LIST
	// 	foreach(@$result_user_list as $key)
	// 	{
	// 		$bx_user = $key->bx;
	// 		$idtrade_user = $key->idtrade;
	// 		$trade_name = $key->name;
	// 		$id_user_creator_trade_user = $key->idusuario;
	// 		$slot1_user = $key->slot1;
	// 		$slot2_user = $key->slot2;
	// 		$slot3_user = $key->slot3;
	// 		$slot4_user = $key->slot4;
	// 		$slot5_user = $key->slot5;
	// 		$slot6_user = $key->slot6;
	// 	}

	// 	$abs_value = $bx_trade - $bx_user;

	// 	//IN CASE THE TRADE IS FAIR
	// 	if( abs($abs_value) <= 300){
			
	// 		//GET THE TRADE DONE
	// 		//SLOT1
	// 		if( $slot1 != null ){
	// 			$this->update_user_side($slot1, $iduser, $id_user_creator_trade);
	// 			$this->update_user_side($slot1_user, $id_user_creator_trade, $iduser);
	// 		}
	// 		if( $slot2 != null ){
	// 			$this->update_user_side($slot2, $iduser, $id_user_creator_trade);
	// 			$this->update_user_side($slot2_user, $id_user_creator_trade, $iduser);
	// 		}
	// 		if( $slot3 != null ){
	// 			$this->update_user_side($slot3, $iduser, $id_user_creator_trade);
	// 			$this->update_user_side($slot3_user, $id_user_creator_trade, $iduser);
	// 		}
	// 		if( $slot4 != null ){
	// 			$this->update_user_side($slot4, $iduser, $id_user_creator_trade);
	// 			$this->update_user_side($slot4_user, $id_user_creator_trade, $iduser);
	// 		}
	// 		if( $slot5 != null ){
	// 			$this->update_user_side($slot5, $iduser, $id_user_creator_trade);
	// 			$this->update_user_side($slot5_user, $id_user_creator_trade, $iduser);
	// 		}
	// 		if( $slot6 != null ){
	// 			$this->update_user_side($slot6, $iduser, $id_user_creator_trade);
	// 			$this->update_user_side($slot6_user, $id_user_creator_trade, $iduser);
	// 		}

	// 		$this->update_pokemon_from_set_user($idtrade_user, $iduser);
	// 		$this->update_pokemon_from_set_user($idtrade, $id_user_creator_trade);

	// 		$this->logs($trade_name, $iduser);

	// 		$this->session->set_flashdata('message', msg_json('Successfully exchanged!', 1));
	// 		redirect(site_url($this->router->class));

	// 	}else{
	// 		$this->session->set_flashdata('message', msg_json('Sorry Pokemon trainer! The base experience does not make the trade fair :(!', 2) );
	// 		redirect(site_url($this->router->class)); 
	// 	}
	// }


	// function update_user_side($pokemon_name, $iduser, $id_user_creator_trade){
	// 	$update_qurey = $this->db->query("update `coin`.`pokemon` SET `idusuario` = '$iduser' WHERE `pokemon_name` = '$pokemon_name' and idusuario = '$id_user_creator_trade' and status = 1");
	// }


	// function update_pokemon_from_set_user($id_trade, $id_usuario){

	// 	$update_pokemon = $this->db->query("delete FROM `coin`.`trade` WHERE `idtrade` = '$id_trade' and idusuario = $id_usuario and status = 1");

	// 	if(!$update_pokemon){
	// 		$this->session->set_flashdata('message', msg_json('Error when deleting pokemon '.$name.' for user '.$id_usuario.' :(!', 2) );
	// 	}
	// }

	// function logs($name, $id) {

	// 	$date = date("Y/m/d h:i:sa");


	// 	$insert_logs = $this->db->query("insert into logs (name, idusuario, data) values ('$name', $id, '$date')");
	// }

}



