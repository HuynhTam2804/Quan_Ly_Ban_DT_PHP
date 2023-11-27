{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Đăng Nhập</title>

    <link href="{{ asset('bootstrap-5.2.3/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/sidebars.css') }}" rel="stylesheet"> 


    <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

  </head>
  <body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{route('xl-login')}}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Đăng Nhập Tài Khoản</h1>
            <div class="form-floating">
            <input type="text" class="form-control" name="ten_dang_nhap" id="ten_dang_nhap" placeholder="Tên Tài Khoản">
            <label for="floatingInput">Tài Khoản</label>
            </div>
            <div class="form-floating">
            <input type="password" class="form-control" name="mat_khau" id="mat_khau" placeholder="Mật Khẩu">
            <label for="floatingPassword">Mật Khẩu</label>
            </div>

            <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Lưu
            </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng Nhập</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2003–2023</p>
        </form>
    </main>
  </body>
</html> --}}



<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Đăng Nhập</title>

        <!-- Custom fonts for this template-->
        <link href="{{asset('layout/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('layout/css/sb-admin-2.min.css')}}" rel="stylesheet">
        <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                        <form method="POST" action="{{route('xl-login')}}">
                            @csrf
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block ">
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('layout/img/undraw_rocket.svg')}}">
                                </div>

                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <form class="user">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                name="ten_dang_nhap" id="ten_dang_nhap" placeholder="Tài Khoản">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                name="password" id="password" placeholder="Mật Khẩu">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                            <hr>
                                            <a href="#" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                            <a href="#" class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                            </a>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="#">Forgot Password?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="#">Create an Account!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('layout/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('layout/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('layout/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('layout/js/sb-admin-2.min.js')}}"></script>
        <script src="{{ asset('sweetalert2/sweetalert2.all.min.js')}}"></script>
        
        @if (session('thong_bao'))
            <script>
                Swal.fire("{{session('thong_bao')}}")
            </script>
        @endif

    </body>

</html>