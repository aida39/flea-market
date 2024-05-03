function openStripeCheckout() {
    var amount = document.getElementById("amount").value;

    var handler = StripeCheckout.configure({
        key: stripeKey,
        image: "https://stripe.com/img/documentation/checkout/marketplace.png",
        locale: "auto",
        currency: "JPY",
        name: "Stripe決済デモ",
        description: "これはデモ決済です",
        token: function (token) {
            var form = document.getElementById("purchaseForm");
            var hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", "stripeToken");
            hiddenInput.setAttribute("value", token.id);
            form.appendChild(hiddenInput);

            form.submit();
        },
    });

    handler.open({
        name: "Stripe決済画面（デモ）",
        description: "支払いが完了すると予約が確定します",
        amount: amount,
    });
}
