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
								<h5>Add/Update</h5>
							</div>
							<div class="card-block">
								<p>
									<form action="<?php echo $action; ?>" method="post" 
										enctype="multipart/form-data" class="form-horizontal" >
									<input type="hidden" name="<?php echo $this->configuracao->chave; ?>" 
						   				value="<?php echo ${$this->configuracao->chave}; ?>" />

						   				<div class="form-group row">	
						   					
						   				<?php  
                                        
                                            //Control de hidden buttons
                                            $img = 'style="display: none;"';
                                            $html_btn = 'style="display: none;"';
                                            $file_btn = 'style="display: none;"';

                                            foreach($this->configuracao->colunas as $c => $v ) :
                                                $esconde = '';
                                                if (!array_key_exists($c, $this->configuracao->colunas_editar)) :
                                                    $esconde = 'style="display: none;"';
                                                endif;

                                                if (!isset($v->tamanho)) : $v->tamanho = 1; endif;

                                                if ($c != $this->configuracao->chave) : 
                                                    
                                                    if ($v->tipo == 'FK') :
                                                        echo '
                                                                <div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
                                                                <label for="'.$c.'" class="col-form-label">'.$v->descricao.'</label>';
                                                        echo '        <select id="'.$c.'" name="'.$c.'" class="form-control fill">';
                                                                        foreach ($v->fonte as $sk => $sv) {
                                                                            echo '<option value="'.$sk.'">'.$sv.'</option>';
                                                                        }
                                                        echo '        </select>';

                                                        echo '        <script> $("#'.$c.'").val(\''.$$c.'\'); </script>';

                                                        echo '</div>';
                                                                
                                                    elseif ( $v->tipo == 'decimal') :
                                                        echo '

                                                        <div class="col-sm-'.$v->tamanho.' colformulario" '.$esconde.'>
                                                                <label class="col-form-label">'.$v->descricao.'</label>
                                                                <input type="text" id="'.$c.'" name="'.$c.'" 
                                                                value="'.moeda($$c).'" class="form-control moeda">
                                                        </div>';

                                                
                                                    elseif ( $v->tipo == 'attachments') :
                                                    
                                                        $file_btn = 'style="display: block !important;"';

                                                        $urlimagem2 = base_url().'files/'.$v->diretorio.$$c;

                                                        $srcpreview2 = "src='$urlimagem2'";
                                                        
                                                        if ( $$c == '') :
                                                            $srcpreview2 = "";
                                                        endif;

                                                        echo '
                                                            <!-- Modal -->
                                                            <div class="modal fade show" id="myModalImg2" tabindex="-1" role="dialog" style="z-index: 1050; padding-right: 15px;">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Upload de arquivo</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">X</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>Arquivo anexo</h5>
                                                                        <label class="col-form-label">'.$v->descricao.'</label>
                                                                        <div class="imgIa">
                                                                        <img id="'.$c.'_attachment" '.$srcpreview2.' class="pre_attachment"/>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Selecionar</span>
                                                                        </div>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="'.$c.'" name="'.$c.'" onchange="loadFile(event)" value = "'.$$c.'">
                                                                            <label class="custom-file-label" for="inputGroupFile01">Clique aqui para selecionar Arquivo</label>
                                                                        </div>
                                                                        </div>
                                                                        <script>
                                                                            var loadFile = function(event) {
                                                                                var '.$c.'_attachment = document.getElementById(\''.$c.'_attachment\');
                                                                                '.$c.'_attachment.src = URL.createObjectURL(event.target.files[0]);
                                                                            };
                                                                        </script>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary waves-effect " data-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <!-- End Modal -->
                                                        ';

                                                    elseif ( $v->tipo == 'img' ) :
                                                        
                                                        $img = 'style="display: block !important;"';

                                                        $urlimagem = base_url().'files/'.$v->diretorio.$$c;
                                                        
                                                        $srcpreview = "src='$urlimagem'";
                                                        
                                                        if ( $$c == '') :
                                                            $srcpreview = "";
                                                        endif;
                                                        
                                                        echo '
                                                            <div class="modal fade show" id="myModalImg" tabindex="-1" role="dialog" style="z-index: 1050; padding-right: 15px;">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Arquivos anexos</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">X</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>Imagem a ser analisada pela Inteligência Artificial</h5>
                                                                        <label class="col-form-label">'.$v->descricao.'</label>
                                                                        <div class="imgIa">
                                                                        <img id="'.$c.'_imagem" '.$srcpreview.' class="pre_imagem"/>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Selecionar</span>
                                                                        </div>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="'.$c.'" name="'.$c.'" onchange="loadFile(event)" value = "'.$$c.'">
                                                                            <label class="custom-file-label" for="inputGroupFile01">Clique aqui para selecionar Arquivo</label>
                                                                        </div>
                                                                        </div>
                                                                        <script>
                                                                        var loadFile = function(event) {
                                                                            var '.$c.'_imagem = document.getElementById(\''.$c.'_imagem\');
                                                                            '.$c.'_imagem.src = URL.createObjectURL(event.target.files[0]);
                                                                        };
                                                                        </script>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary waves-effect " data-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        ';


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

                                                        echo '        <script> CKEDITOR.replace(\''.$c.'\'); </script>';
 
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
                                                         
                                                    elseif ( $v->tipo == 'html_btn') :

                                                        $html_btn = 'style="display: block !important;"';

                                                        echo '
                                                        <!-- Modal -->
                                                            <div class="modal fade show " id="myModal" tabindex="3" role="dialog" style="z-index: 1050; ">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">PRONTUÁRIO</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">X</span>
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

                                        <div class="btns-group">
                                            <button type="button" <? echo $html_btn; ?> data-toggle="modal" data-target="#myModal" class="btn waves-effect waves-light btn-primary btn-block"><i class="icofont icofont-user-alt-3"></i>Prontuário</button>
                                            <button type="button" <? echo $img; ?> data-toggle="modal" data-target="#myModalImg" class="btn waves-effect waves-light btn-warning btn-block"><i class="icofont icofont-eye-alt"></i>Imagens</button>
                                        </div>

						   				<div class="form-actions">
					                        <div class="span12">
					                            <div class="span6 offset3">
					                                <button type="submit" class="btn btn-primary">Add</button> 
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
		justify-content: space-around;
		display: flex;
        width: 100%;
	}
    .btn-block+.btn-block {
        margin-top: 0rem;
    }
    .form-actions{
		margin-top: 25px !important;
	}

	.col-sm-10 {
		max-width: 100% !important;
	}

    .modal-lg {
        max-width: 1472px;
    }

    .imgIa{
        text-align: -webkit-center;
    }

    .form-actions{
		margin-top: 25px !important;
	}

	.col-sm-10 {
		max-width: 100% !important;
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

    .btnCardShare{
		font-size: 24px;
		cursor: pointer;
		text-align: center;	
		text-decoration: none;
		outline: none;
		color: #fff;
		background-color: #8807ba;
		border: none;
		border-radius: 15px;
		width: 300px;
    	height: 210px;
	}

	.btnCardShare:hover{
		background-color: #540672;
    	color: white;
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

    .pre_imagem{
        border-color: black;
        border-radius: 15px;
        max-width: 400px;
        max-height: 500px;
    }
</style>

<script type="text/javascript">
	$('.moeda').maskMoney({thousands:'.', decimal:',', symbolStay: true});
	$('.moedadigital').maskMoney({thousands:'.', decimal:',', symbolStay: true, precision:8});
</script>