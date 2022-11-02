<section class="py-5 bg-light">
  <div class="container px-8 px-lg-8 mt-5">
    <center> <h1> <?php echo "Orders" ?> </h1> </center> </br>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Available Quantity</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Customer Address</th>
          <th scope="col">Customer Contact</th>
          <th scope="col">Ordered Quantity</th>
          <th scope="col">Price per unit</th>
          <th scope="col">Total</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($orders as $i => $orders): ?>
        <tr>
        <th scope="row"><?php echo $i + 1 ?></th>
          <td><?php echo $orders['productName'] ?></td>
          <td><?php echo $orders['product_quantity'] ?></td>
          <td><?php echo $orders['customerName'] ?></td>
          <td><?php echo $orders['customer_address'] ?></td>
          <td><?php echo $orders['customer_contact'] ?></td>
          <td><?php echo $orders['ordered_quantity'] ?></td>
          <td><?php echo $orders['product_price'] ?></td>
          <td><?php echo $orders['ordered_quantity'] * $orders['product_price'] ?></td>
          <td>
            <div class="d-grid gap-2 d-md-flex">
              <form action="" method="POST">
                <button class="btn btn-primary" name="orderId" value="<?php echo $orders['orderId']; ?>">
                    Approve
                </button>
              </form>
              <form action="/admin/delete/orders" method="POST">
                <button class="btn btn-danger" name="orderId" value="<?php echo $orders['orderId']; ?>">
                    Delete
                </button>
              </form>
            </div>
          </td>
        </tr>
        <?php endforeach?>
      </tbody>
    </table>
  </div>
</section>