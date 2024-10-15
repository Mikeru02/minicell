<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Minicell Apparel</title>

    <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/icon_type" />

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/spinnaker" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/dela-gothic-one" rel="stylesheet">

    <!-- Stylesheets --> 
    <link rel="stylesheet" href="../src/views/adminpage/styles/adminpage.css" />
    
</head> 
<body>
    <div class="responsive-container">
        <header>
            <img src="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" />
            <div>
                <p class="welcome-text">Welcome Back, Admin</p>
                <p>What do you want to do today?</p>
            </div>
        </header>
        <main>
            <nav>
                <ul>
                    <li>Manage Products</li>
                    <li>Vouchers</li>
                </ul>
                <form action="/minicell/index.php/logout" method="POST" style="display: inline;">
                    <button class="logout" type="submit">Logout</button>
                </form>
            </nav>
            <div class="content-area">

            </div>
        </main>
        <!-- <form action="/minicell/index.php/adminpage" method="POST" enctype="multipart/form-data">
            <input type="file" accept="image/*" id="img" name="img" />
            <input type="text" id="name" name="name" />
            <input type="text" id="desc" name="desc" />
            <input type="text" id="price" name="price" />
            <input type="text" id="status" name="status" />
            <button id="submit">Submit</button>
        </form>
        <form action="/minicell/index.php/logout" method="POST" style="display: inline;">
            <button type="submit">Logout</button>
        </form>
        -->
    </div>
</body>
</html>