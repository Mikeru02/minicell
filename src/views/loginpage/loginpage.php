<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minicell Apparel</title>

    <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../src/views/loginpage/styles/style.css"/>

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/dela-gothic-one" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/spinnaker" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/aclonica" rel="stylesheet">


</head>
<body>
    <div class="responsive">
        <div class="logo">
            <a href="/minicell/">
                <img src="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/png" />
            </a>
        </div>
        <div class="content">
            <div class="left-side">
                <form action="/minicell/index.php/login" method="POST">
                    <p class="header">Log In to Minicell</p>
                    <div class="buttons">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-google"></i>
                    </div>
                    <p class="desc">or use your Phone Number</p>
                    
                    <input type="text" id="phone-number" name="mobile_num"/>
                    <input type="password" id="password" name="password"/>
                    <div class="buttons">
                        <button class="login-btn">Log In</button>
                        <button class="forgot-pass">Forgot Password</button>
                    </div>
                </form>
            </div>
            <div class="right-side">
                <div class="right-header">
                    <p class="hello">Welcome Back</p>
                    <p>To keep connected with us, kindly</p>
                    <p>enter your Log In credentials</p>
                </div>
                <p class="have-account">Don't have an account?</p>
                <a href="/minicell/index.php/signUp">
                    <button id="login-button">Sign Up</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>