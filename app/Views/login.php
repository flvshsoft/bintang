<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url() ?>/public/assets/images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-4" style="background-image:url('https://i.pinimg.com/564x/fa/4f/ad/fa4fadbdd887f40fa2f5b621d013e9ba.jpg')">
                <div class="row mx-auto" style="background-color: #FFFFFF;width:70%;">
                    <!-- <div class=" mx-auto"> -->
                    <div class="col-lg-7 ml-auto">
                        <div class="auth-form-light auth-left text-center p-0">
                            <div class="brand-logo mt-4">
                                <img src="<?= base_url() ?>/public/assets/images/logo.png" alt="Logo">
                            </div>
                            <!-- Tambahkan gambar atau konten lainnya di sini -->
                            <img src="https://i.pinimg.com/564x/03/66/6c/03666c91066c13e5aebfdc2722a95631.jpg" width="100%" alt="Gambar Saya">
                            <p class="text-muted">© 2024 Bintang Rezeki</p>
                        </div>
                    </div>
                    <div class="col-lg-5 mr-auto" style="background: #436850;border:1px solid #FFFFFF">
                        <div class="auth-form-lightx text-center p-5 text-white">
                            <h4 class="text-bold">Welcome Back</h4>
                            <h6 class="font-weight-light">Sign in to your account</h6><br>
                            <form class="pt-3 text-start" action="<?= base_url('/proses_login') ?>" method="post">
                                <label class="mb-2">Username</label>
                                <div class="form-group d-flex">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="background: #314d3b;color:#ffffffcf;border:0px;">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" style="background:#ffffff;color:#000000;" class="form-control form-control-sm" name="username" id="exampleInputEmail1" placeholder="Username" autofocus>
                                </div>
                                <label class="mb-2">Password</label>
                                <div class="form-group d-flex">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="background: #314d3b;color:#ffffffcf;border:0px;">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" style="background:#ffffff;color:#000000;" class="form-control form-control-sm" name="password" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <!-- <div class="form-group">
                                    <select class="form-control form-control-lg" id="exampleSelectGender">
                                        <option>Select Branch</option>
                                        <option>PKU</option>
                                    </select>
                                </div> -->
                                <div class="mt-3">
                                    <button class="btn btn-block btn-gradient-danger btn-lg font-weight-medium auth-form-btn col-12" type="submit">Login</button>
                                </div><br>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <a href="#" class="auth-link text-black mx-auto">Forgot password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>/public/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url() ?>/public/assets/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>/public/assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>/public/assets/js/misc.js"></script>
</body>


</html>