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
            <button>Search</button>
            <button>Create New Product</button>
        </div>
        <div class='content-fields'>
            <p>Name</p>
            <p>Stocks</p>
            <p>Price</p>
            <p>Sizes</p>
        </div>
        <div id='display-area'></div>
    `;
    // const headerDiv = document.createElement('div');

    // const searchBar = document.createElement('div');
    // const searchImg = document.createElement('i');
    // const searchInput= document.createElement('input');
    // const searchBtn = document.createElement('button');

    // const createBtn = document.createElement('button');

    // const searchForm = document.createElement('form');
    // const createForm = document.createElement('form');


})