<style>
    
button {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
/*div {*/
  /*border-radius: 5px;*/
  /*background-color: #f2f2f2;*/
  /*padding: 20px;*/
/*}*/
</style>
<div style="  border-radius: 5px;
  background-color: #f2f2f2;padding: 20px;">
    <h1>Amount : <?= $amount/100 ?>.00</h2>
    <button id="rzp-button1">Pay <?= $amount/100 ?>.00</button>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    
    var options = {
    "key": "<?= $key_id ?>",
    "amount": "<?= intval($amount) ?>",
    "currency": "INR",
    "name": "Hak Collections",
    "description": "<?= $receipt ?>",
    "image": "<?= $image ?>",
    "order_id": "<?= $id ?>",
    "callback_url": "<?= $return_url ?>",
    "redirect": true,
    "prefill": {
        "name": "<?= $customerName ?>",
        "email": "<?= $customerEmail ?>",
        "contact": "<?= $customerPhone ?>"
    },
    "notes": {
        "address": "Temple Road, Chalad, Kannur, 670014."
    },
    "theme": {
        "color": "#3399cc"
    },
    "modal": {
        "ondismiss": function() {
            window.location.href = "https://hakcollections.com/";
        }
    }
};

    var rzp1 = new Razorpay(options);
    window.onload = function(e){
        rzp1.open();
        e.preventDefault();
    }
    
    
    // document.getElementById('rzp-button1').onclick = function(e){
    //     rzp1.open();
    //     e.preventDefault();
    // }
</script>