<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Link Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <!-- Menambahkan link ke CSS FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link rel="shortcut icon" href="/img/logo-smp.png"> -->

    <title>Login Siswa - Siponsi</title>

    <style>
        body {
            background-color: #fff;
        }

        .login-container {
            height: 100vh;
            display: flex;
            align-items: center;
        }

        ::placeholder {
            font-size: small;
        }

        .input-icon {
            position: relative;
        }

        .user {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #000;
            left: 4%
        }

        .pass {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #000;
        }

        .mata {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #000;
            transition: color 0.3s ease;
            right: 0;
        }

        input[type="text"],
        input[type="password"],
        textarea {
            padding-left: 40px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center"
                style="background-color: #F5F8FE;">
                <img src="/img/img-login.png" class="img-fluid w-75" alt="">
            </div>
            <div class="col-md-6">
                <div class="p-5 login-container">
                    <div class="login-form p-5">
                        <p class="h3 fw-semibold">Login</p>
                        <p class="mt-1">Silahkan login untuk melanjutkan ke halaman berikutnya</p>
                        <form class="mt-4" action="/login-siswa" method="POST">
                            <label class="form-label fw-semibold">Username</label>
                            <div class="mb-3 input-icon">
                                <i class="fa-solid user fa-user"></i>
                                <input type="text" class="form-control border-dark" id="username"
                                    placeholder="Masukkan username anda" name="username">
                            </div>
                            <label class="form-label fw-semibold">Password</label>
                            <div class="mb-3 input-icon">
                                <i class="fa-solid user fa-lock"></i>
                                <input type="password" class="form-control border-dark password-input"
                                    id="exampleInputPassword1" name="password" placeholder="Masukkan password anda">
                                <span><i class="fa-solid mata fa-eye-slash" style="margin-right: 10px;"
                                        id="togglePassword"></i></span>
                            </div>
                            <button type="submit"
                                class="btn text-white fw-bold bg-dark mt-4 col-12 py-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        const alertMessage = <?= json_encode(session('alert')) ?>;
        if (alertMessage) {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan',
                text: alertMessage
            });
        };

        const passwordInput = document.getElementById("exampleInputPassword1");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.classList.remove("fa-eye-slash");
                togglePassword.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                togglePassword.classList.remove("fa-eye");
                togglePassword.classList.add("fa-eye-slash");
            }
        });
    </script>
</body>

</html>