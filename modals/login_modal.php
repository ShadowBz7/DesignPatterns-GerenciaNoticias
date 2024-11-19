<button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#login_modal">
    Login
</button>
<div class="modal fade" id="login_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Log In</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <p class="card-text text-muted">Enter your details to access your account</p>
                <form action="php/auth/login.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" name="email" <?=isset($_SESSION['login_email']) ? 'value="'.$_SESSION['login_email'].'"' : '' ; unset($_SESSION['login_email']);?> id="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Log
                        In</button>
                    <hr class="my-4">

                    <div class="text-center">
                        <p> Didn't have an account ? <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#register_modal" class="text-decoration-none">Create Account</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>