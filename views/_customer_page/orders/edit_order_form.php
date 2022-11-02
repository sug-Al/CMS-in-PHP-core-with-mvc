<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <center> <h2 class="fw-bolder mb-4"> Order page </h2> </center> <hr>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <form action="/customer/updated/orders" method="post">
                <div class="form-row align-items-center">
                    <div class="form-group row">
                        <label class="col-form-label">Product name : <?php echo $orders['productName']; ?></label>
                        <input type="hidden" name="orderId" value="<?php echo $orders['orderId']; ?>" />
                    </div> <br>
                    <div class="form-group row">
                        <label class="col-form-label">Available quantity : <?php echo $orders['product_quantity']; ?></label>
                    </div> <br> 
                    <div class="form-group row">
                        <label class="col-form-label">Price per unit : <?php echo $orders['product_price']; ?></label>
                    </div> <br> 
                    <div class="form-group row">
                        <label class="col-form-label">Set quantity: </label>
                        <div>
                            <input type="number" class="form-control" name="quantity" value="<?php echo $orders['ordered_quantity']; ?>" required> 
                        </div>
                    </div> <br> <br>
                    <button class="btn btn-primary"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</section>