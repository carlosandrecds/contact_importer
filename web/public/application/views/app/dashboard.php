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
                            <h5 class="m-b-30 f-w-700"><?php $iduser = $this->session->userdata('id'); $v1 = $this->db->query("select * FROM experiments WHERE status = 1 AND idusuario = $iduser");print $v1->num_rows();?><span class="text-c-green m-l-10"></span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-c-red" style="width:100%"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <h6>Processing</h6>
                            <h5 class="m-b-30 f-w-700"><?php $iduser = $this->session->userdata('id'); $v2 = $this->db->query("select * FROM pokemon WHERE idusuario = $iduser AND status = 1");print $v2->num_rows();?><span class="text-c-green m-l-10"></span></h5>
                                <!-- <span class="text-c-red m-l-10">-0.5%</span></h5> -->
                            <div class="progress">
                                <div class="progress-bar bg-c-blue" style="width:100%"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <h6>Successfully Imported</h6>
                            <h5 class="m-b-30 f-w-700"><?php 
                                                        $iduser = $this->session->userdata('id'); 
                                                        $v3 = $this->db->query("select * FROM trade WHERE status = 1 AND idusuario = $iduser");
                                                        print $v3->num_rows();
                                                        ?><span class="text-c-green m-l-10"></span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-c-green" style="width:100%"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <h6>Total Contacts</h6>
                            <h5 class="m-b-30 f-w-700"><?php 
                                $iduser = $this->session->userdata('id'); 
                                $query = $this->db->query("select SUM(bx) as total from pokemon where status = 1 AND idusuario = $iduser");

                                foreach ($query->result() as $row)
                                {
                                    $result_bx_selection = $row->total;
                                }

                                echo $result_bx_selection;
                                ?><span class="text-c-green m-l-10"></span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-c-yellow" style="width:100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <!-- [ page content ] start -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Trades opportunities</h5>
                                        <div class="card-header-right">                           
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <p>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                            <table class="table table-de table-columned">
                                                <thead>
                                                    <tr style="background-color: white">
                                                        <!-- <th width="1%"><input type="checkbox"/> Tudo</th> -->
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <!-- <th>N. Pokemons</th> -->
                                                        <th>Base Experience</th>
                                                        <th>Trade Pokemons</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $iduser = $this->session->userdata('id');
                                                        $trade_opportunities = $this->db->query("select * from trade where available = 1 and status = 1")->result();                            
                                                        
                                                        foreach (@$trade_opportunities as $value)
                                                        {					
                                                            			
                                                            echo '<tr>';
                                                            echo "<td>$value->idtrade</td>";
                                                            echo "<td>$value->name</td>";
                                                            echo "<td>$value->bx</td>";

                                                            if($value->idusuario == $iduser){
                                                               echo '
                                                                <td class="box_itens">
                                                                    <button disabled style="border-radius: 15px !important;" type="button" class="btn waves-effect waves-light btn-danger btn-outline-danger" data-toggle="modal" data-target="#myModal'.$value->idtrade.'"><i class="icofont icofont-check-circled"></i>Trade</button>
                                                                </td>';                                                            
                                                            }else{
                                                                echo '
                                                                <td class="box_itens">
                                                                    <button type="button" style="border-radius: 15px !important;" class="btn waves-effect waves-light btn-warning btn-outline-warning" data-toggle="modal" data-target="#myModal'.$value->idtrade.'"><i class="icofont icofont-check-circled"></i> Trade</button>
                                                                </td>';
                                                            }

                                                            echo '</tr>';

                                                            ?>
                                                                <!-- Modal -->
                                                                <div class="modal fade show" id="myModal<? echo ''.$value->idtrade.''; ?>" tabindex="-1" role="dialog" style="z-index: 1050; ">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            
                                                                            <div class="modal-header">
                                                                                <h4 id='sub-title' class="modal-title"><? echo ''.$value->name.''; ?></h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>

                                                                            <div class="card-block tab-icon">
                                                                            
                                                                                <div class="row" style="text-align: center;">
                                                                                    <div class="col-lg-12 col-xl-6">
                                                                                        <div  class="sub-title">Trade these pokemons</div>
                                                                                        <div class="col-md-6 col-lg-4">
                                                                                            <div class="dynamic-row" style="min-width: max-content;">
                                                                                                <h6 class="sub-title">Trade list</h6>

                                                                                                <form method="post" action="/Trade/getresponse">
                                                                                                <div class="dynamic-list-one effeckt-list-wrap">
                                                                                                <ul class="effeckt-list  m-b-0" data-effeckt-type="pop-in">
                                                                                                
                                                                                                <?
                                                                                                    $trade_list = $this->db->query("select * from trade where available = 1 and idtrade = $value->idtrade and status = 1")->result();                            

                                                                                                    foreach (@$trade_list as $key)
                                                                                                    {
                                                                                                        if($key->slot1 != null){
                                                                                                            echo "<li><img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" . get_image_url($key->slot1) . ".png'/>$key->slot1</li>";
                                                                                                        }

                                                                                                        if($key->slot2 != null){
                                                                                                            echo "<li><img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" . get_image_url($key->slot2) . ".png'/>$key->slot2</li>";
                                                                                                        }
                                                                                                        
                                                                                                        if($key->slot3 != null){
                                                                                                            echo "<li><img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" . get_image_url($key->slot3) . ".png'/>$key->slot3</li>";
                                                                                                        }

                                                                                                        if($key->slot4 != null){
                                                                                                            echo "<li><img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" . get_image_url($key->slot4) . ".png'/>$key->slot4</li>";
                                                                                                        }

                                                                                                        if($key->slot5 != null){
                                                                                                            echo "<li><img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" . get_image_url($key->slot5) . ".png'/>$key->slot5</li>";
                                                                                                        }

                                                                                                        if($key->slot6 != null){
                                                                                                            echo "<li><img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/" . get_image_url($key->slot6) . ".png'/>$key->slot6</li>";
                                                                                                        }
                                                                                                        
                                                                                                        echo "<div style='display: none;' id='trade_listing'>$key->idtrade</div>";
                                                                                                        echo "<input type='hidden' id='trade_listing' name='trade_listing' value='$key->idtrade'>";
                                                                                                    }

                                                                                                ?>

                                                                                                </ul>
                                                                                                <br>
                                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-15 m-l-15 add">
                                                                                                
                                                                                                    <? echo "Total Base Expercience: $value->bx"; ?>
                                                                                                </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-xl-6 tab-with-img">
                                                                                        <div class="sub-title">Trade for these pokemons:</div>
                                                                                        <div class="col-md-6 col-lg-4">
                                                                                            <div class="dynamic-row" style="min-width: max-content;">
                                                                                                <h6 class="sub-title">My pokemon trade list</h6>


                                                                                                <div class="dynamic-list-one effeckt-list-wrap">
                                                                                                    <label for="user_list">Choose my trade list</label>
                                                                                                    <select name="user_list" id="user_selected">
                                                                                                        <?
                                                                                                            $user_list = $this->db->query("select * from trade where available = 1 and idusuario = $iduser and status = 1")->result();                            

                                                                                                            foreach (@$user_list as $key_user)
                                                                                                            {
                                                                                                                echo "<option id='user_get_trade' value='$key_user->idtrade'>$key_user->name</option>";
                                                                                                            }
                                                                                                        ?>
                                                                                                    </select>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <button onClick="trade()" type="submit" id="btn-trade" class="btn btn-primary waves-effect waves-light m-r-15 m-l-15 add" style="margin-right: 0px; margin-left: 0px;">
                                                                                TRADE
                                                                            </button>
                                                                            </form>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <!-- End Modal -->
                                                            <?

                                                        }
                                                        ?>
                                                </tbody>
                                            </table>

                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ page content ] end -->
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

