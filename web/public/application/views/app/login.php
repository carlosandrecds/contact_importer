
<!DOCTYPE html>
<html lang="en"> 

<style>

.login-block{
    background-position: left;
    background-color: black;
    background-size: 900px 900px;
    background-repeat: no-repeat;
}

.cssscrollbar{
    background-color: black;
}

.wpb_wrapper{
    bottom: 0;
    position: absolute;
    left: 1%;
    width: 100%;
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
                        <form class="md-float-material form-material" id="formLogin">
                            <div class="text-center">
                                <img src="<?php echo base_url();?>assets/sysAssets/logo.png" alt="logo.png" style="width: 200px; display: block;">
                            </div>
                            <div class="auth-box card" style="
                                margin-right: 100px;
                                margin-top: 8%;
                            ">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                        </div>
                                    </div>

                                    <div class="form-group form-primary">
                                        <input type="text" name="email" id="email" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">E-mail</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="senha" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="forgot-phone text-right float-right">
                                                <a href="auth-reset-password.html" class="text-right f-w-600"> Forgot password?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-inverse btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                                            
                                        </div>
                                    </div>
                                    <p class="text-inverse text-left">Dont have an account?<a href="<?php echo base_url();?>app/cadastro"> <b style="font-size: 15px; font-weight: bold; color: #37474f;">Sign up here </b></a>It is free!</p>
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

            $("#formLogin").validate({
                rules :{
                    email: { required: true, email: true},
                    senha: { required: true}
                },
                messages:{
                    email: { required: 'Campo Requerido.', email: 'Insira um Email válido'},
                    senha: {required: 'Campo Requerido.'}
                },
                submitHandler: function( form ){       
                    var dados = $( form ).serialize();

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>app/verificarLogin?ajax=true",
                        data: dados,
                        dataType: 'json',
                        success: function(data){
                            if(data.tip == 1){

                                var url_string = window.location.href
                                var url = new URL(url_string);
                                var p = url.searchParams.get("url");

                                swal("Logado!", 'Redirecionando...', "success");

                                if (p){
                                    window.location.href = p;  
                                }else{
                                    window.location.href = "<?php echo base_url();?>";
                                }
                            }else{
                                console.log('deu erro')
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

    <script type="text/javascript">
            
            var span = document.getElementById('log');
            var textos = 
            [
                'Tuberculose viral',
                'Tuberculose Bacteriana',
                'Melanoma',
                'Pneumonia',
                'Covid-19',
                'Raio-X',
                'Retinoblastoma',
                
            ];

            function escrever(str, done) {
                var char = str.split('').reverse();
                var typer = setInterval(function() {
                    if (!char.length) {
                        clearInterval(typer);
                        return setTimeout(done, 500); // só para esperar um bocadinho
                    }
                    var next = char.pop();
                    span.innerHTML += next;
                }, 80);
            }

            function limpar(done) {
                var char = span.innerHTML;
                var nr = char.length;
                var typer = setInterval(function() {
                    if (nr-- == 0) {
                        clearInterval(typer);
                        return done();
                    }
                    span.innerHTML = char.slice(0, nr);
                }, 80);
            }

            function rodape(conteudos, el) {
                var atual = -1;
                function prox(cb){
                    if (atual < conteudos.length - 1) atual++;
                    else atual = 0;
                    var str = conteudos[atual];
                    escrever(str, function(){
                        limpar(prox);
                    });
                }
                prox(prox);
            }
            rodape(textos);

        </script>

    </body>


</html>
