<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/CTRL_PAI.php');

class Import extends CTRL_PAI {

	function __construct() {

        parent::__construct();

        $this->menuativo = strtolower(base_url().get_class());

        $this->rota 	 = strtolower(get_class());

        $headerSelect = array(
            'name' => 'Name',
            'date_of_birth' => 'Date of birth',
            'phone' => 'Phone',
            'address' => 'Address',
            'cc' => 'Credit Card',
            'email' => 'Email'
        );

        //FETCH THE DATAS FROM THE DATABASE AND PUTS IN A DROP SELECT
        //THE array_column FUNCTION array_column() RETURNS THE VALUES FROM A SINGLE COLUMN OF THE INPUT, IDENTIFIED BY THE column_key
        $iduser = $this->session->userdata('id'); 

        $f_experiments = $this->db->query("select idexperiments, experiment from experiments where status = 1 and idusuario = $iduser")->result_array();

        $category = array_column($f_experiments, 'experiment', 'idexperiments');


		$this->configuracao = (object) 
		[
			'tabela' => 'contact_import',
			'descritivo' => 'Contact Import List',
			'subtitulo' => 'Manage your imports',
			'icone'		=> 'fa fa-file-excel-o',
			'chave' => 'idcontact_import',

			'colunas' => 
			[
				'idcontact_import' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],

				'import_name' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Name', 
					'tamanho' => 10
				],

				'date' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Date of creation', 
					'tamanho' => 10
				],

