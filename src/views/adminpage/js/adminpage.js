const manageProduct = document.getElementById('manage-products');
const voucher = document.getElementById('vouchers');
const contentArea = document.getElementById('content-area');

manageProduct.addEventListener('click', function(){
    contentArea.innerHTML = `
        <div class='header-div'>
            <div class='search-bar'>
                <i class="fa-solid fa-magnifying-glass"></i>
                <p id="search">Search</p>
            </div>
            <button id='search-btn'>Search</button>
            <button id='create'>Create New Product</button>
        </div>
        <div id='display-area'>

        </div>
    `;
    contentArea.style.justifyContent = 'flex-start';

    const createProdBtn = document.getElementById('create');
    const displayArea = document.getElementById('display-area');

    createProdBtn.addEventListener('click', function(){
        displayArea.innerHTML = `
        <p>Product Information</p>
        <form id='create-product-form' action='' method='' enctype='multipart/form-data'>
            <div id='content-fields'>
                <p>Image</p>
                <p>Name</p>
                <p>Decription</p>
                <p>Price</p>
                <p>Sizes</p>
            </div>
            <div id='input-fields'>
                <input type="file" accept="image/*" id="img" name="img" />
                <input type="text" id="name" name="name" />
                <input type="text" id="desc" name="desc" />
                <input type="text" id="price" name="price" />
                <input type="text" id="status" name="status" />
            </div>
            
        </form>
        `;
    })
})

