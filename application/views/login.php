
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url(); ?>assets/" data-template="vertical-menu-template-free">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Savaari</title>
        <meta name="description" content="" /> <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/admin/img/favicon/favicon.ico" /> <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" /> <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/vendor/fonts/boxicons.css" /> <!-- Core CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/demo.css" />
        <link rel="stylesheet" href="<?= base_url(); ?>css/style.css" />
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" /> <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/vendor/css/pages/page-auth.css" /> <!-- Helpers -->
        <script src="<?= base_url(); ?>assets/admin/vendor/js/helpers.js"></script>
        <script src="<?= base_url(); ?>assets/admin/js/config.js"></script>

        <style>
html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: rgb(34,193,195);
background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(110,190,174,0.6363795518207283) 34%, rgba(253,187,45,1) 100%);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 20px;
  color: #fff;
  margin-bottom: 50px;
  margin-top: 15px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
button{
  background-color:transparent !important;
  color:white;
  padding:10px;
  border-width:0px;
}

</style>
    </head>

    <body>
                            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">

                            <div class=" login-box">
    <h2>Welcome To Admin Login</h2>
    <?php
                                if($this->session->flashdata('success')) {
                                    echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
                                } elseif($this->session->flashdata('error')) {
                                    echo "<div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";
                                }
                            ?>
    
    <form id="formAuthentication" class="" action="<?= base_url('Login/authenticate'); ?>" method="POST">
      <div class="user-box">
        
        <input type="text" class="form-control mt-5" id="email" name="username" placeholder="Enter your username" autofocus />
        
        <label for="email" class="form-label mb-5" style="font-size:15px; font-weight:bold;">USERNAME</label>
      </div>
      <div class="user-box">
      <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" /> <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        
        <label class="form-label mb-5" style="font-size:15px; font-weight:bold;" for="password">PASSWORD</label>
      </div>
      <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <button type="submit">
        LOGIN
                              </button>
      </a>
    </form>
    
    
  </div>
  
  </div>
  <p class="text-center"> <span>Go to website?</span> <a href="<?= base_url(); ?>"> <span>Click here 👈</span> </a> </p>
  </div>
  
  </div>
        
       <!-- / Content -->
        <!-- Core JS -->
        <!-- build:js assets/admin/vendor/js/core.js -->
        <script src="<?= base_url(); ?>assets/admin/vendor/libs/jquery/jquery.js"></script>
        <script src="<?= base_url(); ?>assets/admin/vendor/libs/popper/popper.js"></script>
        <script src="<?= base_url(); ?>assets/admin/vendor/js/bootstrap.js"></script>
        <script src="<?= base_url(); ?>assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="<?= base_url(); ?>assets/admin/vendor/js/menu.js"></script> <!-- endbuild -->
        <!-- Vendors JS -->
        <!-- Main JS -->
        <script src="<?= base_url(); ?>assets/admin/js/main.js"></script> <!-- Page JS -->
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>

</html>
