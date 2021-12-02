<?php include $this->listagem_header; ?>
<style type="text/css">
	.table.table-de td, .table.table-de th {
	    padding: 0.75rem 1.5rem;
	}
</style>
<div class="pcoded-inner-content">
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<!-- [ page content ] start -->
				<div class="row">
					<div class="col-sm-12">

						<?php if( count($this->configuracao_filtros) > 0) : ?>
						<!-- FILTRAGEM -->
						<div class="card" id="relatorio">
							<div class="card-header">
								<h5>Filtros</h5>
							</div>
							<div class="card-block">
	
									<form action="" method="get" id="form_filtros" enctype="multipart/form-data" class="form-horizontal" >
										<div class="form-group row">
									<?php
										foreach($this->configuracao_filtros as $c => $v ) :		                 

				                            if (!isset($v->tamanho)) : $v->tamanho = 1; endif;

											if ($c != $this->configuracao->chave) : 
				                                if ( $v->tipo == 'input') :				                                	

				                                	echo '
				                                    <div class="col-sm-'.$v->tamanho.' colformulario">
					                                        <label class="col-form-label">'.$v->descricao.'</label>
					                                        <input type="text" id="'.$c.'" name="'.$c.'" 
					                                        value="'.$v->valor.'" class="form-control">
									   				</div>';

				                                endif;
				                                    

											endif;

										endforeach;
									?>
											<div class="col-sm-2 colformulario text-right m-t-30 m-b-0">
												<button type="submit" class="btn waves-effect waves-light btn-primary" value="">
													<i class="fa fa-search"></i>
												</button>
											</div>
										</div>
									</form>
							</div>
						</div>
						<!-- FIM FILTRAGEM -->
						<?php endif; ?>


						<div class="card" id="relatorio">
							<div class="card-header">
								<h5>Listagem</h5>
								<div class="card-header-right">
									<ul class="list-unstyled card-option" >						
										<li><i class="feather icon-refresh-cw reload-card" loadid="relatorio"></i></li>
									</ul>
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


									<div class="table-responsive">
									<table class="table table-de table-columned">
										<thead>
											<tr style="background-color: #2D335B">
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

<style type="text/css">
	.colformulario {
		margin-bottom: 1em;
	}

	.pre_imagem{
		padding: 10px;
	    display: block;
	    max-width: 190px;
	    max-height: 190px;
	    border: solid thin #c5c4c4;
	    margin-top: 20px;
	    margin-bottom: 20px;
	}
</style>

<input type="hidden" id="idexcluir" value="0">
<script type="text/javascript">
    $(document).ready(function () {   	


        $(document).on('click', '.botaoexcluir', function (event) {
            var id = $(this).attr('<?php echo $this->configuracao->chave; ?>');

            swal({
				title: "Deseja realmente excluir?",
				text: "Você não poderá recuperar esse registro após excluído!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Sim, deletar!",
				closeOnConfirm: false
			},
			function(){
				var url = '<?php echo base_url().$this->router->class.'/excluir/'; ?>'+id;
				document.location = url;
			});

        });

    });

    <?php 

    	echo $this->script_footer;
    	
    	if ( $this->session->flashdata('message') != '' ) : 
    ?>

    	var retornoMsg = <?php echo $this->session->flashdata('message'); ?>;

    	if ( retornoMsg.tip == 2 ){
			var titulo = 'Erro';
			var tipo = 'error';
		}else{
			var titulo = 'Sucesso';
			var tipo = 'success';
		}
		
        swal({
			title: titulo,
			text: retornoMsg.msg,
			type: tipo
		});

	<?php endif; ?>

</script>