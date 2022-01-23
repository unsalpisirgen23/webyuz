<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webyuz.net - Yönetici Girişi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        html, body {
            background: #f7f7f7;
            padding: 0px;
            margin: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .login-container {
            width: 400px;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: absolute;
            top: 30%;
        }

        .login {
            width: 400px;
            height: 300px;
            background: #ffff;
            display: flex;
            justify-content: center;
            align-self: center;
            flex-direction: column;
            margin-left: auto;
            margin-right: auto;
        }

        .card-body {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="card login">
        <div class="card-body">
            <form method="POST" action="{{route("login_authentication")}}" id="form">
                @csrf
                <div class="row mb-3" style="min-width: 400px;padding: 0px;">
                    <label for="email" class="col-md-3 col-form-label text-md-end">E-Posta</label>
                    <div class="col-md-8 w-100">
                        <input id="email" type="email" class="form-control w-100" name="email" value="" required
                               autocomplete="email" autofocus>
                    </div>
                </div>
                <div class="row mb-3" STYLE="min-width: 400px;">
                    <label for="password" class="col-md-3 col-form-label text-md-end ">Şifre</label>
                    <div class="col-md-8 w-100">
                        <input id="password" type="password" class="form-control w-100" name="password" required
                               autocomplete="current-password">
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary w-100">
                            Giriş Yap
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>