<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-mail bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Templates de E-mails</h5>
                    <span>Templates usados no CRM do Sistema.</span>
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
                        <a href="<?=base_url().'email/templates'; ?>">Templates de E-mails</a>
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
                                <h5>Templates</h5>  
                                <div class="card-header-right">
                                    <!--<a href="<?=base_url().'email/adicionar'; ?>" class="btn btn-primary" style="display: inline;">
                                            <i class="icon-plus icon-white" style="color: white;"></i> Adicionar Template
                                   </a>-->
                                </div>
                            </div>
                            <div class="card-block">
                                <p>
                                    <div class="table-responsive">
                                    <table class="table table-de table-columned">
                                        <thead>
                                            <tr style="backgroud-color: #2D335B">
                                                <th>#</th>
                                                <th>Nome</th>
                                                <th width="100px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach (@$templates as $k => $r) {
               
                                                echo '<tr>';
                                                echo '<td>'.$r->idtemplate.'</td>';
                                                echo '<td>'.$r->nome.'</td>';
                                                echo '<td>
                                                          <a href="'.base_url().'email/editar/'.$r->idtemplate.'" class="btn btn-info tip-top"><i class="icon-pencil icon-white"></i> Editar</a>                      
                                                      </td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                            <tr>
                                                
                                            </tr>
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
