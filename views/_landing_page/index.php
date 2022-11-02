<?php require_once __DIR__ . '/../../Base/Session.php'; ?>

<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <center> <h2 class="fw-bolder mb-4">Products</h2> </center> <hr>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach($products as $i => $products) : ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $products['productName']?></h5>
                                <!-- Product quantity-->
                                <small>  <?php echo $products['product_quantity']?> available </small> <br>
                                <!-- Product price-->
                                <small> Rs. <?php echo $products['product_price']?> per unit </small>        
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Details</a></div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>