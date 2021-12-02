<style>
	.card{
		border-radius: 25px;
	}
</style>



<div class="pcoded-inner-content">
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<!-- [ page content ] start -->
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-header">
								<h5>Management:</h5>
								<div class="card-header-right">
                                    <a href="<?php echo base_url().$this->router->class.'/adicionar/'.$this->master_detalhe_querystring; ?>">
									<button class="btn waves-effect waves-light btn-success btn-outline-success">Add a not listed</button>
								   </a>
                                </div>
							</div>
							<div class="card-block">
								<p>

								<?php 
									if ( $this->master_detalhe ) :
										$attr = array(
										        'class'       => 'form-control fill',
										        'onChange' => 'altera_filtro_pai(this);'
										);
										echo form_dropdown('filtro_master_detalhe', $this->fonte_master_detalhe, 
														   $this->input->get($this->master_detalhe_coluna), $attr);
										echo "<script>";
											echo "
											function altera_filtro_pai(elemento) {
												var urlbase = '".base_url().$this->configuracao->tabela."';
												document.location.href = urlbase + '?$this->master_detalhe_coluna=' + $(elemento).val();
											}
											";
										echo "</script>";						
									endif; 
								?>

								<div class="card-body">

									<div class="table-responsive">
									<table class="table table-de table-columned">
										<thead>
											<tr style="background-color: white">
												<?php
													 
												
													foreach($this->configuracao->colunas_view as $c ) :	
														$style = '';

														if ( $c->tipo == 'decimal' ) :
															$style = 'style="text-align: right;"';	
														elseif ( $c->tipo == 'moedadigital' ) :	
															$style = 'style="text-align: right;"';							
														endif;	

														echo "<th $style>".$c->descricao.'</th>';	
				
													endforeach;
													echo '<th></th>';
													
												?>
											</tr>
										</thead>
										<tbody>
											<?php 
												$tabela = $this->configuracao->tabela;

												$chave  = $this->configuracao->chave;
												
												foreach (@$$tabela as $k => $r) {											

													echo '<tr>';
														
														include $this->listagem_tabela_colunas;

														include $this->listagem_tabela_botoes;

													echo '</tr>';
												}
											?>
											<tr>
												
											</tr>
										</tbody>
									</table>
									</div>
									<?php echo $paginacao; ?>
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
<input type="hidden" id="idexcluir" value="0">


<script type="text/javascript">
    $(document).ready(function () {   	


        $(document).on('click', '.botaoexcluir', function (event) {
            var id = $(this).attr('<?php echo $this->configuracao->chave; ?>');

            swal({
				title: "Are you sure?",
				text: "You can't undo it, proceed?",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yep, delete!",
				closeOnConfirm: false
			},
			function(){
				var url = '<?php echo base_url().$this->router->class.'/excluir/'; ?>'+id;
				document.location = url;
			});
        });
    });

    <?php 
    	
    	if ( $this->session->flashdata('message') != '' ) : 
    ?>

    	var retornoMsg = <?php echo $this->session->flashdata('message'); ?>;

    	if ( retornoMsg.tip == 2 ){
			var titulo = 'Error';
			var tipo = 'error';
		}else{
			var titulo = 'Success';
			var tipo = 'success';
		}
		
        swal({
			title: titulo,
			text: retornoMsg.msg,
			type: tipo
		});

	<?php endif; ?>

</script>