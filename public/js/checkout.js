let mainImg = document.getElementById('mainImg');
let  smallImg = document.getElementsByClassName('small-img');

let smallImg1 = smallImg[0];
let smallImg2 = smallImg[1];
let smallImg3 = smallImg[2];
let smallImg4 = smallImg[3];
let ordered = "";
let CartLink = document.getElementsByClassName('addCart');
let productItem = document.getElementsByClassName('productId');
let productSizeSelect = document.getElementById('select');
let productQ = document.getElementById('qte');
let btnAddCart = document.getElementsByClassName('btnAddCart');

btnAddCart.item(0).addEventListener("click",()=>{
    CartLink.item(0).classList.remove("d-none")
    let productID = productItem.item(0).textContent;
    let productSize = productSizeSelect.item(0).textContent;
    let productQTY = productQ.value;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", '/add-to-cart', true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            $('#myModal').modal('hide');
        }
    }
    xhr.send("shoeId=" + productID +
        "&qte=" + productQTY +
        "&size=" + productSize
    );

})
smallImg1.addEventListener("click",()=>{
mainImg.src =smallImg1.src
})
    smallImg2.addEventListener("click",()=>{
    mainImg.src =smallImg2.src
})
    smallImg3.addEventListener("click",()=>{
    mainImg.src =smallImg3.src
})
    smallImg4.addEventListener("click",()=>{
    mainImg.src =smallImg4.src
})