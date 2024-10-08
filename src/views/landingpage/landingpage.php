<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Minicell Apparel</title>

        <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/icon_type" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="src/views/landingpage/styles/style.css" />
        <link rel="stylesheet" href="src/views/landingpage/styles/header_style.css" />
        <link rel="stylesheet" href="src/views/landingpage/styles/landing.css" />
        <link rel="stylesheet" href="src/views/landingpage/styles/product_style.css" />

        <!-- Fonts -->
        <link href="https://fonts.cdnfonts.com/css/kulim-park" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/aclonica" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/spinnaker" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/br-cobane" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/chivo-mono" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/dela-gothic-one" rel="stylesheet">

    </head>
    <body>
        <div class="responsive-container">
            <header>
                <a href="/minicell/">
                    <img src="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png">
                </a>
                <nav>
                    <div class="search-bar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <p id="search">Search</p>
                    </div>
                    <div class="buttons">
                        <a href="/minicell/index.php/signUp">
                            <i class="fa-solid fa-user" id="btn"></i>
                        </a>
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </nav>
            </header>
            <main>
                <section class="landing-page">
                    <div class="image-buttons">
                        <div class="kids-image">
                            <p>#KIDS</p>
                            <p>LINE</p>
                        </div>
                        <div class="mens-image">
                            <p>#MEN</p>
                            <p>LINE</p>
                        </div>
                    </div>
                    <div class="welcome-text">
                        <div class="upper">
                            <div class="welcome-header">
                                <h1># STYLISH</h1>
                                <h1>WHITE-TEES</h1>
                            </div>
                            <div class="description">
                                <p>Level up your white-tees with us!</p>
                                <p>Wear your usual with a style!</p>
                            </div>
                            <div class="explore-buttons">
                                <button id="add-cart">
                                    <p>Add to my Cart</p>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                                <a href="#product-page">
                                <button id="explore-now">
                                    <p>Explore Now</p>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                                </a>
                                
                            </div>
                        </div>
                        <div class="lower">
                            <div class="lower-header">
                                <div class="arrow-header">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <h1>For <span>EVERYONE</span></h1>
                                </div>
                                <h1>But <span>NOTANYONE</span></h1>
                                <div class="description2">
                                    <p>Shop With Us!</p>
                                    <p>Shop just like Extraordinary</p>
                                </div>
                            </div>
                            <div class="login-buttons">
                                <a href="/minicell/index.php/login">
                                    <button id="login">
                                        <p>Log In Account</p>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </a>
                                <a href="/minicell/index.php/signUp">
                                    <button id="sign-up">
                                        <p>Sign Up for Free</p>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="product-page" class="product-page">
                    <header class="prod-header"># New Arrivals</header>
                    <div id="product-container">
                    </div>
                </section>
            </main>
            <footer>

            </footer>
        </div>
    </body>
    <script>
        var products = <?php echo json_encode($products); ?>;

        console.log(products);

        const productContainer = document.getElementById('product-container');

        for (let i = products.length - 1; i >= 0; i--) {
            if (productContainer.children.length === 4) {
                break;
            }
            const prodImage = products[i].image;
            const prodName = products[i].name;
            console.log(products[i].name);
            const prodDesc = products[i].description;
            const prodPrice = products[i].price;

            const individualContainer = document.createElement('div');
            const prodImageEl = document.createElement('img');
            const prodNameEl = document.createElement('p');
            const prodDescEl = document.createElement('p');
            const prodPriceEl = document.createElement('p');

            individualContainer.setAttribute('id', 'product');
            prodImageEl.setAttribute('id', 'product-image');
            prodNameEl.setAttribute('id', 'product-name');
            prodDescEl.setAttribute('id', 'product-desc');
            prodPriceEl.setAttribute('id', 'product-price');

            prodImageEl.src = prodImage;
            prodNameEl.innerHTML = "# " + prodName;
            prodDescEl.innerHTML = prodDesc;
            prodPriceEl.innerHTML = prodPrice + " PHP";

            individualContainer.appendChild(prodImageEl);
            individualContainer.appendChild(prodNameEl);
            individualContainer.appendChild(prodDescEl);
            individualContainer.appendChild(prodPriceEl);

            productContainer.appendChild(individualContainer);
        }
        


    </script>
</html>