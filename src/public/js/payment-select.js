// ラジオボタンの要素を取得
var paymentRadios = document.querySelectorAll('input[name="payment_type"]');
// フォーム内の隠しフィールドの要素を取得
var paymentTypeInput = document.getElementById("paymentType");
// 支払い方法を表示する要素を取得
var selectedPaymentElement = document.querySelector("#selectedPaymentType");
// エラーメッセージを表示する要素を取得
var errorMessageElement = document.querySelector("#errorMessage");

var purchaseButton = document.querySelector(".form__button");
var disabledButton = document.querySelector(".button-style--disabled");

// ラジオボタンが変更された時の処理
function handlePaymentChange(event) {
    // 選択された支払い方法の値を取得
    var selectedPayment = event.target.value;

    // 選択された支払い方法を表示する
    var paymentText;
    switch (selectedPayment) {
        case "1":
            paymentText = "クレジットカード";
            purchaseButton.onclick = openStripeCheckout; // クレジットカードが選択されたらStripeを起動する
            purchaseButton.type = "button"; // クレジットカードが選択された場合は購入ボタンのtype属性を "button" にする
            break;
        case "2":
            paymentText = "コンビニ";
            purchaseButton.onclick = null; // コンビニや銀行振込が選択されたらStripeを起動しない
            purchaseButton.type = "submit"; // コンビニや銀行振込が選択された場合も購入ボタンのtype属性を "submit" にする
            break;
        case "3":
            paymentText = "銀行振込";
            purchaseButton.onclick = null; // コンビニや銀行振込が選択されたらStripeを起動しない
            purchaseButton.type = "submit"; // コンビニや銀行振込が選択された場合も購入ボタンのtype属性を "submit" にする
            break;
        default:
            paymentText = "選択してください";
            selectedPayment = "";
            purchaseButton.onclick = null; // 支払い方法が未選択の場合もStripeを起動しない
            purchaseButton.type = "submit"; // 支払い方法が未選択の場合も購入ボタンのtype属性を "submit" にする
    }
    selectedPaymentElement.textContent = paymentText;
    // 選択された支払い方法を隠しフィールドに設定
    paymentTypeInput.value = selectedPayment;

    // 選択された支払い方法に応じてエラーメッセージの表示/非表示を設定する
    if (selectedPayment === "") {
        selectedPaymentElement.classList.add("error-message");
        errorMessageElement.style.display = "block"; // エラーメッセージを表示
        purchaseButton.disabled = true; // ボタンを無効化
    } else {
        selectedPaymentElement.classList.remove("error-message");
        errorMessageElement.style.display = "none"; // エラーメッセージを非表示
        purchaseButton.disabled = false; // ボタンを有効化
    }
}

// ラジオボタンにイベントリスナーを追加
paymentRadios.forEach(function (radio) {
    radio.addEventListener("change", handlePaymentChange);
});

// メニューの開閉をトグルする処理を追加
const menu = document.getElementsByClassName("menu");
for (let i = 0; i < menu.length; i++) {
    menu[i].addEventListener("click", toggle);
}
function toggle() {
    const content = this.nextElementSibling;
    content.classList.toggle("is-open");
}
