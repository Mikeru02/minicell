<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Minicell Apparel</title>

        <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/icon_type" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="../src/views/homepage/styles/style.css" />
        <link rel="stylesheet" href="../src/views/homepage/styles/banner.css" />
        <link rel="stylesheet" href="../src/views/homepage/styles/header.css" />

        <!-- Fonts -->
        <link href="https://fonts.cdnfonts.com/css/aclonica" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/spinnaker" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/dela-gothic-one" rel="stylesheet">

    </head>
    <body>
        <div class="responsive-container">
            <header>
                <a href="/minicell/index.php">
                    <img src="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png">
                </a>
                <nav>
                    <div class="search-bar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <p id="search">Search</p>
                    </div>
                    <div class="buttons">
                        <a href="">
                            <i class="fa-solid fa-user" id="btn"></i>
                        </a>
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </nav>
            </header>
            <main>
                <section class="landing-page">
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
                                <a href="">
                                <button id="explore-now">
                                    <p>Explore Now</p>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="product-page" class="product-page">
                    <h2 id='h2-title'># Available Products</h2>
                    <div class='navigation'>
                        <form action="/minicell/index.php/homepage" method='GET'>
                            <input class='nav' type="submit" name='category' value='Men'>
                        </form>
                        <form action="">
                            <input class='nav' type="submit" name='category' value='Women'>
                        </form>
                        <form action="">
                            <input class='nav' type="submit" name='category' value='Teens'>
                        </form>
                        <form action="">
                            <input class='nav' type="submit" name='category' value='Kids'>
                        </form>
                    </div>
                    <div id="product-display-area">

                    </div>
                </section>
            </main>
            <footer>

            </footer>
        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var result = <?php echo json_encode($result);?>;
            console.log(result);

            const displayArea = document.getElementById('product-display-area');

            if (result){
                for (let i = 0; i < result.length; i++){
                    let product = result[i];

                    const productContainer = document.createElement('div');
                    productContainer.setAttribute('class', 'product-container');

                    const image = document.createElement('img');
                    image.setAttribute('id', 'product-image');
                    image.src = `../${product.image}`;

                    const name = document.createElement('p');
                    name.setAttribute('id', 'product-name');
                    name.innerHTML = `# ${product.name}`;
                    
                    const desc = document.createElement('p');
                    desc.setAttribute('id', 'product-desc');
                    desc.innerHTML = product.description;

                    const price = document.createElement('p');
                    price.setAttribute('id', 'product-price');
                    price.innerHTML = `${product.price} PHP`;

                    productContainer.appendChild(image);
                    productContainer.appendChild(name);
                    productContainer.appendChild(desc);
                    productContainer.appendChild(price);

                    displayArea.appendChild(productContainer);
                }
            }
        });
    </script>
</html>