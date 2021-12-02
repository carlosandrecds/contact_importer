<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icon-handbag bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Configurações de usuário</h5>
                    <span></span>
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
								<h5>Informações Básicas</h5>
							<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
							</div>
							
								<div class="card-block">
									<form id="main" method="post" action="/" novalidate="">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Nome Completo</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="name" id="name" placeholder="Ex: Bernard Lowe">
											<span class="messages"></span>
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Apelido</label>
										<div class="col-sm-10">
											<input  class="form-control" id="password" name="password" placeholder="Como você quer ser chamado?	">
											<span class="messages"></span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Profissão</label>
										<div class="col-sm-10">
											<input class="form-control" id="repeat-password" name="repeat-password" placeholder="EX: Engenheiro de Biotecnologia">
											<span class="messages"></span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="email" name="email" placeholder="Coloque um Email válido, lembre-se que entraremos em contato através dele">
											<span class="messages"></span>
										</div>
									</div>

									<div class="row">
										<label class="col-sm-2 col-form-label">Gênero</label>
										<div class="col-sm-10">
											<div class="form-check form-check-inline">
												<label class="form-check-label">
												<input class="form-check-input" type="radio" name="gender" id="gender-1" value="option1"> Homem
												</label>
											</div>

											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input class="form-check-input" type="radio" name="gender" id="gender-2" value="option2"> Mulher
												</label>
											</div>
											<span class="messages"></span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2"></label>
									<div class="col-sm-10">
									
									<button type="submit" class="btn btn-primary m-b-0">Salvar</button>
									</div>
									</div>
									</form>
								</div>
							</div>
					</div>
				</div>
				<!-- [ page content ] end -->
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Alterar senha</h5>
					<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
				</div>

				<div class="card-block">
					<form id="second" action="/" method="post" novalidate="">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Senha</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="usernameP" name="Username" placeholder="Digite uma senha">
								<span class="messages popover-valid"></span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Repita a senha</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="EmailP" name="Email" placeholder="Repita a senha">
								<span class="messages popover-valid"></span>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2"></label>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary m-b-0">Salvar</button>
							</div>
						</div>
					</form>
				</div>
				</div>
		</div>
	</div>
</div>
