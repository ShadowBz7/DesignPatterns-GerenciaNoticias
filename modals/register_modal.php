<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#register_modal">
    Register
</button>
<div class="modal fade" id="register_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Sign up for free</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="php/auth/register.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" name="name" <?=isset($_SESSION['name']) ? 'value="'.$_SESSION['name'].'"' : '' ; unset($_SESSION['name']);?> id="name" placeholder="Your Name">
                        <label for="name">Your Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" name="email" <?=isset($_SESSION['email']) ? 'value="'.$_SESSION['email'].'"' : '' ; unset($_SESSION['email']);?> id="email" placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <p class="text-body-secondary small my-2">By clicking Sign up, you agree to the
                        terms
                        of use.</p>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Create account</button>
                    <hr class="my-4">

                    <div class="text-center">
                        <p> Already have an account ? <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#login_modal" class="text-decoration-none">Log In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>