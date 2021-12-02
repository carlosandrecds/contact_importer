<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

class App extends CI_Controller {

    function __construct() {
        parent::__construct();

        //PEGO O ID DE USUÁRIO SESSÃO
        $this->iduser = $this->session->userdata('id');

        //RETORNA TUDO COM LETRAS MINÚSCULAS
        $this->menuativo = strtolower(base_url().get_class());
    }

    public function login(){
        if ( is_numeric($this->session->userdata('id')) and $this->session->userdata('id') > 0 ):
            //Repare que "view" pode receber dois parâmetros.
            $this->load->view('app/template', ['view' => 'app/dashboard']);
        else :
            $this->load->view('app/login');
        endif;
    }

    //FUNÇÃO INDEX PARA CHAMAR A PÁGINA PRINCIPAL OU SAIR DA APLICAÇÃO
    public function index()
    {
        if ( is_numeric($this->session->userdata('id')) and $this->session->userdata('id') > 0 ):
            //Repare que "view" pode receber dois parâmetros.
            $this->load->view('app/template', ['view' => 'app/dashboard']);
        else :
            $this->load->view('app/login');
        endif;
        
    }

    //FAZER O LOGOUT
    public function logout() {
        //DESTROI O VALOR DA VARIÁVEL ID
        $this->session->unset_userdata('id');
        //AQUI EU DESTRUO A SESSÃO DO USUÁRIO
        $this->session->sess_destroy();
        redirect('app');
    }

    //CHAMA A VIEW PARA FAZER O CADASTRO
    public function cadastro(){
        $this->load->view('app/cadastro');        
    }

    //CHAMA A VIEW PARA FAZER O CADASTRO
    // public function login(){
    //     $this->load->view('app/login');        
    // }

    function cadastro_acao() {  
        
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
        $this->form_validation->set_rules('senharepetir', 'Repetir a Senha', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        $this->form_validation->set_rules('I agree', 'with the terms', 'trim|required');

        if ($this->form_validation->run() == false)
        {
             msg( strip_tags(validation_errors()), 2); 
             exit;

        } else {

            if ($this->input->post('senha') != $this->input->post('senharepetir')){
                msg( 'The passwords are not the same', 2);
                exit;
            }


            date_default_timezone_set('America/Sao_Paulo');
            $dataCadastro = date('Y-m-d H:i:s');

            $data = array(
                'nome' => set_value('nome'),
                'email' => $this->input->post('email'),
                'senha' => hash('sha512', $this->input->post('senha') ),
                'status' => 1,
                'dataCadastro' => $dataCadastro,
            );
              
            $email = $this->input->post('email');

            //FAZER UM SELECT NO BANCO E COM ESTÁ QUERY EU SET A VARIÁVEL QUERY
            $this->db->select('email')->from('usuarios')->where('email',$email)->where('status', 1);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                msg( 'O email escolhido ja esta sendo usado. Por favor escolha outro endereço de email!', 2);
                exit;
            }else{ 

                if($this->db->insert('usuarios', $data) == TRUE) {  

           
                    // JÁ REALIZA O LOGIN
                    $usuario = $this->db->query("select * from usuarios 
                                                where email = '".$this->input->post('email')."' ")->row();

                    $dados = array(
                                    'nome' => $usuario->nome, 
                                    'id' => $usuario->idusuario,
                                    'logado' => TRUE, 
                                    'dataLogin' => $dataCadastro
                                );

                    $this->session->set_userdata($dados);
                
                    msg( 'Everything settled! Welcome...', 1);
                    exit;

                } else {
                    msg( 'There was a problem in sign you up!', 2);
                }
            }
        }

    }

    public function verificarLogin(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','valid_email|required|trim');
        $this->form_validation->set_rules('senha','Senha','required|trim');
        $ajax = $this->input->get('ajax');
        if ($this->form_validation->run() == false) {
            
            if($ajax == true){
                msg( 'The fields email and password are mandatory', 2);
                exit;
            }else{
                $this->session->set_flashdata('error','The informations is incorrect.');
                redirect($this->login);
            }
        } 
        else {

            date_default_timezone_set('America/Sao_Paulo');
            $dataLogin = date('Y-m-d H:i:s');

            $email = $this->input->post('email');

            $senha = hash('sha512', $this->input->post('senha'));

            $this->db->where('email',$email);
            $this->db->where('senha',$senha);
            $this->db->where('status',1);
            $this->db->limit(1);
            $usuario = $this->db->get('usuarios')->row();

            if(@count($usuario) > 0){
                $dados = [
                    'nome' => $usuario->nome, 
                    'email' => $usuario->email, 
                    'id' => $usuario->idusuario,
                    'logado' => TRUE, 
                    'dataLogin' => $dataLogin
                ];

                $this->session->set_userdata($dados);   
             
                if($ajax == true){
                    msg( 'Welcome! Entering...', 1);
                    exit;
                }
                else{
                    redirect(base_url());
                }

                
            }else{                
                
                if($ajax == true){
                    msg( 'The login informations are incorrect.', 2);
                    exit;
                }else{
                    $this->session->set_flashdata('error','The login informations are incorrect.');
                    redirect($this->login);
                }
            }
            
        }
        
    }
}