                'category'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Category', 
                    'tamanho' => 3, 
                    'fonte' => $category
                ],

                'file_name' => (object) 
				[
					'tipo' => 'file', 
					'descricao' => '', 
					'tamanho' => 10,
                    'diretorio' => 'samples/',
                    'tipos'	=> 'csv',
				],

				'c1'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 1 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c2'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 2 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c3'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 3 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c4'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 4 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c5'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 5 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c6'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 6 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

			],

			'colunas_view' => 
			[
				'idcontact_import' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],

				'import_name' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Name', 
					'tamanho' => 5
				],

				'date' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Date of creation', 
					'tamanho' => 10
				],
			],

			'colunas_editar' => 
			[
                'idcontact_import' => (object) 
				[
					'tipo' => 'int', 
					'descricao' => '#'
				],

				'import_name' => (object) 
				[
					'tipo' => 'varchar', 
					'descricao' => 'Name', 
					'tamanho' => 10
				],

                'category'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Category', 
                    'tamanho' => 3, 
                    'fonte' => $category
                ],

				'file_name' => (object) 
				[
					'tipo' => 'file', 
					'descricao' => '', 
					'tamanho' => 10,
                    'diretorio' => 'samples/',
                    'tipos'	=> 'csv',
				],

				'c1'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 1 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c2'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 2 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c3'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 3 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c4'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 4 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c5'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 5 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
                ],

				'c6'=> (object) 
                [
                    'tipo' => 'FK', 
                    'descricao' => 'Column 6 Field', 
                    'tamanho' => 3, 
                    'fonte' => $headerSelect
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

		$date = date("Y/m/d h:i:sa");

        $this->dados['date'] = $date;

        $this->dados['idusuario'] = $iduser;

		$file = $this->dados['file_name'];

		$c1 = $this->dados['c1'];
		$c2 = $this->dados['c2'];
		$c3 = $this->dados['c3'];
		$c4 = $this->dados['c4'];
		$c5 = $this->dados['c5'];
		$c6 = $this->dados['c6'];

		//IF THE TRANSPILATION IS TRUE THEN I PROCEED
		$readCSV = $this->readCsv($file, $c1, $c2, $c3, $c4, $c5, $c6);

		if(!$readCSV){
			echo 'Deu ruim por enquanto';
		}

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

		$this->db->where($this->configuracao->chave, $this->input->post($this->configuracao->chave ,TRUE));

        if ( $this->db->update($this->configuracao->tabela, $this->dados) ){
        	$this->session->set_flashdata('message', msg_json('Registry updated!', 1) );
        }else{
        	if ($passa_upload) {
        		$this->session->set_flashdata('message', msg_json('Error while updating!', 2) );
        	}
        }

        redirect(site_url($this->router->class));
	}


	
	public function readCsv($fileName, $c1, $c2, $c3, $c4, $c5, $c6){

		$delimi = ';';

		if(empty($fileName)){
			$this->session->set_flashdata('message', msg_json('You probably not uploaded the CSV file!', 2) );
			redirect(site_url($this->router->class));
		}

		$file_with_path = '/var/www/html/public/files/samples/'. $fileName;

		$data = [];

		//OPEN THE FILE IN READ MODE
		$csv = fopen($file_with_path, "r");

		$header = array(
			$c1 => $c1,
			$c2 => $c2,
			$c3 => $c3,
			$c4 => $c4,
			$c5 => $c5,
			$c6 => $c6,
		);

		//TREAT THE HEADER, FIRST LINE
		// $header = $headerValue ? fgetcsv($csv,0,$delimi) : [];

		while($line = fgetcsv($csv,0,$delimi)){
			// $data[] = $headerValue ? array_combine($header,$line) : $line;
			$data[] = array_combine($header,$line);
		}

		//GET THE HEADERS FROM THE FRONT AND ORGANIZE IT (LOOP)
		foreach($data as $value){

			$csvName 		= $value['name'];
			$csvDateOfBirth = $value['date_of_birth']; 
			$csvPhone 		= $value['phone']; 
			$csvAddress 	= $value['address']; 
			$csvCreditCard 	= $value['cc']; 
			$csvEmail 		= $value['email']; 

			$res = $this->writeContactsOnDatabase($csvName, $csvDateOfBirth, $csvPhone, $csvAddress, $csvCreditCard, $csvEmail);
		}

		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function writeContactsOnDatabase($csvName, $csvDateOfBirth, $csvPhone, $csvAddress, $csvCreditCard, $csvEmail){

		$iduser = $this->session->userdata('id');

		//FIRST VALIDATE NAME
		if( $this->validateName($csvName) ){
			$this->session->set_flashdata('message', msg_json('The name: '.$csvName.' is not valid. Remove the special character, The process was aborted', 2) );
			redirect(site_url($this->router->class));
		}

		// SECOND VALIDATE DATE FORMAT
		if(!$this->validateBirthDate($csvDateOfBirth) ){
			$this->session->set_flashdata('message', msg_json('There was a problem in the data format of value: '.$csvDateOfBirth.' ', 2) );
			redirect(site_url($this->router->class));
		}

		//GET THE FRANCHISE
		$franchise = $this->getCardBrand($csvCreditCard);
		
		//VALIDATE THE EMAIL
		if (!filter_var($csvEmail, FILTER_VALIDATE_EMAIL)) {
			$this->session->set_flashdata('message', msg_json('The email is not valid: '.$csvEmail.' ', 2) );
			redirect(site_url($this->router->class));
		}
		
		//GET THE LAST 4 DIGITS
		$lastDigitsCreditCard = substr($csvCreditCard, -4);

		//ENCRYPT THE CARD NUMBER
		$CardNumberEncrypted = hash('sha512', $csvCreditCard);

		$query = $this->db->query("insert into contacts (idusuario, name, date_of_birth, phone, address, credit_card, email, lastDigits, franchise) values ($iduser, '$csvName', '$csvDateOfBirth', $csvPhone, '$csvAddress', '$CardNumberEncrypted', '$csvEmail', $lastDigitsCreditCard, '$franchise')");	

		if($query){
			return true;
		}else{
			return false;
		}
		
	}

	//VALIDATE NAME
	function validateName($csvName){
		if ( preg_match('/[\'^£$%&*()}{@#~?><>é,|=_+¬]/', $csvName) === 1 )
		{
			return true;
		}else{
			return false;
		}
	}

	// VALIDATE BIRTH DATE
	public function validateBirthDate($csvDateOfBirth){		
		$res = preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/", $csvDateOfBirth);
		if ( $res === 1) 
		{
			return true;
		} else {
			return false;
		}
	}

	/**
	* Obtain a brand constant from a PAN
	*
	* @param string $pan	CREDIT CARD NUMBER
	* @param bool   $include_sub_types Include detection of sub visa brands
	* @return string
	*/
	public function getCardBrand($pan, $include_sub_types = false)
	{

		//visa
		$visa_regex = "/^4[0-9]{0,}$/";
		$vpreca_regex = "/^428485[0-9]{0,}$/";
		$postepay_regex = "/^(402360|402361|403035|417631|529948){0,}$/";
		$cartasi_regex = "/^(432917|432930|453998)[0-9]{0,}$/";
		$entropay_regex = "/^(406742|410162|431380|459061|533844|522093)[0-9]{0,}$/";
		$o2money_regex = "/^(422793|475743)[0-9]{0,}$/";

		// MasterCard
		$mastercard_regex = "/^(5[1-5]|222[1-9]|22[3-9]|2[3-6]|27[01]|2720)[0-9]{0,}$/";
		$maestro_regex = "/^(5[06789]|6)[0-9]{0,}$/";
		$kukuruza_regex = "/^525477[0-9]{0,}$/";
		$yunacard_regex = "/^541275[0-9]{0,}$/";

		// American Express
		$amex_regex = "/^3[47][0-9]{0,}$/";

		// Diners Club
		$diners_regex = "/^3(?:0[0-59]{1}|[689])[0-9]{0,}$/";

		//Discover
		$discover_regex = "/^(6011|65|64[4-9]|62212[6-9]|6221[3-9]|622[2-8]|6229[01]|62292[0-5])[0-9]{0,}$/";

		//JCB
		$jcb_regex = "/^(?:2131|1800|35)[0-9]{0,}$/";

		//ordering matter in detection, otherwise can give false results in rare cases
		if (preg_match($jcb_regex, $pan)) {
			return "jcb";
		}

		if (preg_match($amex_regex, $pan)) {
			return "amex";
		}

		if (preg_match($diners_regex, $pan)) {
			return "diners_club";
		}

		//sub visa/mastercard cards
		if ($include_sub_types) {
			if (preg_match($vpreca_regex, $pan)) {
				return "v-preca";
			}
			if (preg_match($postepay_regex, $pan)) {
				return "postepay";
			}
			if (preg_match($cartasi_regex, $pan)) {
				return "cartasi";
			}
			if (preg_match($entropay_regex, $pan)) {
				return "entropay";
			}
			if (preg_match($o2money_regex, $pan)) {
				return "o2money";
			}
			if (preg_match($kukuruza_regex, $pan)) {
				return "kukuruza";
			}
			if (preg_match($yunacard_regex, $pan)) {
				return "yunacard";
			}
		}

		if (preg_match($visa_regex, $pan)) {
			return "visa";
		}

		if (preg_match($mastercard_regex, $pan)) {
			return "mastercard";
		}

		if (preg_match($discover_regex, $pan)) {
			return "discover";
		}

		if (preg_match($maestro_regex, $pan)) {
			if ($pan[0] == '5') { //started 5 must be mastercard
				return "mastercard";
			}
			return "maestro"; //maestro is all 60-69 which is not something else, thats why this condition in the end

		}

		return "unknown"; //unknown for this system
	}
}