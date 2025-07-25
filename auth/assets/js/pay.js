const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_619ed7786973d8623d349bd6689e62af1f3d39a0', // Replace with your public key
    email: document.getElementById('email-address').value,
    firstname: document.getElementById('first-name').value,
    lastname: document.getElementById('last-name').value,
    amount: document.getElementById('amount').value * 100,
    currency: 'NGN',
    ref: 'REF_'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      window.location = "https://247snooker.com.ng/auth/verify_transaction?reference=" + response.reference;
    }
  });
  handler.openIframe();
}