<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-mail bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Fila de Envio de E-mails</h5>
                    <span>O sistema processa os e-mails de minuto em minuto.</span>
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
                        <a href="<?=base_url().'email/fila'; ?>">Fila de E-mails</a>
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
								<h5>Fila (<?php echo count($paraEnviar); ?> aguardando envio)</h5>	
								<div class="card-header-right">
                                    <a href="<?=base_url().'email/fila'; ?>" class="btn btn-primary" style="display: inline;">
											<i class="icon-refresh icon-white" style="color: white;"></i> Atualizar
								   </a>
                                </div>
							</div>
							<div class="card-block">
								<p>
									<div class="table-responsive">
									<table class="table table-de table-columned">
										<thead>
											<tr style="backgroud-color: #2D335B">
												<th>#</th>
												<th>Template</th>
												<th>Nome</th>
												<th>E-mail</th>
												<th>Assunto</th>
												<th>Data Envio</th>
											</tr>
										</thead>
										<tbody>
											<?php 

												foreach (@$emails as $k => $r) {
												   
													echo '<tr>';
														echo '<td>'.$r->idemail.'</td>';
														echo '<td>'.$r->idtemplate.'</td>';
														echo '<td>'.$r->nome.'</td>';
														echo '<td>'.$r->email.'</td>';
														echo '<td>'.$r->assunto.'</td>';
														echo '<td>'.$r->datahoraenvio.'</td>';
														/*echo '<td>'.statusSparkPost($r->statussparkpost).'</td>';
														echo '<td>'.status($r->status).'</td>';*/
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