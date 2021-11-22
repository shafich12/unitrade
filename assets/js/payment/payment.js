var paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener('submit', payWithPaystack, false);



function payWithPaystack() {
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var phone = document.getElementById('phone').value;
    var street = document.getElementById('street').value;
    var town = document.getElementById('town').value;
    var state = document.getElementById('state').value;
    var email_address = document.getElementById('email').value;

    if(fname.length === 0 || lname.length === 0 || phone.length === 0 || street.length === 0 || town.length === 0 || state.length === 0 || email_address === 0){
        alert("Please fill all fields");
        return;
    }




    var handler = PaystackPop.setup({
        key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
        email: email_address,
        amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
        currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
        ref: document.getElementById('ref').value,
        callback: function (response) {
            //this happens after the payment is completed successfully
            // alert();
            window.location.href = `../actions/process_payment.php?status=success&reference=${response.reference}&currency=GHS&fname=${fname}&lname=${lname}&phone=${phone}&email=${email_address}&street=${street}&town=${town}&state=${state}`;
            // Make an AJAX call to your server with the reference to verify the transaction
        },
        onClose: function () {
            alert('Transaction was not completed, window closed.');
            window.location.href = '../view/payment_failed.php';
        },
    });
    handler.openIframe();
}
