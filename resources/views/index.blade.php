<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/login.css" />
    <title>Login | PT.DIRGANTARA</title>
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <div class="login-box">
            <div class="header-text">
                <p>Login</p>
                <div>
                    <img class="img" src="assets/img/dirgantara.png" alt="" />
                </div>
            </div>
            <div class="input-group">
                <input type="text" class="input-field" id="username" required />
                <label for="username">Username</label>
            </div>
            <div class="input-group">
                <input type="password" class="input-field" id="password" required />
                <label for="password">Password</label>
            </div>
            <div class="forgot-pass">
                <a href="#">Forgot password?</a>
            </div>
            <div class="input-group">
                <button class="input-submit">
                    <a href="/assets/pub/dashboard.php">Login</a>
                    <i class="bx bx-log-in"></i>
                </button>
            </div>
        </div>
    </div>
</body>

</html>