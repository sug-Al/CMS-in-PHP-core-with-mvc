<center> <h1> <?php echo 'Add new customers' ?> </h1> </center> </br>
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<form action="/customers/create" method="post" enctype="multipart/form-data">

<div class="form-row align-items-center">
  <?php if (!empty($errors)): ?>
      <div>
      <?php foreach ($errors as $errors): ?>
          <div> <?php echo $errors; ?> </div>
      <?php endforeach;?>
      </div>
      <br> <br>
  <?php endif;?>



  <div class="form-group row">
  <label class="col-form-label">Customer ID : </label>
  <div>
    <input type="text" class="form-control" name="customerId" value="<?php echo $customers['customerId'] ?>">   </div>
  </div> <br> <br>

  <div class="form-group row">
  <label class="col-form-label">Customer Name : </label>
  <div>
    <input type="text" class="form-control" name="customerName" value="<?php echo $customers['customerName'] ?>"> </div>
  </div> <br> <br>

  <div class="form-group row">
  <label class="col-form-label">Address : </label>
  <div>
    <input type="text" class="form-control" name="address" value="<?php echo $customers['address'] ?>"> </div>
  </div> <br> <br>

  <div class="form-group row">
  <label class="col-form-label">User Id : </label>
  <div>
    <input type="text" class="form-control" name="uid" value="<?php echo $customers['uid'] ?>"> </div>
  </div> <br> <br>

  <button type="submit" class="btn btn-primary">Submit</button>

      </div>

</form>

      </div>
