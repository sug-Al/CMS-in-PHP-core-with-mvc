<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <center> <h2 class="fw-bolder mb-4"> Edit product page </h2> </center> <hr>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <form action="/admin/updated/products" method="POST">
                <div class="form-row align-items-center">
                    <div class="form-group row">
                        <label class="col-form-label">Product Id : <?php echo $products['productId']; ?></label>
                        <input type="hidden" name="productId" value="<?php echo $products['productId']; ?>" />
                    </div> <br>
                    <div class="form-group row">
                        <label class="col-form-label">Product name : </label>
                        <div>
                            <input type="text" class="form-control" name="productName" value="<?php echo $products['productName']; ?>" required> 
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label class="col-form-label">Product price : </label>
                        <div>
                            <input type="number" class="form-control" name="product_price" value="<?php echo $products['product_price']; ?>" required> 
                        </div>
                    </div> <br> 
                    <div class="form-group row">
                        <label class="col-form-label">Product quantity : </label>
                        <div>
                            <input type="number" class="form-control" name="product_quantity" value="<?php echo $products['product_quantity']; ?>" required> 
                        </div>
                    </div> <br> <br>
                    <button class="btn btn-primary"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</section>