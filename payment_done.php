<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tech PC - Thank you</title>
  <?php require_once "includes/class_autoloader.php"; ?>
  <?php require_once "header.php"; ?>
  <style>
    .invoice-container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ddd;
      font-family: Arial, sans-serif;
    }
    .invoice-header {
      text-align: center;
      margin-bottom: 20px;
    }
    .invoice-details, .invoice-items {
      width: 100%;
      margin-bottom: 20px;
    }
    .invoice-items th, .invoice-items td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    .invoice-items th {
      background-color: #f4f4f4;
    }
    .print-button {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
      text-align: center;
    }
    .print-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container center-align" style="margin-top: 100px;">
    <div class="rounded-card-parent" style="margin-right: 200px; margin-left: 200px;">
      <div class="rounded-card card-content">
        <h4 class="page-title green-text">We received your payment.</h4>
        <p>Thank you for your purchase. Your ordered items will be delivered accordingly. Please come again.</p>
        <div class="card-action" style='margin-top: 50px'>
          <a class="white-text btn" href="index.php">Return to Home Page</a>
          <a style='margin-left: 20px' class="white-text btn" href='cart.php?member_id=<?php echo($memberID); ?>'>Back to Cart</a>
          <button class="print-button" onclick="printInvoice()">Print Invoice</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Invoice Section -->
  <div id="invoice" style="display: none;">
    <div class="invoice-container">
      <div class="invoice-header">
        <h1>Invoice</h1>
        <p>Thank you for your purchase!</p>
      </div>
      <div class="invoice-details">
        <p><strong>Customer Name:</strong> John Doe</p>
        <p><strong>Date:</strong> <?php echo date("d/m/Y"); ?></p>
        <p><strong>Invoice ID:</strong> #123456</p>
      </div>
      <table class="invoice-items">
        <thead>
            <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Assuming you have a session or database storing cart items
            if (session_status() !== PHP_SESSION_ACTIVE) {
              session_start();
            }
            $total = 0;

            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $item) {
              // Ensure the item has the expected keys
              $productName = isset($item['name']) ? htmlspecialchars($item['name']) : 'Unknown Product';
              $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 0;
              $price = isset($item['price']) ? number_format((float)$item['price'], 2) : '0.00';
              $itemTotal = number_format($quantity * (float)$item['price'], 2);
              $total += $quantity * (float)$item['price'];

              echo "<tr>
              <td>{$Name}</td>
              <td>{$quantity}</td>
              <td>\${$price}</td>
              <td>\${$itemTotal}</td>
              </tr>";
              }
            } else {
              echo "<tr><td colspan='4' style='text-align: center; color: red;'>No items in the cart</td></tr>";
            }
            ?>
            <tr>
            <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
            <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function printInvoice() {
      var printContents = document.getElementById('invoice').innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>
</body>
<?php include "footer.php"; ?>
</html>