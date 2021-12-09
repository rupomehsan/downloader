
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="./vendors/feather/feather.css" />
    <link rel="stylesheet" href="./vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="./vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" type="text/css" href="./js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="./css/vertical-layout-light/style.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
<div class="container">
        <div class="row  mt-5">
            <div class="col-lg-6 col-12 offset-lg-3">
                <div class="card p-3">
                    <div class="card-body">
                        <center>
                            <h4>Sign In</h4>
                            <span>Log in to your account to continue</span>
                        </center>
                        <form action="" id="loginForm">
                            <div class="form-group mb-3">
                                <label for="">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bi bi-person-circle"></i>
                                    </span>
                                    <input type="text" placeholder="UserName" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" placeholder="Password" id="password" class="form-control">
                                </div>
                            </div>
                            <div class="text-end mb-3">
                                <a href="forget_password.php" class="text-secondary">Forgot password?</a>
                            </div>
                            <button class="form-control btn btn-primary mb-3">Log in</button>
                        </form>
                        <center>
                            <span>© 2021 All Rights Reserved. ProjectX</span>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- plugins:js -->
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
               integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
               crossorigin="anonymous" referrerpolicy="no-referrer"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
               integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
               crossorigin="anonymous" referrerpolicy="no-referrer"></script>
           <script src="../vendors/js/vendor.bundle.base.js"></script>
           <!-- endinject -->
<script>
  $('#loginForm').submit(function(e){
    e.preventDefault();
    var email = $("#email").val()
    var password = $("#password").val()

     $.ajax({
                       // method: 'post',
                       url: 'service/login.php',
                       data: {
                         "email" : email,
                         "password" : password
                       },
                       type: 'POST',
                       success: function (res) {
                           console.log(res)
                        if(res.data){
                          localStorage . setItem("accessToken", res.data);
                          console.log(res)
                        }

                       },
                       error: function (err) {
                           console.log(err)
                       }
                   })

  })
</script>
