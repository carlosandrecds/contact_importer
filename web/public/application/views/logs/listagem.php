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
								<h5>Logs of activities</h5>
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
												<th>ID</th>
												<th>Name</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												foreach (@$data as $amostra) 
												{								
													echo '<tr>';
														// echo "<td><input type='checkbox' id='check_box'/></td>";
														echo "<td>$amostra->idlogs</td>";
														echo "<td>$amostra->name</td>";
														echo "<td>$amostra->data</td>";
														// echo "<td>$amostra->experiment</td>";
														// echo "<td>$amostra->patologia</td>";
														// if($amostra->status == 1){
														// 	// echo "<td>Pendente</td>";
														// 	$btn_pendente = '<button class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-warning-alt"></i>Pendente</button>';
														// 	echo "<td>$btn_pendente</td>";
														// } else {
														// 	// echo "<td>Concluido</td>";
														// 	$btn_concluido = '<button class="btn waves-effect waves-light btn-success btn-outline-success"><i class="icofont icofont-check-circled"></i>Concluído</button>';
														// 	echo "<td>$btn_concluido</td>";
														// }
														// echo "<td>$amostra->experiment</td>";
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