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
                    <button id='create-btn'>Create</button>
                    <form action="/minicell/index.php/adminpage" method='POST'>
                            <input type="hidden" name="method" value="DELETE">
                            <input type="hidden" name="product_id" value="<?php echo $result['id']; ?>">
                            <button id='Submit'>Delete</button>
                    </form>
                </div>
                <div id='display-area'>
                    <h3>Product Information</h3>
                    <form id='create-product-form' action='/minicell/index.php/adminpage' method='POST' enctype='multipart/form-data'>
                        <div id="images">
                            <label for="img">Main</label>
                            <input type="file" accept="image/*" id="img" name="img" required>
                            <label for="img">Support</label>
                            <input type="file" accept="image/*" id="img1" name="img1" >
                            <label for="img2">Support</label>
                            <input type="file" accept="image/*" id="img3" name="img2" >
                            <label for="img3">Support</label>
                            <input type="file" accept="image/*" id="img3" name="img3" >
                        </div>
                        <div id="texts">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>

                            <label for="desc">Description</label>
                            <input type="text" id="desc" name="desc" required>

                            <label for="price">Price</label>
                            <input type="text" id="price" name="price" required>
                            
                            <label for="category">Category</label>
                            <input type="text" id="category" name="category" required>

                            <label for="material">Material</label>
                            <input type="text" id="material" name="material" required>

                            <div id='sizes'>
                                <label for="small">S:</label>
                                <input type="number" id="size-small" name="small" required>

                                <label for="medium">M:</label>
                                <input type="number" id="size-medium" name="medium" required>

                                <label for="large">L:</label>
                                <input type="number" id="size-large" name="large" required>
                            </div>
                            
                            <label for="status">Status</label>
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
    const createBtn = document.querySelector('#create-btn');
    const createForm = document.querySelector('#create-product-form');
    createBtn.addEventListener('click', function(){
        createForm.reset();
    })
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