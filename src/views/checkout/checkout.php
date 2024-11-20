<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Minicell Apparel</title>

        <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/icon_type" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="/minicell/src/views/checkout/styles/style.css" />
        <link rel="stylesheet" href="/minicell/src/views/checkout/styles/header.css" />

        <!-- Fonts -->
        <link href="https://fonts.cdnfonts.com/css/aclonica" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/spinnaker" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/dela-gothic-one" rel="stylesheet">

    </head>
    <body id="body">
        <div class="responsive-container">
            <header>
                <a href="/minicell/index.php/homepage">
                    <img src="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png">
                </a>
                <h1># Check Out Process</h1>
                <nav>
                    <div class="buttons">
                        <a href="/minicell/index.php/account">
                            <i class="fa-solid fa-user" id="btn"></i>
                        </a>
                        <a href='/minicell/index.php/faqs'>
                            <i class="fa-solid fa-question" id="question-mark"></i>
                        </a>
                    </div>
                </nav>
            </header>
            <main id="main">
                <section id="checkout-page" class="checkout-page">
                    <div class="progress">
                        <div>
                            <i class="fa-solid fa-circle"></i>
                            <p>Product Information</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-arrow-left-long"></i>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </div>
                        <div>
                        <i class="fa-regular fa-circle"></i>
                            <p>Payment Details</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-arrow-left-long"></i>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </div>
                        <div>
                            <i class="fa-regular fa-circle"></i>
                            <p>Order Complete</p>
                        </div>
                    </div>
                    <div>
                        <h1>Order Summary</h1>
                        <p class="desc">Check your item and select your shipping address for better experience order item.</p>
                    </div>
                    <div id="products-area">
                        <div class="header"></div>
                        <div class="main-area"></div>
                    </div>
                    <div>
                        <div class="subtl">
                            <p>Subtotal</p>
                            <p id="subtotal"></p>
                        </div>
                        <div class="backBtns">
                        <a id="backhome" href='/minicell/index.php/homepage'>
                            <i class="fa-solid fa-arrow-left"></i>
                            <p>Back to Main Page</p>
                        </a>
                        <a id="proceed-checkout" href='/minicell/index.php/payment'>
                            <p>Proceed Chechout</p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    </div>
                </section>
            </main>
            <footer>
                
            </footer>
        </div>
    </body>
    <script>
        let products = <?php echo json_encode($_SESSION['products']); ?>;
        const backhome = document.querySelector('#backhome');
        let container = document.querySelector('.main-area');
        let subtotalArea = document.querySelector('#subtotal');
        let prodHTML= '';

        // backhome.addEventListener('click', async function(){
        //     for (const product of products){
        //         const res = await fetch('/minicell/index.php/removetocart',{
        //             method: 'POST',
        //             headers: {
        //                 'content-type': 'application/json'
        //             },
        //             body: JSON.stringify({
        //                 cartId: product
        //             })
        //         })
        //     }

        //     const reset = await fetch('/minicell/index.php/resetsession');

        //     const test = await fetch('/minicell/index.php/test');

        //     const data = await test.json();
        //     console.log("DEBUG", data)

        //     window.location.href = '/minicell/index.php/homepage';
        // })

        async function displayProds(products) {
            let subtotal = 0;

            for (const product of products) {
                const cartResponse = await fetch('/minicell/index.php/getcart', {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        cartId: product
                    })
                });
                const cartData = await cartResponse.json();
                console.log(cartData)
                const prodId = cartData[0][2];
                console.log("DEBUG:", cartData[0][4])

                const productResponse = await fetch('/minicell/index.php/products', {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        prodId: prodId
                    })
                });
                const productData = await productResponse.json();
                console.log(productData);

                const prodPrice = parseInt(productData.price);
                const qty = parseInt(cartData[0][4])
                let gross = prodPrice * qty;
                console.log(qty);
                subtotal += gross;

                container.innerHTML += `
                    <div class="products">
                        <img src="/minicell/${productData.image}" class="prod-image" />
                        <p class="prod-name"># ${productData.name}</p>
                        <p class="prod-size">${cartData[0][3]}</p>
                        <p class="prod-qty">x${cartData[0][4]}</p>
                        <p class="prod-price">₱${productData.price}.00</p>
                    </div>
                `;
            }
            subtotalArea.innerHTML = `₱ ${subtotal}.00`;
            
        }

        displayProds(products);
    </script>
</html>