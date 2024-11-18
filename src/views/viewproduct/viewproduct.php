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
                        <a href='/minicell/index.php/cart'>
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <a href='/minicell/index.php/faqs'>
                            <i class="fa-solid fa-question" id="question-mark"></i>
                        </a>
                    </div>
                </nav>
            </header>
            <main id="main">
                <section id="product-page" class="product-page">
                    <p class="product-header"># Product Infomation</>
                    <div id="product-display-area"></div>
                    <div class="backBtns">
                        <a href='/minicell/index.php/homepage'>
                            <i class="fa-solid fa-arrow-left"></i>
                            <p>Back to Main Page</p>
                        </a>
                        <a id="view-next" href=''>
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
        
        const viewNext = document.querySelector('#view-next');

        viewNext.addEventListener('click', function(event){
            event.preventDefault();
            const currentUrl = window.location.href;

            const pattern = /\/minicell\/index\.php\/homepage\/(\w+)/;
            const match = currentUrl.match(pattern);

            const pattern2 = /product_(\d+)/
            const match2 = match[1].match(pattern2);

            const numId = parseInt(match2[1]);
            const nextId = numId + 1;
            
            window.location.href = `/minicell/index.php/homepage/product_${nextId}`;

        })
        document.addEventListener('DOMContentLoaded', function(){
            let prod = <?php echo json_encode($product); ?>;
            const user = <?php echo json_encode($_SESSION['user']); ?>;
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
                                <div class="radio-group">
                                    <input type="radio" id="option-one" name="selector" value="small">
                                    <label for="option-one">Small</label>
                                    <input type="radio" id="option-two" name="selector" value="medium">
                                    <label for="option-two">Medium</label>
                                    <input type="radio" id="option-three" name="selector" value="large">
                                    <label for="option-three">Large</label>
                                </div>
                        </div>
                        <div class="buttons-action">
                            <a id="add" class="${prod.id}">Add to my Cart</a>
                            <a id="buy" class="${prod.id}">Buy Now</a>
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                </div>
            `;
            const addToCart = document.querySelector('#add');
            addToCart.addEventListener('click', function(){
                const selectedSize = document.querySelector('input[name="selector"]:checked');
                const size = selectedSize.value;
                console.log(size)
                fetch(`/minicell/index.php/addtocart`,{
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body:JSON.stringify({
                        prodId: addToCart.className,
                        userId: user.id,
                        size: size,
                        quantity: 1
                    })
                })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data)
                    })
            })

        });

        
    </script>
</html>