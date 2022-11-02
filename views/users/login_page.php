<?php require_once __DIR__ . '/../../Base/Session.php'; ?>
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <center> <h2 class="fw-bolder mb-4"> <?php echo 'Login page'?> </h2> </center> <hr>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <form action="/login" method="post" enctype="multipart/form-data">
                <div class="form-row align-items-center">
                    <div class="form-group row">
                        <label class="col-form-label">Username : </label>
                        <div >
                            <input type="text" class="form-control" name="username" value="" required>   
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label class="col-form-label">Password : </label>
                        <div>
                            <input type="password" class="form-control" name="userPassword" value="" required> 
                        </div>
                    </div> <br> <br>
                    <button type="submit" class="btn btn-dark" name="login" value="login">Login</button>
                    <a href="/signin" class="btn btn-outline-dark">Signup</a>
                </div>
            </form>
        </div>
    </div>
</section>