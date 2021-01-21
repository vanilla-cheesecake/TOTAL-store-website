
let carts = document.querySelectorAll(".add-cart");

let products = [
    {
        name: "Lithium cordless drill 20v box",
        tag: "lithium",
        price: 7960,
        inCart: 0
    },
    {
        name: "Circular saw 1600W",
        tag: "circular",
        price: 6560,
        inCart: 0
    },
    {
        name: "Aspirator blower 800w",
        tag: "aspirator",
        price: 1800,
        inCart: 0
    },
    {
        name: "High pressure washer 1400W",
        tag: "highpressure",
        price: 8360,
        inCart: 0
    },
    {
        name: "Rotary hammer 1050w",
        tag: "rotary",
        price: 6560,
        inCart: 0
    },
    {
        name: "Demolition breaker 1300w",
        tag: "demolition",
        price: 12000,
        inCart: 0
    },
    {
        name: "Circular saw 2200w",
        tag: "",
        price: 5760,
        inCart: 0
    },
    {
        name: "Finishing sander 350w",
        tag: "",
        price: 5560,
        inCart: 0
    },
]


for (let i = 0; i < carts.length; i++){
    carts[i].addEventListener('click', () => {
        cartNumbers(products[i]);
        totalCost(products[i]);
    })
}

var x = document.getElementById('search')


function cartNumbers(product){
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    

    if (productNumbers){

        Swal.fire({
            position: 'center',
            icon: 'success',
            iconColor: '#0d6c70',
            title: 'Added to your cart!',
            showConfirmButton: true,
            confirmButtonColor: '#0d6c70'
          })
   
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.querySelector('.search span').textContent = productNumbers + 1;
    } else{
        Swal.fire({
            position: 'center',
            icon: 'success',
            iconColor: '#0d6c70',
            title: 'Added to your cart!',
            showConfirmButton: true,
            confirmButtonColor: '#0d6c70'
          })
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.search span').textContent = 1;
 
    }

    setItems(product);
}

function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');
    
    if (productNumbers){
        document.querySelector('.search span').textContent = productNumbers;
    }
}

function setItems(product){
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if(cartItems != null){
        if(cartItems[product.tag] == undefined){
            cartItems = {
                ...cartItems,
                [product.tag]: product
            }
        }
        cartItems[product.tag].inCart += 1;
    } else{
        product.inCart = 1;
        cartItems = {
            [product.tag]: product
        }
    }

    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(product){
    let cartCost = localStorage.getItem('totalCost');

    if(cartCost != null){
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.price);
    } else{
        localStorage.setItem("totalCost", product.price);
    }
}

function displayCart(){
    let cartItems = localStorage.getItem("productsInCart");
    let cartCost = localStorage.getItem('totalCost');
    cartItems = JSON.parse(cartItems)
    let productContainer = document.querySelector(".products");


    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
        minimumFractionDigits: 2
      })
      
      formatter.format(1000) // "$1,000.00"
      formatter.format(10) // "$10.00"
      formatter.format(123233000) // "$123,233,000.00"




    if(cartItems && productContainer ){
        productContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
            productContainer.innerHTML += `
                <div class="product">
                <div id="name"><i class="fas fa-trash"><a href="#"></a></i><span>${item.name}</span></div>
                </div>
                <div class="price" id="price">${formatter.format(item.price)}</div>
                <div class="quantity" id="quantity">${item.inCart}</div>
                <div class="total" id="total">${formatter.format(item.inCart * item.price)}</div><br>
                </div>
                <br>
            ` ;      
        });

        productContainer.innerHTML += `
               
                    <h4 class="basketTotal">
                    <i class="fas fa-shopping-cart"></i> Basket Total ${formatter.format(cartCost)}
                    </h4>
                    <br>
                    <br>
                    <br>

        `;
    }

}


onLoadCartNumbers();
displayCart();