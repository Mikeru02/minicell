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
                            <i class="fa-solid fa-circle"></i>
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
                    <div class="center">
                        <div class="left-side">
                            <div>
                                <h1>Order Summary</h1>
                                <p class="desc">Check your item and select your shipping address for better experience order item.</p>
                            </div>
                            <div id="products-area">
                                <div class="header"></div>
                                <div class="main-area"></div>
                            </div>
                            <div class="subtl">
                                <p>Subtotal</p>
                                <p id="subtotal"></p>
                            </div>
                            <div class="shipping">
                                <p>Shipping Fee</p>
                                <p class="shipfee">₱50.00</p>
                            </div>
                            <div class="total">
                                <p>Total</p>
                                <p id="total"></p>
                            </div>
                        </div>
                        <div class="right-side">
                            <div>
                                <h1>Payment Details</h1>
                                <p class="desc">Complete your purchase item by providing your payment details.</p>
                            </div>
                            <div class="inputs">
                                <label for="email_adress" class="strong" >Email Address</label>
                                <input type="email" name="email_address" placeholder="Email Address" id="email" required>

                                <label for="payment" class="strong">Payment Options</label>
                                <select name="payment" id="payment">
                                    <option value="cash_on_delivery">Cash On Delivery</option>
                                    <option value="gcash">GCash</option>
                                    <option value="debit">Debit / Credit</option>
                                </select>
                                
                                <span>
                                    <input type="checkbox" name="default" id="checkbox">
                                    <label for="default">Use default</label>
                                </span>
                                

                                <label class="strong">Shipping Address</label>
                                <label for="house_num">House Number</label>
                                <input type="text" name="house_num" id="house" placeholder="House Number" required>
                                <label for="street">Street</label>
                                <input type="text" name="street" id="street" placeholder="Street" required>
                                <label for="brgy">Barangay</label>
                                <input type="text" name="brgy" id="brgy" placeholder="Barangay" required>
                                <label for="municipality">Municipality / City</label>
                                <input type="text" name="municipality" id="city" placeholder="Municipality / City" value="Pandi" required>
                                <label for="prov">Province</label>
                                <input type="text" name="prov" id="prov" placeholder="Province" value="Bulacan" required>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="backBtns">
                            <a href='/minicell/index.php/homepage'>
                                <i class="fa-solid fa-arrow-left"></i>
                                <p>Back to Main Page</p>
                            </a>
                            <a id="proceed-checkout">
                                <p>Proceed Checkout</p>
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
        let container = document.querySelector('.main-area');
        let subtotalArea = document.querySelector('#subtotal');
        let totalArea = document.querySelector('#total');
        const proceed = document.querySelector('#proceed-checkout');
        const email = document.querySelector('#email');
        const payment = document.querySelector('#payment');
        const house = document.querySelector('#house');
        const street = document.querySelector('#street');
        const brgy = document.querySelector('#brgy');
        const city = document.querySelector('#city');
        const prov = document.querySelector('#prov');
        const subtotal = document.querySelector('#subtotal');
        const total = document.querySelector('#total')

        let prodHTML= '';

        async function displayProds(products) {
            let subtotal = 0;
            let total = 0;

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
                const prodId = cartData[0][2];

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

                const prodPrice = parseInt(productData.price);
                const qty = parseInt(cartData[0][4])
                let gross = prodPrice * qty;
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

            total += subtotal + 50;
            subtotalArea.innerHTML = `₱ ${subtotal}.00`;
            totalArea.innerHTML = `₱ ${total}.00`;
            
        }

        displayProds(products);

        proceed.addEventListener('click', async function(){
            console.log(total.innerHTML)
            const emailval = email.value; 
            const paymentval = payment.value; 
            const houseval = house.value; 
            const streetval = street.value; 
            const brgyval = brgy.value; 
            const cityval = city.value; 
            const provval = prov.value;

            const fulladd = `${houseval} ${streetval} ${brgyval} ${cityval} ${provval}`;
            const response = await fetch('/minicell/index.php/processcheckout',{
                method: 'POST',
                headers:{
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                    email: emailval,
                    paymentOption: paymentval,
                    shippingAddress: fulladd,
                    subtotal: total.innerHTML
                })
            })

            // const data = await response.json();
            window.location.href = '/minicell/index.php/checkoutsuccess';
        })
    </script>
</html>