<script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
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
								<h5>Cadastro/Edição</h5>
							</div>
							<div class="card-block">
								<p>
									<form action="<?php echo $action; ?>" method="post" 
										enctype="multipart/form-data" class="form-horizontal" >
									<input type="hidden" name="<?php echo $this->configuracao->chave; ?>" 
						   				value="<?php echo ${$this->configuracao->chave}; ?>" />

						   				<div class="form-group row">	
						   					
						   				<?php  
											foreach($this->configuracao->colunas as $c => $v) :
												
												$esconde = '';

												if (!array_key_exists($c, $this->configuracao->colunas_editar)) :
													
													$esconde = 'style="display: none;"';
													$html_btn = 'style="display: none;"';
													$img_btn = 'style="display: none;"';
													$files_btn = 'style="display: none;"';
												endif;

												if (!isset($v->tamanho)) : $v->tamanho = 1; endif;

												if ($c != $this->configuracao->chave) : 
													if ( $v->tipo == 'FK' ) :
														echo '
																<div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
																<label for="'.$c.'" class="col-form-label">'.$v->descricao.'</label>';
														echo '        <select id="'.$c.'" name="'.$c.'" class="form-control fill">';
																		foreach ($v->fonte as $sk => $sv) {
																			echo '<option value="'.$sk.'">'.$sv.'</option>';
																		}
														echo '        </select>';

														echo '        <script> $("#'.$c.'").val(\''.$$c.'\'); </script>';

														echo '    
																</div>';
													
													//DECIMAL
													elseif ( $v->tipo == 'decimal') :
														echo '

														<div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
																<label class="col-form-label">'.$v->descricao.'</label>
																<input type="text" id="'.$c.'" name="'.$c.'" 
																value="'.moeda($$c).'" class="form-control moeda">
														</div>';
													
													// FILE	
													elseif ( $v->tipo == 'file') :

														$urlimagem = base_url().'files/'.$v->diretorio.$$c;
														
														$srcpreview = "src='$urlimagem'";
													 if ( $$c == '') :
														 $srcpreview = "";
													 endif;
 
													 echo '
 
													 <div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
														 <label class="col-form-label">'.$v->descricao.'</label>
														 <img id="'.$c.'_imagem" '.$srcpreview.' class="pre_imagem"/>
														 <input type="file" id="'.$c.'" name="'.$c.'" 
														 onchange="loadFile(event)"
															 value = "'.$$c.'" class="form-control">
														 
														 <script>
														   var loadFile = function(event) {
															 var '.$c.'_imagem = document.getElementById(\''.$c.'_imagem\');
															 '.$c.'_imagem.src = URL.createObjectURL(event.target.files[0]);
														   };
														 </script>
													 </div>';
													
													//TEXT
													elseif ( $v->tipo == 'text') :
														echo '

														<div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
															<label class="col-form-label">'.$v->descricao.'</label>
															<textarea rows="10" id="'.$c.'" name="'.$c.'" class="form-control">'.$$c.'</textarea>
														</div>';
													
													//HTML
													elseif ( $v->tipo == 'html') :
													
														echo '
															<div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
																<label class="col-form-label">'.$v->descricao.'</label>
																<textarea rows="10" id="'.$c.'" name="'.$c.'" class="form-control">'.$$c.'</textarea>
															</div>
														';

														echo '<script> CKEDITOR.replace(\''.$c.'\'); </script>';
													
													//HTML_BTN
													elseif ( $v->tipo == 'html_btn') :
														$html_btn = 'style="display: block !important;"';

														echo '
														<!-- Modal -->
														<div class="modal fade show" id="myModal" tabindex="-1" role="dialog" style="z-index: 1050; ">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title">PRONTUÁRIO</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																	</button>
																</div>
										
																<div style="display:flex;" class="flex_img">
																									
																	<div class="modal-body">
										
										
																		<h5>Informações do paciente</h5>
																	</div>
																</div>
										
																<div class="modal-body">
																	Insira aqui os dados que deseja gravar a respeito do paciente
	
																	<div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
																		<label class="col-form-label">'.$v->descricao.'</label>
																		<textarea rows="10" id="'.$c.'" name="'.$c.'" class="form-control">'.$$c.'</textarea>
																	</div>															</div>
										
																	<script> CKEDITOR.replace(\''.$c.'\'); </script>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Salvar/Sair</button>
																</div>
															</div>
														</div>
														</div>
														
														<!-- End Modal -->
														';

													elseif ( $v->tipo == 'varchar') :
														echo '

														<div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
																<label class="col-form-label">'.$v->descricao.'</label>
																<input type="text" id="'.$c.'" name="'.$c.'" 
																value="'.$$c.'" class="form-control">
														</div>';

													elseif ( $v->tipo == 'int') :
														echo '

														<div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
																<label class="col-form-label">'.$v->descricao.'</label>
																<input type="text" id="'.$c.'" name="'.$c.'" 
																value="'.$$c.'" class="form-control">
														</div>';
	
													else :
														// echo '

														// <div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
														// 		<label class="col-form-label">'.$v->descricao.'</label>
														// 		<input type="text" id="'.$c.'" name="'.$c.'" 
														// 		value="'.$$c.'" class="form-control">
														// </div>';

													endif;
												
												endif;

											endforeach;
										?>

									</div>
									<div class="btns-group">
										<td class="btn">
											<button type="button" <? echo $html_btn; ?> class="html_btn btnCard waves-effect waves-light" data-toggle="modal" data-target="#myModal"><i class="icofont icofont-check-circled"></i> Prontuário</button>
										</td>

										<td class="btn">
											<button type="button" <? echo $img_btn; ?> class="html_btn btnCardImg waves-effect waves-light" data-toggle="modal" data-target="#myModalImg"><i class="icofont icofont-check-circled"></i> Imagens</button>
										</td>

										<td class="btn">
											<button type="button" <? echo $files_btn; ?> class="html_btn btnCardFiles waves-effect waves-light" data-toggle="modal" data-target="#myModalFiles"><i class="icofont icofont-check-circled"></i> Anexos</button>
										</td>
									</div>

						   				<div class="form-actions">
					                        <div class="span12">
					                            <div class="span6 offset3">
					                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
													<a href="<?php echo site_url(); ?>" class="btn btn-default">Cancel</a>
					                            </div>
					                        </div>
					                    </div>
						   			</form>

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

	.btns-group{
		justify-content: space-between;
		display: flex;
	}

	.form-actions{
		margin-top: 25px !important;
	}

	.col-sm-10 {
		max-width: 100% !important;
	}

	.modal-content{
		width: max-content;
	}											

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

	.btnCard{
		font-size: 24px;
		cursor: pointer;
		text-align: center;	
		text-decoration: none;
		outline: none;
		color: #fff;
		background-color: #4099ff;
		border: none;
		border-radius: 15px;
		width: 300px;
    	height: 210px;
	}

	.btnCard:hover{
		background-color: #4079ff;
    	color: white;
	}

	.btnCardImg{
		font-size: 24px;
		cursor: pointer;
		text-align: center;	
		text-decoration: none;
		outline: none;
		color: #fff;
		background-color: #c73571;
		border: none;
		border-radius: 15px;
		width: 300px;
    	height: 210px;
	}

	.btnCardImg:hover{
		background-color: #b31657;
    	color: white;
	}

	.btnCardFiles{
		font-size: 24px;
		cursor: pointer;
		text-align: center;	
		text-decoration: none;
		outline: none;
		color: #fff;
		background-color: #06b33b;
		border: none;
		border-radius: 15px;
		width: 300px;
    	height: 210px;
	}

	.btnCardFiles:hover{
		background-color: #067327;
    	color: white;
	}
</style>

<script type="text/javascript">
	$('.moeda').maskMoney({thousands:'.', decimal:',', symbolStay: true});
	$('.moedadigital').maskMoney({thousands:'.', decimal:',', symbolStay: true, precision:8});

</script>