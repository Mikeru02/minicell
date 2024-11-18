<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Minicell Apparel</title>

        <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/icon_type" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="/minicell/src/views/viewproduct/styles/style.css" />
        <link rel="stylesheet" href="/minicell/src/views/viewproduct/styles/header.css" />

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
                <nav>
                    <div class="buttons">
                        <a href="/minicell/index.php/account">
                            <i class="fa-solid fa-user" id="btn"></i>
                        </a>
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </nav>
            </header>
            <main id="main">
                <section id="product-page" class="product-page">
                    <p class="product-header"># Product Infomation</>
                    <div id="product-display-area"></div>
                    <div class="backBtns">
                        <a>
                            <i class="fa-solid fa-arrow-left"></i>
                            <p>Back to Main Page</p>
                        </a>
                        <a>
                            <p>View Next Product</p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </section>
            </main>
            <footer>

            </footer>
        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            let prod = <?php echo json_encode($product); ?>;
            console.log(prod)
            const displayArea = document.getElementById('product-display-area');
            
            displayArea.innerHTML = `
                <div class="product-container" id="${prod.id}">
                    <div class="images">
                        <img src="/minicell/${prod.image}" id="product-image"/>
                        <div id="">
                            <img src="/minicell/${prod.support1}" class="support-image"/>
                            <img src="/minicell/${prod.support2}" class="support-image"/>
                            <img src="/minicell/${prod.support3}" class="support-image"/>
                        </div>
                    </div>
                    <div id="text">
                        <p id="product-name"># ${prod.name}</p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p id="product-price">${prod.price} PHP</p>
                        <p id="product-desc">${prod.description}</p>
                        <p class="size-header">Sizes<p>
                        <div id="sizes">
                            <p class="sizebtn">Small</p>
                            <p class="sizebtn">Medium</p>
                            <p class="sizebtn">Large</p>
                        </div>
                        <div class="buttons-action">
                            <a class="add">Add to my Cart</a>
                            <a class="buy">Buy Now</a>
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                </div>
            `;
        });
    </script>
</html>