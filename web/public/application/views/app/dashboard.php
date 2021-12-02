<?
    function get_image_url($pokemonName){
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
        
        $PokemonId = $res->id;

        return $PokemonId;
    }
?>

<style>
    h6
    {
        text-align: center;
    }
    .m-b-30
    {
        text-align: center;
    }
    .quadros_informativos
    {
        display: flex;
        margin-top: -20px;
    }
    .card .sale-card
    {
        margin-top: 100px;
    }
    .card{
		border-radius: 25px;
	}
</style>
<html>
    <body>
        <div class="col-xl-12" style="margin-top: 10px;background: white !important;" >
            <div class="card proj-progress-card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-xl-3 col-md-6"> 
                            <h6 style="text-align: center;">Nº Import Fails</h6>
                            <!-- O QUE EU ESTOU FAZENDO AQUI É SIMPLESMENTE PEGAR O ID DO USUÁRIO ATRAVES DA VARIÁVEL "IDUSER"
                            PARA TRAZER APENAS AS INFORMAÇÕES DESTE USUÁRIO E NÃO AS INFORMAÇÕES TOTAIS. -->
                            <h5 class="m-b-30 f-w-700"><?php $iduser = $this->session->userdata('id'); $v1 = $this->db->query("select * FROM logs WHERE status = 1 AND idusuario = $iduser");print $v1->num_rows();?><span class="text-c-green m-l-10"></span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-c-red" style="width:100%"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <h6>Nº of Lists</h6>
                            <h5 class="m-b-30 f-w-700"><?php $iduser = $this->session->userdata('id'); $v2 = $this->db->query("select * FROM contact_import WHERE idusuario = $iduser AND status = 1");print $v2->num_rows();?><span class="text-c-green m-l-10"></span></h5>
                                <!-- <span class="text-c-red m-l-10">-0.5%</span></h5> -->
                            <div class="progress">
                                <div class="progress-bar bg-c-blue" style="width:100%"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <h6>Successfully Imported</h6>
                            <h5 class="m-b-30 f-w-700"><?php 
                                                        $iduser = $this->session->userdata('id'); 
                                                        $v3 = $this->db->query("select * from contacts where status = 1 AND idusuario = $iduser");
                                                        echo $v3->num_rows();
                                                        ?><span class="text-c-green m-l-10"></span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-c-green" style="width:100%"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <h6>Total Contacts</h6>
                            <h5 class="m-b-30 f-w-700"><?php 
                                $iduser = $this->session->userdata('id'); 

                                $query = $this->db->query("select * from contacts where status = 1 AND idusuario = $iduser")->num_rows();
                                $v1 = $this->db->query("select * FROM logs WHERE status = 1 AND idusuario = $iduser")->num_rows();

                                echo $query + $v1;
                                ?><span class="text-c-green m-l-10"></span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-c-yellow" style="width:100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
        
    </body>
</html>

<script type="text/javascript">

function trade(){
    var data = {
        user_list: $('#user_selected').val(),
        trade_list: $('#trade_listing>').text()
    };
    
    $.ajax({            
        url: "/Trade/getresponse",
        type: "POST",
        data: data,
        dataType: "json",
        success: function(dados){
            if(dados['success']) {
                // console.log(dados['user_list']);
                console.log(dados['trade_list']);
            }
        },
        error: function(dados){
            console.log(dados);
        }
    });
}

</script>

