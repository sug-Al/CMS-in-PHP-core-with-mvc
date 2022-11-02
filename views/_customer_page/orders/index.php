<section class="py-5 bg-light">
  <div class="container px-4 px-lg-5 mt-5">
    <center> <h1> Customer Order Cart </h1> </center> </br>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Quantity</th>
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
            <td><?php echo $orders['ordered_quantity'] ?></td>
            <td><?php echo $orders['product_price'] ?></td>
            <td><?php echo $orders['ordered_quantity'] * $orders['product_price'] ?></td>
            <td>
              <div class="d-grid gap-2 d-md-flex">
                <form action="/customer/edit/orders" method="POST">
                  <button class="btn btn-primary" name="orderId" value="<?php echo $orders['orderId'];?>"> 
                      Edit
                  </button> 
                </form>
                <form action="/customer/delete/orders" method="POST">
                  <button class="btn btn-danger" name="orderId" value="<?php echo $orders['orderId'];?>"> 
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