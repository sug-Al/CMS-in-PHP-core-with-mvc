<section class="py-5 bg-light">
      <div class="container px-4 px-lg-5 mt-5">
<center> <h1> <?php echo "Customers" ?> </h1> </center> </br>

<!-- <a class="btn btn-outline-dark" href = "/customers/create">
        New customers
</a> <br> <br> -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col">Username</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($customers as $i => $customers): ?>
    <tr>
    <th scope="row"><?php echo $i + 1 ?></th>
      <td><?php echo $customers['customerName'] ?></td>
      <td><?php echo $customers['customer_address'] ?></td>
      <td><?php echo $customers['customer_contact'] ?></td>
      <td><?php echo $customers['username'] ?></td>
      <td>
          <!-- <button type="button" class="btn btn-primary">
              Approve
          </button> -->
          <form action="/admin/delete/customers" method="POST">
            <button class="btn btn-danger" name="customerId" value="<?php echo $customers['customerId']; ?>">
                Remove customer
            </button>
          </form>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
</div>
</section>