<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>ORDER</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./web/modern-normalize.css">
  <link rel="stylesheet" href="./web/web-base.css">
  <link rel="stylesheet" href="./invoice.css">
  <script type="text/javascript" src="./web/scripts.js"></script>
</head>
<body>
<style>
    
body {
  font-size: 16px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table tr td {
  padding: 0;
}

table tr td:last-child {
  text-align: right;
}

.bold {
  font-weight: bold;
}

.right {
  text-align: right;
}

.large {
  font-size: 1.75em;
}

.total {
  font-weight: bold;
  color: #fb7578;
}

.logo-container {
  margin: 20px 0 70px 0;
}

.invoice-info-container {
  font-size: 0.875em;
}
.invoice-info-container td {
  padding: 4px 0;
}

.client-name {
  font-size: 1.5em;
  vertical-align: top;
}

.line-items-container {
  margin: 70px 0;
  font-size: 0.875em;
}

.line-items-container th {
  text-align: left;
  color: #999;
  border-bottom: 2px solid #ddd;
  padding: 10px 0 15px 0;
  font-size: 0.75em;
  text-transform: uppercase;
}

.line-items-container th:last-child {
  text-align: right;
}

.line-items-container td {
  padding: 15px 0;
}

.line-items-container tbody tr:first-child td {
  padding-top: 25px;
}

.line-items-container.has-bottom-border tbody tr:last-child td {
  padding-bottom: 25px;
  border-bottom: 2px solid #ddd;
}

.line-items-container.has-bottom-border {
  margin-bottom: 0;
}

.line-items-container th.heading-quantity {
  width: 50px;
}
.line-items-container th.heading-price {
  text-align: right;
  width: 100px;
}
.line-items-container th.heading-subtotal {
  width: 100px;
}

.payment-info {
  width: 38%;
  font-size: 0.75em;
  line-height: 1.5;
}

.footer {
  margin-top: 100px;
}

.footer-thanks {
  font-size: 1.125em;
}

.footer-thanks img {
  display: inline-block;
  position: relative;
  top: 1px;
  width: 16px;
  margin-right: 4px;
}

.footer-info {
  float: right;
  margin-top: 5px;
  font-size: 0.75em;
  color: #ccc;
}

.footer-info span {
  padding: 0 5px;
  color: black;
}

.footer-info span:last-child {
  padding-right: 0;
}

.page-container {
  display: none;
}

</style>
<div class="web-container">
<div class="page-container">
  Page
  <span class="page"></span>
  of
  <span class="pages"></span>
</div>

<table class="invoice-info-container">
  <tr>
    <td rowspan="2">
      Details
      <br>
       Order No:<?php echo isset($order_list->order_id) ? $order_list->order_id : 'N/A'; ?></strong>
      <br>
       Invoice Date: <strong><?php
if (!empty($order_list->created_at)) {
    echo date('F d, Y - h:i a', strtotime($order_list->created_at));
} else {
    echo 'N/A';
}
?>
</strong>
       <br>
        Shipping Method:<strong style="text-transform: capitalize;"><?php echo isset($order_list->shipping_method_name) ? $order_list->shipping_method_name : 'N/A'; ?></strong>  
    </td>
    <td>
      Tracking ID:
    </td>
  </tr>
  <tr>
    <td>
      <div class="logo-container">
  <img
    src="<?php echo base_url() . $barcodeImage ?>" alt="Barcode" style="width:110px"
  >
</div>
    </td>
  </tr>
</table>
<table class="invoice-info-container">
  <tr>
    <td style="width:60%" class="client-name">
            From    </td>
    <td style="width:40%" class="client-name">
      To
    </td>
  </tr>
  <tr>
    <td>
      <span style="text-transform: capitalize;font-size:18px;margin-bottom:8px"><?php echo isset($order_list->from_name) ? $order_list->from_name : 'N/A'; ?></span>
    </td>
    <td>
      	<span style="text-transform: capitalize;font-size:18px;margin-bottom:8px"><?php echo isset($order_list->to_name) ? $order_list->to_name : 'N/A'; ?></span>
    </td>
  </tr>
  <tr>
    <td  style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
     <?php echo isset($order_list->house_name) ? $order_list->house_name : ''; ?>
    </td>
    <td  style="text-transform: capitalize;font-size:15px;margin-bottom:8px" style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
     <?php echo isset($order_list->to_address) ? $order_list->to_house_name : ''; ?>
    </td>
    </tr>
      <tr>
    <td  style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
     <?php echo isset($order_list->from_house_name) ? $order_list->from_house_name : ''; ?>
    </td>
    <td  style="text-transform: capitalize;font-size:15px;margin-bottom:8px" style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
     <?php echo isset($order_list->to_house_name) ? $order_list->to_house_name : ''; ?>
    </td>
      </tr>
    <!--<tr>-->
    <!--<td  style="text-transform: capitalize;font-size:15px;margin-bottom:8px">-->
    <!-- ?php echo isset($order_list->from_street_name) ? $order_list->from_street_name : ''; ?>-->
    <!--</td>-->
    <!--<td  style="text-transform: capitalize;font-size:15px;margin-bottom:8px" style="text-transform: capitalize;font-size:15px;margin-bottom:8px">-->
    <!-- ?php echo isset($order_list->to_street_name) ? $order_list->to_street_name : ''; ?>-->
    <!--</td>-->
    <!--  </tr>-->
  <!--  <tr>-->
  <!--  <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px" style="text-transform: capitalize;font-size:15px;margin-bottom:8px">-->
  <!--   ?php echo isset($order_list->from_post_address) ? $order_list->from_post_address : ''; ?>-->
  <!--  </td>-->
  <!--  <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">-->
  <!--    <php echo isset($order_list->to_post_address) ? $order_list->to_post_address : ''; ?>-->
  <!--  </td>-->
  <!--</tr>-->
  </tr>
  <tr>
    <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
    <span>PIN:</span>  <?php echo isset($order_list->from_pin) ? $order_list->from_pin : ''; ?>
    </td>
    <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
   <span>PIN:</span>  <?php echo isset($order_list->to_pin) ? $order_list->to_pin : ''; ?>
    </td>
  </tr>
       <tr>
    <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
     <?php echo isset($order_list->from_district) ? $order_list->from_district : ''; ?>
    </td>
    <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
     <?php echo isset($order_list->to_district) ? $order_list->to_district : ''; ?>
    </td>
  </tr>
   <tr>
    <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
     <?php echo isset($order_list->from_state) ? $order_list->from_state : ''; ?>
    </td>
    <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
     <?php echo isset($order_list->to_state) ? $order_list->to_state : ''; ?>
    </td>
  </tr>

 
  <!--   <tr>-->
  <!--  <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">-->
  <!--  <span>Email:</span>  ?php echo isset($order_list->from_mail_id) ? $order_list->from_mail_id : ''; ?>-->
  <!--  </td>-->
  <!--  <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">-->
  <!-- <span>Email:</span>  ?php echo isset($order_list->to_mail_id) ? $order_list->to_mail_id : ''; ?>-->
  <!--  </td>-->
  <!--</tr>-->
       <tr>
    <td style="text-transform: capitalize;font-size:15px;margin-bottom:8px">
    <span>Phone:</span>  <?php echo isset($order_list->from_phone) ? $order_list->from_phone : ''; ?>
    </td>
    <td>
   <span style="text-transform: capitalize;font-size:15px;margin-bottom:8px">Phone:</span>  <?php echo isset($order_list->to_phone) ? $order_list->to_phone : ''; ?>
    </td>
  </tr>
</table>

<table class="line-items-container">
  <thead>
      <th>#</th>
      <tr>
      <th class="heading-quantity">Image</th>
      <th class="heading-description">Product</th>
      <th class="heading-description">SKU</th>
      <th class="heading-quantity">Quantity</th>
     </tr>
  </thead>
  <tbody>
       <?php $i=1; foreach ($product_list as $products){ ?>
    <tr>
      <td ><img src="<?php echo base_url(); ?>assets/uploads/products_images/<?php echo $products->image; ?>" alt="product-image" style="width: 40px;border-radius:15px;"/></td>
      <td>              <?php echo isset($products->product_name) ? $products->product_name : ''; ?>,
                    	<br> <span>Size:</span><?php echo isset($products->size) ? $products->size : ''; ?>
		              	<br> <span>Color:</span><?php echo isset($products->colors) ? $products->colors : ''; ?></td>
      <td><?php echo isset($products->sku_code) ? $products->sku_code : ''; ?></td>
      <td class="bold" style="Color:red;"><?php echo isset($products->quantity) ? $products->quantity : ''; ?></td>
    </tr>
       <?php  $i++; } ?>
  </tbody>
</table>

</div>

<script type="text/javascript">
  load(document.querySelector('.web-container'), './invoice.html');
</script>

</body></html>