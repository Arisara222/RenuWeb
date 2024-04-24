<style>
*{
  margin:0px;
  padding:0px;
  box-sizing: border-box;
}

body{
  background: #66a5ff;
}

.animateme {
	position: fixed;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 100%;
	overflow: hidden;
	z-index: -1;
}

.bg-bubbles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.bg-bubbles li {
  position: absolute;
  list-style: none;
  display: block;
  width: 40px;
  height: 40px;
  background-color: #353535;
  bottom: 60px;
  -webkit-animation: square 25s infinite;
  animation: square 25s infinite;
  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
  opacity:0;
}

.bg-bubbles li:nth-child(1) {
  left: 3%;
  border-radius:50em;
  background:transparent;
  border:4px solid #353535;
}
.bg-bubbles li:nth-child(2) {
  left: 6%;
  width: 75px;
  height: 75px;
  -webkit-animation-delay: 2s;
          animation-delay: 2s;
  -webkit-animation-duration: 17s;
          animation-duration: 17s;
}
.bg-bubbles li:nth-child(3) {
  left: 15%;
  width: 175px;
  height: 175px;
  -webkit-animation-delay: 4s;
          animation-delay: 4s;
}
.bg-bubbles li:nth-child(4) {
  left: 40%;
  width: 90px;
  height: 90px;
  -webkit-animation-duration: 22s;
          animation-duration: 22s;
}
.bg-bubbles li:nth-child(5) {
  left: 70%;
  background:transparent;
  border:4px solid #353535;
}
.bg-bubbles li:nth-child(6) {
  left: 90%;
  width: 90px;
  height: 90px;
  -webkit-animation-delay: 3s;
          animation-delay: 3s;
  border-radius:50em;
  background:transparent;
  border:4px solid #353535;
}
.bg-bubbles li:nth-child(7) {
  left: 32%;
  width: 60px;
  height: 60px;
  -webkit-animation-delay: 7s;
          animation-delay: 7s;
  background:transparent;
  border:4px solid #353535;
}
.bg-bubbles li:nth-child(8) {
  left: 55%;
  width: 50px;
  height: 50px;
  -webkit-animation-delay: 15s;
          animation-delay: 15s;
  -webkit-animation-duration: 40s;
          animation-duration: 40s;
}
.bg-bubbles li:nth-child(9) {
  left: 30%;
  width: 140px;
  height: 140px;
  -webkit-animation-delay: 2s;
          animation-delay: 2s;
  -webkit-animation-duration: 40s;
          animation-duration: 40s;
  border-radius:50em;
  background:transparent;
  border:4px solid #353535;
}
.bg-bubbles li:nth-child(10) {
  left: 90%;
  width: 60px;
  height: 60px;
  -webkit-animation-delay: 11s;
          animation-delay: 11s;
}
.bg-bubbles li:nth-child(11) {
  left: 10%;
  width: 40px;
  height: 40px;
  -webkit-animation-delay: 13s;
          animation-delay: 13s;
  border-radius:50em;
}
.bg-bubbles li:nth-child(12) {
  left: 55%;
  width: 175px;
  height: 175px;
  -webkit-animation-delay: 7s;
          animation-delay: 7s;
  background:transparent;
  border:4px solid #353535;
}

.bg-bubbles li:nth-child(13) {
  left: 65%;
  width: 100px;
  height: 100px;
  -webkit-animation-delay: 8s;
          animation-delay: 8s;
  border-radius:50em;
}

@-webkit-keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    opacity:0;
  }
  50% {
    opacity:1;
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
    opacity:1;
  }
}
@keyframes square {
  0% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    opacity:0;
  }
  50% {
    opacity:1;
  }
  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
            transform: translateY(-700px) rotate(600deg);
    opacity:0;
  }
}
</style>

<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Renu</title>  
  <link rel="shortcut icon" type="image/png" href="{base_url}src/assets/images/logos/logo.jpg" />
  <link rel="stylesheet" href="{base_url}src/assets/css/styles.min.css" />
</head>

<body>
<div class="animateme">
  <ul class="bg-bubbles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div> 

</div>
  <!--  Body Wrapper --> 
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100 mb-4">
                  <img src="{base_url}src/assets/images/logos/logorenu.png" width="180" alt="" >
                </a>

                <form autocomplete="off">
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <!-- <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label> -->
                    </div>
                  </div>
                  <!-- <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-5 rounded-2">Sign In</a> -->
                  <div class="d-grid gap-2">
                    <button id="btnLogin" type="button" class="btn btn-Success w-100 py-8 fs-4 mb-5 rounded-2">
                      Login
                    </button>
                  </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-1 mb-0 fw-bold">Renu Engineering Inspections (Thailand) Co., Ltd.</p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- ============================================================== -->
  <!-- Create function baseUrl  -->
  <!-- ============================================================== -->

  <script>
  
    function base_url(url) {
        return '<?php echo $base_url; ?>' + url;
    }

    </script>

  <!-- ============================================================== -->
  <!-- All Required js -->
  <!-- ============================================================== -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="{base_url}src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="{base_url}src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{base_url}src/assets/js/login.js"></script>
  
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->

</body>

</html>