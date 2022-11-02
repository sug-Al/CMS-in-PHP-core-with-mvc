<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <center> <h2 class="fw-bolder mb-4"> <?php echo 'Sign In page'?> </h2> </center> <hr>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <form action="/signin" method="post" enctype="multipart/form-data">
                <div class="form-row align-items-center">
                    <div class="form-group row">
                        <label class="col-form-label">Full name : </label>
                        <div>
                            <input type="text" class="form-control" name="fullname" value="<?php echo "" ?>" required> 
                        </div>                   
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label">Address : </label>
                        <div>
                        <input type="text" class="form-control" name="address" value="<?php echo "" ?>" required>  
                        </div>                   
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label">Mobile No. : </label>
                        <div>
                        <input type="text" class="form-control" name="contact" value="<?php echo "" ?>" required>  
                        </div>                   
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label">Username : </label>
                        <div>
                            <input type="text" class="form-control" name="username" value="" required>  
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label class="col-form-label">Password : </label>
                        <div >
                            <input type="password" class="form-control" name="password" value="" required> 
                        </div>
                    </div> <br>
                    <div class="form-group row">
                        <label class="col-form-label">Retype password : </label>
                        <div >
                            <input type="password" class="form-control" name="repassword" value="" required> 
                        </div>
                    </div> <br> <br>
                    <button type="submit" class="btn btn-dark" name="signin" value="signin">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</section>