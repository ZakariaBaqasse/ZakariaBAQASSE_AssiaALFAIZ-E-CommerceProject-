"use strict";
const gender = document.getElementById("category_gender");
const category = document.getElementById("category_select");
gender.addEventListener("change", getGender);

function getGender() {
    if (gender.value === "") {
        html = "<span>Please select a gender</span>";
        category.insertAdjacentHTML("afterbegin", html);
    } else {
        fetch(`../AJAXResponses/categoryResponse.php?gender=${gender.value}`)
            .then((response) => {
                if (response.ok) {
                    return response.json();
                } else console.log("Mauvaise reponse du reseau");
            })
            .then((data) => {
                console.log(data);
                showCategory(data);
            });
        /*.catch((error) => {
                                                                                    console.log("error");
                                                                                })*/
    }
}

function showCategory(categories) {
    let ch = "";
    category.innerHTML = "";
    //console.log(category);
    if (categories.length > 0) {
        for (let i = 0; i < categories.length; i++) {
            category.insertAdjacentHTML(
                "beforeend",
                `<option value="${categories[i][0]}">${categories[i][1]}</option>`
            );
        }
    }
}