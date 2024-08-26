<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #202122;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #000000;
            border-radius: 15px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .login-card svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .login-card img {
            display: block;
            margin: 0 auto 2rem;
            width: 116px;
            height: 91px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            background-color: #010409;
            border: 1px solid #333;
            color: #fff;
        }

        .btn-outline-light {
            width: 100%;
            margin-bottom: 1rem;
        }

        .btn-outline-light:hover {
            background-color: #fff;
            color: rgb(168, 2, 2);
        }

        .btn-outline-danger {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="login-card position-relative">
        <div class="row justify-content-center mb-4">
            <img src="{{ asset('assets/yeka-coach-logotype.webp') }}" alt="Logo">
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="text-light">Correo</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="text-light">Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-outline-light">
                    Login
                </button>
            </div>

            <div class="form-group">
                <button type="reset" class="btn btn-outline-danger">
                    Reset
                </button>
            </div>
        </form>

        <svg viewBox="0 0 1200 287" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M162.717 180.628C-86.3772 169.022 -137.029 314.672 -217.662 281.033C-221.295 120.237 -266.478 -196.064 -260.383 -205.754C-254.288 -215.444 613.57 -196.944 1096.04 -196.124L1097.08 -39.3315C995.071 57.837 1076.45 83.3011 706.035 78.4648C444.355 75.0482 441.541 193.62 162.717 180.628Z"
                fill="#0a0a0a" />
        </svg>

        <svg viewBox="0 0 1200 224" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M-8.28252 117.628C-257.377 106.022 -308.029 251.672 -388.662 218.033C-392.295 57.2372 -437.478 -259.064 -431.383 -268.754C-425.288 -278.444 442.57 -259.944 925.038 -259.124L926.078 -102.331C824.071 -5.16302 905.445 20.3011 535.035 15.4648C273.355 12.0482 270.541 130.62 -8.28252 117.628Z"
                fill="#141414" />
        </svg>
    </div>

</body>

</html>
