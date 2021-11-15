let btnCheck = document.getElementById('btnBuy');
let spinerBtnBuy = document.getElementsByClassName('spinerBtnBuy');
let txtBtnBuy = document.getElementsByClassName('txtBtnBuy');
let modal = document.getElementById('myModal');

btnCheck.addEventListener("click",()=>{
    btnCheck.disabled = true
    txtBtnBuy.item(0).classList.add('d-none')
    spinerBtnBuy.item(0).classList.remove('d-none')

    $(document).ready(function(){
        wait(5000);
        $("#myModal").modal();
    });
/*    let xhr = new XMLHttpRequest();
    xhr.open("POST", '/checkout', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        modal.modal('show');
        alert("payement effectuer avec succes");
        window.onload = function() {
            location.href = "https://www.javascripttutorial.net/";
        }
    }
    xhr.send("shoeId=hhr");
    */
})