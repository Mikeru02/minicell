<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minicell Apparel</title>

    <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../src/views/adminpage/styles/style.css"/>

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/dela-gothic-one" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/spinnaker" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/aclonica" rel="stylesheet">

    <script src="../src/views/adminpage/js/script.js" defer></script>
</head>
<body>
    <div class="responsive">
        <div class="logo">
            <a href="/minicell/index.php">
                <img src="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/png" />
            </a>
        </div>
        <div class="content">
            <div class="left-side">
                <form action="/minicell/index.php/admin" method="POST">
                    <p class="header">Log In to Minicell</p>
                    <input type="text" id="mobile_num" name="mobile_num" value="mobile_num" onclick="clearInput('mobile_num')" onblur="resetInput('mobile_num')"/>
                    <input type="text" id="password" name="password" value="password" onclick="clearInput('password')" onblur="resetInput('password')"/>
                    <div class="buttons">
                        <button class="login-btn">Log In</button>
                    </div>
                </form>
            </div>
            <div class="right-side">
                <div class="right-header">
                    <p class="hello">Welcome, Admin</p>
                    <p>Enter your Log In credentials</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>