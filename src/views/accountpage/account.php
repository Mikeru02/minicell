<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account | Minicell Apparel</title>

        <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="../src/views/accountpage/styles/style.css"/>

        <!-- Fonts -->
        <link href="https://fonts.cdnfonts.com/css/dela-gothic-one" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/spinnaker" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/aclonica" rel="stylesheet">

    </head>
    <body>
        <div class="responsive">
            <dv class="content">
                <header>
                    <a href="/minicell/index.php/homepage">
                        <img src="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png">
                    </a>
                    <p>#Account Information</p>
                    <i class="fa-solid fa-question"></i>
                </header>
                <div class="nav-edit">
                    <nav>
                        <div>
                            <i class="fa-solid fa-user"></i>
                            <p>User ID</p>
                        </div>
                        <?php echo $_SESSION['user']['id'];?>
                        <div>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <p>My Account</p>
                        </div>
                        <p>Profile</p>
                        <p>Address</p>
                        <p>Payment</p>
                        <div>
                            <i class="fa-solid fa-money-bill"></i>
                            <p>My Purchases</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-ticket"></i>
                            <p>Vouchers</p>
                        </div>
                    </nav>
                    <div id="edit-area">
                        <p>My Account</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>