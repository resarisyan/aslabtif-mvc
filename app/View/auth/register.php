<?php require_once(__DIR__ . "/../layouts/auth/header.php"); ?>
<div class="col-lg-6">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        </div>
        <form class="user" method="POST" action="<?= BASEURL ?>/register">
            <div class="form-group">
                <input type="name" class="form-control form-control-user" id="name" placeholder="Enter Name..." name="name">
            </div>
            <div class="form-group">
                <input type="username" class="form-control form-control-user" id="username" placeholder="Enter Username..." name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Register
            </button>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="<?= BASEURL . '/login' ?>">Already have an account? Login!</a>
        </div>
    </div>
</div>
<?php require_once(__DIR__ . "/../layouts/auth/footer.php"); ?>