<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="asset/css/sb-admin-2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body style="background-color bg-light" class="bg-light">
<div class="container"><br><br><br>

<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12" >
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Log In</h1>
                                <marquee>Harap LogIn terlebih dahulu untuk masuk ke Sistem Informasi CV.Sanggar Teknik Persada</marquee>

                            </div>
                            <form action="<?php echo base_url('login/proses_login'); ?> " class="user" method="post">
                                <div class="foorm-group mb-2">
                                    <input type="text" class="form-control form-control-user rounded-pill" id="username" aria-describedby="emailHello" placeholder="Username" name="username">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-form-control-user rounded-pill" id="password" placeholder="password" name="password">
                                </div>
                                <button type="submit"class="btn btn-primary btn-user btn-block rounded-pill">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</div>
</html>