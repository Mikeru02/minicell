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
    <link rel="stylesheet" href="../src/views/adminpage/styles/voucher.css" />
    
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
                    <li id="orders">Orders</li>
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
    const manageBTN = document.querySelector('#manage-products');
    const ordersBTN = document.querySelector('#orders');
    const vouchersBTN = document.querySelector('#vouchers');
    const editArea = document.querySelector('#content-area');

    manageBTN.addEventListener('click', async function(){
        editArea.style.flexDirection = 'column';
        editArea.innerHTML = '';
        editArea.innerHTML = `
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
                            <input type="hidden" name="product_id" value="">
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
        `;
    })

    ordersBTN.addEventListener('click', async function(){
        editArea.style.flexDirection = 'column';
        editArea.innerHTML ='';

        const orderFetch = await fetch('/minicell/index.php/allorders');
        const orderData = await orderFetch.json();
        
        for (const data of orderData) {
            let orderContainer = document.getElementById(`order-${data.id}`);
            if (!orderContainer) {
                orderContainer = document.createElement('div');
                orderContainer.classList.add('order-container');
                orderContainer.id = `order-${data.id}`;
                orderContainer.innerHTML = `
                    <p>Order ID: ${data.id}</p>
                    <div class="order-products"></div>
                `;
                editArea.appendChild(orderContainer);
            }

            const orderProducts = orderContainer.querySelector('.order-products');

            const statusOptions = ['order placed', 'preparing', 'shipped', 'delivered'];
            const statusSelect = document.createElement('select');
            statusSelect.classList.add('status-select');
            statusOptions.forEach((status) => {
                const option = document.createElement('option');
                option.value = status;
                option.textContent = status;
                if (status === data.status) {
                    option.selected = true; // Set the default value
                }
                statusSelect.appendChild(option);
            });

            orderContainer.appendChild(statusSelect);

            statusSelect.addEventListener('change', async function(){
                const status = this.value;
                console.log(data.id)

                const response = await fetch('/minicell/index.php/updateorderstatus',{
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        orderId: data.id,
                        status: status
                    })
                })

                const data1 = await response.json();
            })

            const orderDetailsResponse = await fetch('/minicell/index.php/orderdetails', {
                method: 'POST',
                headers: {
                    'content-type': 'application/json',
                },
                body: JSON.stringify({
                    orderId: data.id,
                }),
            });
            const orderDetailsData = await orderDetailsResponse.json();

            for (const orderDetails of orderDetailsData) {
                const productResponse = await fetch('/minicell/index.php/products', {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json',
                    },
                    body: JSON.stringify({
                        prodId: orderDetails.productId,
                    }),
                });

                const productData = await productResponse.json();

                const productCard = document.createElement('div');
                productCard.classList.add('product-card');

                productCard.innerHTML = `
                    <img src="/minicell/${productData.image}" alt="${productData.name}" class="product-image" />
                    <div class="product-details">
                        <h3>${productData.name}</h3>
                        <p class="prod-desc">${productData.description}</p>
                        <p><strong>Price:</strong>${productData.price}</p>
                    </div>
                `;
                
                orderContainer.appendChild(statusSelect)
                orderProducts.appendChild(productCard);
            }
        }
    })

    vouchersBTN.addEventListener('click', async function(){
        editArea.style.flexDirection = 'row';
        editArea.innerHTML ='';

        editArea.innerHTML = `
            <div id="left-side">
                <div id="create-voucher-div">
                    <h1># Create vouchers</h1>
                    <label>Voucher Code</label>
                    <input type="text" name="voucher-code" id="voucher-code" required>

                    <label>Voucher Name</label>
                    <input type="text" name="voucher-name" id="voucher-name">

                    <label>Voucher Description</label>
                    <input type="text" name="voucher-desc" id="voucher-desc">

                    <label>Voucher Validity</label>
                    <input type="date" name="voucher-valid" id="voucher-valid">

                    <button id="create-voucher">Create</button>
                </div>
            </div>
            <div id="right-side">
            </div>
        `;

        const rightSide = document.querySelector('#right-side');
        const createvoucher = document.querySelector('#create-voucher');

        createvoucher.addEventListener('click', async function(){
            window.alert('HTI')
            const code = document.querySelector('#voucher-code').value;
            const name = document.querySelector('#voucher-name').value;
            const desc = document.querySelector('#voucher-desc').value;
            const valid = document.querySelector('#voucher-valid').value;


            const response = await fetch('/minicell/index.php/createvoucher',{
                method: 'POST',
                headers:{
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                    code: code,
                    name: name,
                    desc, desc,
                    valid: valid
                })
            })

            const responseData = await response.json();
            console.log(responseData);
        })

        const vouchers = await fetchVoucher();
        let voucherHTML = '';
        for (const voucher of vouchers){
            console.log(voucher)
            voucherHTML += `
                <div class="voucher" id="${voucher.id}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M18 18.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5m1.5-9l1.96 2.5H17V9.5m-11 9A1.5 1.5 0 0 1 4.5 17A1.5 1.5 0 0 1 6 15.5A1.5 1.5 0 0 1 7.5 17A1.5 1.5 0 0 1 6 18.5M20 8h-3V4H3c-1.11 0-2 .89-2 2v11h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h6a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2v-5z"/></svg>
                    <div class="texts">
                        <p class="title"># ${voucher.name}</p>
                        <p>${voucher.description}</p>
                        <p>Valid until: ${voucher.validity}</p>
                    </div>
                </div>
            `;
        }

        rightSide.innerHTML += voucherHTML;

        async function fetchVoucher(){
            const response = await fetch('/minicell/index.php/fetchvoucher');

            const resData = await response.json();

            return resData;
        }
    })

    createBtn.addEventListener('click', function(){
        createForm.reset();
    })

    document.addEventListener('DOMContentLoaded', function() {
        var result = <?php echo json_encode($this->result); ?>;

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