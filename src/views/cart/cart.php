<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Minicell Apparel</title>

        <link rel="icon" href="https://res.cloudinary.com/dzmhkee5i/image/upload/v1726044546/minicell/cvbz1wok7xzzwydkpklj.png" type="image/icon_type" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="/minicell/src/views/cart/styles/style.css" />
        <link rel="stylesheet" href="/minicell/src/views/cart/styles/header.css" />

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
                <h1># Your Shopping Cart</h1>
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
                <section id="product-page" class="product-page">
                    <div class="header">
                        <p>Products</p>
                        <div class="tired">
                            <p class="qty">Quantity</p>
                            <p class="sz">Size</p>
                            <p class="prc">Price</p>
                            <p class="act">Action</p>
                        </div>

                    </div>
                    <div id="product-area"></div>
                    <div class="backBtns">
                        <a href='/minicell/index.php/homepage'>
                            <i class="fa-solid fa-arrow-left"></i>
                            <p>Back to Main Page</p>
                        </a>
                        <a id="proceed-checkout" href=''>
                            <p>Proceed Chechout</p>
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
        const products = <?php echo json_encode($products); ?>;
        const container = document.querySelector('#product-area');
        let prodHTML = '';
        async function fetchProd(products){
            for (const product of products){
                await fetch('/minicell/index.php/products',{
                    method: 'POST',
                    headers:{
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        prodId: product[1]
                    })
                })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data)
                        console.log("PRODUCT", product)
                        prodHTML += `
                            <div class="prod">
                                <input type="checkbox" id="${data.id}" class="prod-checkbox">
                                <img src="/minicell/${data.image}" class="prod-image" />
                                <p class="prod-name"># ${data.name}</p>
                                <input type="number" value="${product[3]}" class="prod-quantity">
                                <p class="prod-size">${product[2]}</p>
                                <p class="prod-price">₱${data.price}.00</p>
                                <i class="fa-solid fa-trash-can" id="${data.id}"></i>
                            </div>
                        `;

                        const trashcans = document.querySelectorAll('.fa-trash-can');
                    })
            }
            container.innerHTML += prodHTML;
        }

        async function delete(btns){
            btns.forEach(deletebtn => {
                deletebtn.addEventListener('click', function(){
                    
                })
            })
        }

        fetchProd(products);

    </script>
</html>