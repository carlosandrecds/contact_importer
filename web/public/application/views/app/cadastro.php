
<!DOCTYPE html>
<html lang="en">
<style>


.cssscrollbar{
    background-color: black;
}

.login-block{
    background-color: black;

}


</style>
<head>
    <title>Contact Importer | Ultimate importer tool</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="colorlib" />
      <!-- Favicon icon -->

      <link rel="icon" href="<?php echo base_url();?>assets/sysAssets/favicon.png" type="image/x-icon">
      <!-- Google font-->     
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/waves.min.css" type="text/css" media="all"><!-- feather icon --> 
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/feather.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pages.css">

	    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/sweetalert.css">
  </head>

  <body themebg-pattern="theme7" style="background-image: linear-gradient(rgba(255,255,255,0.7) 380px, #f2f7fb 0%);">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <form class="md-float-material form-material" id="formCadastro">
                        <div class="text-center">
                            <img src="<?php echo base_url();?>assets/sysAssets/logo.png" alt="logo.png" style="width: 180px;display: block;">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign up</h3>
                                    </div>
                                </div>
                                
                                <div class="form-group form-primary">
                                    <input type="text" name="nome" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Name</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">E-mail</label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="senha" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="senharepetir" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Confirm password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="1" name="aceitotermos">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">I read and accept the <a href="#">Terms and use conditions.</a></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button class="btn btn-inverse btn-md btn-block waves-effect text-center m-b-20" id="registrar">Sign up</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thanks.</p>
                                        <p class="text-inverse text-left"><a href="<?php echo base_url();?>"><b style="font-size: 15px; font-weight: bold; color: #37474f;">Return to the main page</b></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

<!-- Required Jquery -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="<?php echo base_url();?>assets/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/css-scrollbars.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common-pages.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/validate.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        $('#email').focus();

        $("#formCadastro").validate({
            rules :{
                email: { required: true, email: true},
                senha: { required: true}
            },
            messages:{
                email: { required: 'Field required.', email: 'Insert a valid E-mail'},
                senha: {required: 'Field required.'}
            },
            submitHandler: function( form ){       
                var dados = $( form ).serialize();

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>app/cadastro_acao",
                    data: dados,
                    dataType: 'json',
                    success: function(data){
                        if(data.tip == 1){

                            var url_string = window.location.href
                            var url = new URL(url_string);
                            var p = url.searchParams.get("url");

                            swal("Welcome!", data.msg, "success");

                            if (p){
                                window.location.href = p;  
                            }else{
                                window.location.href = "<?php echo base_url();?>";
                            }
                        }else{
                            swal("Ops!", data.msg, "error");
                        }
                    }
                });

            return false;
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

    });

</script>

</body>

</html>
