<?php 
    require_once __DIR__ . '/../../Base/Session.php'; 
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/customer/products">Home</a></li>
                <li> <a class="btn btn-outline-dark" href="/customer/orders">
                <i class="bi-cart-fill me-1"></i>
                    Cart list
                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo "" ?></span>
                </a> </li>
            </ul>
            <form action="/logout" method="POST">
                <h5> Welcome 
                    <?php echo $_SESSION['username']; ?> 
                </h5>
                <button class="btn btn-dark" name="logout" value="logout">Logout</button>
            </form>
        </div>
    </div>
</nav>                      