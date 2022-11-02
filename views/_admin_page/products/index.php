
<section class="py-5 bg-light">
  <div class="container px-4 px-lg-5 mt-5">
    <center> <h1> <?php echo "Products" ?> </h1> </center> </br>
    <a class="btn btn-outline-dark" href = "/admin/add/products">
      New products
    </a> <br> <br> 
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Available Quantity</th>
          <th scope="col">Price per unit</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($products as $i => $products): ?>
        <tr>
        <th scope="row"><?php echo $i + 1 ?></th> 
          <td><?php echo $products['productName'] ?></td>
          <td><?php echo $products['product_quantity'] ?></td>
          <td><?php echo $products['product_price'] ?></td>
          <td>
            <div class="d-grid gap-2 d-md-flex">
              <form action="/admin/edit/products" method="POST">
                <button class="btn btn-primary" name="productId" value="<?php echo $products['productId']; ?>">
                    Edit
                </button>
              </form>
              <form action="/admin/delete/products" method="post">
                <button class="btn btn-danger" name="productId" value="<?php echo $products['productId']; ?>">
                    Delete
                </button>
              </form>
          </div>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    </form>
  </div>
</section>