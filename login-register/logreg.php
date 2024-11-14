<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="logreg.css">
</head>
<body>
    <div class="container">



        <form action="../controller/login-controller.php" class="formlogin tab-content" id="tab1" method="post" required>
            <div class="formlogininner">
                <h1>Form Login</h1>
                <div class="username">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username-register" placeholder='Masukkan username' required>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password-register" placeholder='Masukkan password' required>
                </div>
                <div class="any">
                    <a href="#">Forgot Password?</a>
                    <button class='btnlogsub' type='submit'>Login</button>
                </div>
            </div>
            
        </form>

        <form action="../controller/register-controller.php" class="formregister tab-content" id="tab2" method="post">
            <div class="formregisterinner">
                <h1>Form Register</h1>
                <div class="username">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username-register" placeholder='Masukkan username' required>
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email-register" placeholder='Masukkan Email' required>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password-register" placeholder='Masukkan password' required>
                </div>
                <div class="any">
                    <button class='btnregsub' type='submit'>Register</button>
                </div>
            </div>

        </form>

        <div class="btn">
            <div class="btlog">
                <button id='btnlogin' class='btnbtn' onClick='openTab(1)'><p>LOGIN</p></button>

            </div>
            <div class="btreg">
                <button id='btnregister' class='btnbtn' onClick='openTab(2)'><p>REGISTER</p></button>

            </div>
        </div>
    </div>

    <script src='logreg.js'></script>
</body>
</html>