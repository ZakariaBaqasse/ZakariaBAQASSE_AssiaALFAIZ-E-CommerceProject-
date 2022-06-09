"use strict;";
let total = document.getElementById("total").textContent;
const madToUsd = 0.1;
total *= madToUsd;
amountToPay = Math.round(total);

paypal
    .Buttons({
        style: {
            color: "blue",
            shape: "pill",
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: amountToPay,
                    },
                }, ],
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                window.location.replace(
                    "http://localhost/E-CommerceProject/paypalPaymentStates/ApprovePayment.php"
                );
            });
        },
        onCancel: function(data) {
            window.location.replace(
                "http://localhost/E-CommerceProject/paypalPaymentStates/CancelPayment.php"
            );
        },
    })
    .render("#paypal-button");