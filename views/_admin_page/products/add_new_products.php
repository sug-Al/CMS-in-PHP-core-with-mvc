<section class="py-5 bg-light">
  <div class="container px-4 px-lg-5 mt-5">
    <center> <h2 class="fw-bolder mb-4"> <?php echo 'New Products Form' ?> </h2> </center> <hr>
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        <form action="/admin/add/products" method="post" enctype="multipart/form-data">
          <div class="form-row align-items-center">
            <div class="form-group row">
                <label class="col-form-label">Product ID : </label>
                <div>
                  <input type="number" name="productId" value="<?php echo $products['id'] ?>" required>
                </div>
            </div> <br> <br>

            <div class="form-group row">
              <label class="col-form-label">Product Name : </label>
              <div>
                <input type="text" class="form-control" name="productName" value="<?php echo $products['name'] ?>" required>
              </div>
            </div><br> <br>

            <div class="form-group row">
              <label class="col-form-label">Quantity : </label>
              <div>
                <input type="text" class="form-control" name="quantity" value="<?php echo $products['quantity'] ?>" required>
              </div>
            </div><br> <br>

            <div class="form-group row">
              <label class="col-form-label">Product Price : </label>
              <div>
                <input type="text" name="price" value="<?php echo $products['price'] ?>" required>
              </div>
            </div><br> <br>

            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>