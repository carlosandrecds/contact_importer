<script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icon-handbag bg-c-blue"></i>
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

										foreach($this->configuracao->colunas as $c => $v ) :
				                            $esconde = '';
				                            if (!array_key_exists($c, $this->configuracao->colunas_editar)) :
				                                $esconde = 'style="display: none;"';
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
				                                elseif ( $v->tipo == 'decimal') :
				                                    echo '

				                                    <div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
					                                        <label class="col-form-label">'.$v->descricao.'</label>
					                                        <input type="text" id="'.$c.'" name="'.$c.'" 
					                                        value="'.moeda($$c).'" class="form-control moeda">
									   				</div>';
									   			elseif ( $v->tipo == 'file') :
				                                    echo '

				                                    <div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
				                                        <label class="col-form-label">'.$v->descricao.'</label>
				                                        <input type="file" id="'.$c.'" name="'.$c.'" 
				                                        	value = "'.$$c.'" class="form-control">
				                                    </div>';
									   			elseif ( $v->tipo == 'text') :
				                                    echo '

				                                    <div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
				                                        <label class="col-form-label">'.$v->descricao.'</label>
				                                        <textarea rows="10" id="'.$c.'" name="'.$c.'" class="form-control">'.$$c.'</textarea>
				                                    </div>';
				                                elseif ( $v->tipo == 'html') :
				                                    echo '

				                                    <div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
				                                        <label class="col-form-label">'.$v->descricao.'</label>
				                                        <textarea rows="10" id="'.$c.'" name="'.$c.'" class="form-control">'.$$c.'</textarea>
				                                    </div>';

				                                    echo '        <script> CKEDITOR.replace(\''.$c.'\', {fullPage: true,  allowedContent: true}); </script>';
				                                else :
				                                    echo '

				                                    <div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
					                                        <label class="col-form-label">'.$v->descricao.'</label>
					                                        <input type="text" id="'.$c.'" name="'.$c.'" 
					                                        value="'.$$c.'" class="form-control">
									   				</div>';

				                                endif;
				                                    

											endif;

										endforeach;

					
					?>
					</div>
						   				<div class="form-actions">
					                        <div class="span12">
					                            <div class="span6 offset3">
					                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
													<a href="<?php echo site_url($this->router->class) ?>" class="btn btn-default">Cancelar</a>
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
	.colformulario {
		margin-bottom: 1em;
	}
</style>

<script type="text/javascript">
	$('.moeda').maskMoney({thousands:'.', decimal:',', symbolStay: true});
</script>