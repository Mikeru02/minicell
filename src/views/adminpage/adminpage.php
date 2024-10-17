<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Admin | Minicell Apparel</title>

    <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/icon_type" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/spinnaker" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/dela-gothic-one" rel="stylesheet">

    <!-- Stylesheets --> 
    <link rel="stylesheet" href="../src/views/adminpage/styles/adminpage.css" />
    
    <!-- Scripts -->
    <script src="../src/views/adminpage/js/adminpage.js" defer></script>

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
                    <li id="manage-products">Manage Products</li>
                    <li id="vouchers">Vouchers</li>
                </ul>
                <form action="/minicell/index.php/logout" method="POST" style="display: inline;">
                    <button class="logout" type="submit">Logout</button>
                </form>
            </nav>
            <div class="content-area" id="content-area">
                <div class='header-div'>
                    <form action='/minicell/index.php/adminpage' method='GET' id='search-form'>
                        <div class='search-bar'>
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type='text' placeholder='Search' name='search' id='search' required>
                        </div>
                        <button type='submit' id='search-btn'>Search</button>
                    </form>
                    <form action="/minicell/index.php/adminpage" method="POST">
                        <button type='submit' id='create-btn'>Create</button>
                    </form>
                </div>
                <div id='display-area'>
                    <h3>Product Information</h3>
                    <form id='create-product-form' action='/minicell/index.php/adminpage' method='POST' enctype='multipart/form-data'>
                        <div id='content-fields'>
                            <p>Image</p>
                            <p>Name</p>
                            <p>Decription</p>
                            <p>Price</p>
                        </div>
                        <div id='input-fields'>
                            <input type="file" accept="image/*" id="img" name="img" required>
                            <input type="text" id="name" name="name" required>
                            <input type="text" id="desc" name="desc" required>
                            <input type="text" id="price" name="price" required>
                        </div>
                        <div id='content-fields'>
                            <p>Category</p>
                            <p>Materials</p>
                            <p>Stocks</p>
                            <p>Status</p>
                        </div>
                        <div id='input-fields'>
                            <input type="text" id="category" name="category" required>
                            <input type="text" id="material" name="material" required>
                            <div id='sizes'>
                                <p>S:</p>
                                <input type="number" id="size-small" name="small" required>
                                <p>M:</p>
                                <input type="number" id="size-medium" name="medium" required>
                                <p>L:</p>
                                <input type="number" id="size-large" name="large" required>
                            </div>
                            <input type="text" id="status" name="status" required>
                            
                        </div>
                        <button id='Submit'>Submit</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var result = <?php echo json_encode($result); ?>;

        const inputName = document.getElementById('name');
        const inputDesc = document.getElementById('desc');
        const inputPrice = document.getElementById('price');
        const inputCategory = document.getElementById('category');
        const inputMaterial = document.getElementById('material');
        const inputSmall = document.getElementById('size-small');
        const inputMedium = document.getElementById('size-medium');
        const inputLarge = document.getElementById('size-large');
        const inputStatus = document.getElementById('status');

        if (result){
            inputName.value = result['name'];
            inputDesc.value = result['description'];
            inputPrice.value = result['price'];
            inputCategory.value = result['category'];
            inputMaterial.value = result['materials'];
            inputSmall.value = result['small'];
            inputMedium.value = result['medium'];
            inputLarge.value = result['large'];
            inputStatus.value = result['status'];
        }
    })
</script>
</html>