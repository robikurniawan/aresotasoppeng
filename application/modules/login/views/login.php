<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>


html {
/* background: url(<?= base_url('assets/image/bg.png')?>) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  z-index: 999;*/
  background-color: #607d8b;
}

.login-box-body, .register-box-body{
  border-radius: 15px;
  box-shadow: 7px 8px 18px 2px #333333b0;
}

.form-control{
  border-radius: 10px;
}
.has-feedback .form-control{
  border-radius: 5px;
}


</style>

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/css/bootstrap.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.11/dist/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/iCheck/square/blue.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body style="font-family:"Helvetica Neue", Helvetica, Arial, sans-serif";>

  <div class="bg"></div>

<!-- <div class="col-md-8" style="">


</div>

<div class="col-md-4"> -->

<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
  <center>
      <!-- <img src="<?= base_url()?>assets/front/x.png" alt="" style="width:100px;"> -->
            <h3>
               <b>
               CV. </b> Aresota Sopppeng
            </h3>
         </center>
  <br>
  <?php echo validation_errors(); ?>
  <form>
      <div class="form-group has-feedback">
      <input type="text" class="form-control" id="username"  name="username" placeholder="User" autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password"  id="password"   name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <select class="form-control" id="level" name="level">
            <option value="">Masuk Sebagai</option>
            <option value="produksi">Bagian Produksi</option>
            <option value="gudang">Bagian Gudang</option>
            <option value="admin">Bagian Administrasi</option>
            <option value="pimpinan">Pimpinan</option>
        </select>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>


      <div class="row">
        <div class="col-md-8">
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <button type="button" id="login" class="submit btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
   

      </div>
    </form>
  <hr>
  <p class="text-center"> 
  Yulinar Rauf : 014.01.028 <br>
  Adi Sulham : 014.01.037 <br>
  STMIK LAMAPPAPOLEONRO SOPPENG 2018
  <br>  Copyright &copy <?= date('Y')?> </p>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- </div> -->




<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/iCheck/icheck.min.js');?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });

  $(document).ready(function(){

	  $('#login').click(function(){


		  $.ajax({
			  type:'POST',
			  url:'<?php echo base_url('index.php/auth/login');?>',
			  data:{
				username: $('#username').val(),
				password: $('#password').val(),
        level: $('#level').val()
			  },
			  dataType: 'json',
			  success: function(response){

				if(response.success==true){
					window.location = "<?php echo base_url('index.php/home');?>"
          $('.submit').html("<i class='fa fa-spinner faa-spin animated' style='margin-right:5px;'></i> Proses...");

				}else{

           alert(response.message);

			     }
			  },
			  error: function(){
				alert("Ajax Error.");
			  }


		  });
	  });
  });

</script>
</body>
</html>
