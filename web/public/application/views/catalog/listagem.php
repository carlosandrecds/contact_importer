<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="<?php echo $this->configuracao->icone; ?> bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=$this->configuracao->descritivo; ?></h5>
                    <span><?=$this->configuracao->subtitulo; ?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= $this->configuracao->tabela; ?>"><?=$this->configuracao->descritivo; ?></a>
                    </li>
                </ul>
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
								<h5>Listagem</h5>
									<div class="card-header-right">
x                         
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
												<th>Pokemon</th>
												<th>Add</th>
											</tr>
										</thead>
										<tbody>
											<?php 

												foreach (@$this->dados['api']->results as $value) 
												{
													echo '<tr>';
													echo "<td>$value->name</td>";

													$btn_concluido = '<a href="Catalog/save_pokemon/'.$value->name.'" class="btn waves-effect waves-light btn-success btn-outline-success" style="border-radius: 15px !important;><i class="icofont icofont-check-circled"></i>Add to my Pokemons</a>';
													echo "<td>$btn_concluido</td>";

													echo '</tr>';
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

<script type="text/javascript">

    <?php 
    	
    	if ( $this->session->flashdata('message') != '' ) : 
    ?>

    	var retornoMsg = <?php echo $this->session->flashdata('message'); ?>;

    	if ( retornoMsg.tip == 2 )
    	{
			var titulo = 'Erro';
			var tipo = 'error';
		}
		else
		{
			var titulo = 'Sucesso';
			var tipo = 'success';
		}

		function verificarCheckBox() {
			var check = document.getElementsByName("itemCheck"); 

			for (var i=0;i<check.length;i++){ 
				if (check[i].checked == true){ 
					// CheckBox Marcado... Faça alguma coisa...

				}  else {
				// CheckBox Não Marcado... Faça alguma outra coisa...
				}
			}
		}
		
        swal({
			title: titulo,
			text: retornoMsg.msg,
			type: tipo
		});

	<?php endif; ?>

</script>