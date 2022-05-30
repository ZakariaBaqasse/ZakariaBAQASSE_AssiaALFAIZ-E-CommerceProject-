"use strict";
const itemCount = document.getElementById("numItems");
const price = document.getElementById("totalPrice");
window.addEventListener("DOMContentLoaded", function() {
    fetch("./AJAXResponses/cartItemCount.php")
        .then((response) => {
            if (response.ok) {
                return response.json();
            } else console.log("Network error: ");
        })
        .then((data) => {
            showItemCount(data);
        })
        .catch((err) => {
            console.log("error");
        });

    fetch("./AJAXResponses/cartItemPrice.php")
        .then((response) => {
            if (response.ok) return response.json();
            else console.log("Network error");
        })
        .then((data) => {
            console.log(data);
            showItemPrice(data);
        })
        .catch((err) => {
            console.log("error");
        });
});

function showItemCount(numItems) {
    if (numItems.length > 0) {
        [itemCount.innerHTML] = numItems;
    }
}

function showItemPrice(result) {
    if (result.length > 0) {
        price.innerHTML = result[0] + " MAD";
    }
}