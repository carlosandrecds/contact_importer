<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icon-handbag bg-c-blue"></i>
                <div class="d-inline">
                    <!-- <h5><?=$this->configuracao->descritivo; ?></h5>
                    <span><?=$this->configuracao->subtitulo; ?></span> -->
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
<!-- [ breadcrumb ] end -->
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
							</div>
							<div class="card-block">
								<p>
									<div class="table-responsive">
									<table class="table table-de table-columned">
										<thead>
											<tr style="background-color: white">
												<?php 
												
													foreach($this->configuracao->colunas_view as $c ) :	
														$style = '';

														if ( $c->tipo == 'decimal') :
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
												$chave = $this->configuracao->chave;
												
												foreach (@$$tabela as $k => $r) {											

													echo '<tr>';
														foreach($this->configuracao->colunas_view as $c => $v ) :

															$style = '';

															if ( $v->tipo == 'FK' ) :
																$conteudo = $v->fonte[$r->$c];
															elseif ( $v->tipo == 'datetime') :
																$conteudo = formataDataHora($r->$c);
															elseif ( $v->tipo == 'decimal') :
																$conteudo = moeda($r->$c);
																$style = 'align="right"';
															else :
																$conteudo = $r->$c;
															endif;	

															echo "<td $style>";
																echo $conteudo;
															echo "</td>";	;				
														endforeach;	



														echo '<td align="right">';

														echo '<div class="btn-group " role="group" title="" >';
                    
										
															echo '<a href="javascript:void(0)" role="button" 
																	'.$this->configuracao->chave.'="'.$r->$chave.'" class="btn btn-danger botaoexcluir btn-sm" title="Excluir">
																		<i class="icon-trash icon-white"></i> Excluir
																  </a>';

														echo '</div>';

														echo '</td>';

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
				title: "Are you sure you wanna delete it?",
				text: "This action can't be undone!",
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