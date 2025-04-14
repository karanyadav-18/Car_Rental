<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../common/links.php'); ?>
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
    <title>Agent Login</title>
</head>

<body class="bg-light">
    <?php
    ini_set('display_errors', 0);
    ini_set('log_errors', 0);
    error_reporting(E_ALL);

    $message = $_GET['message'] ?? null;
    if ($message) {
        echo "<script>alert('" . htmlspecialchars($message) . "');</script>";
    }
    ?>

    <!-- Login Form -->
    <div class="login-form rounded bg-white overflow-hidden shadow">
        <form action="../actions/agent-signin.php" method="post" id="loginForm">
            <h4 class="bg-dark text-center text-white py-3">AGENT LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_email" type="email" class="form-control shadow-none" placeholder="Email Address" required>
                </div>
                <div class="mb-4">
                    <input name="admin_pass" type="password" class="form-control shadow-none" placeholder="Password" minlength="6" required>
                </div>
                <div class="text-end">
                    <button name="submit" type="submit" class="btn btn-primary shadow-none">LOGIN</button>
                    <button type="button" class="btn btn-secondary shadow-none" data-bs-toggle="modal" data-bs-target="#sign-up">Sign Up</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <div class="modal fade" id="sign-up" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i>Agent Registration
                    </h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../actions/agent_action.php" method="post" id="registrationForm">
                        <p class="badge rounded-pill bg-light text-dark text-wrap lh-base mb-3">
                            Note: Your details must match your ID (Aadhar card, passport, driving license, etc.) for verification.
                        </p>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" name="name1" id="companyName" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ownerName" class="form-label">Owner Name</label>
                                <input type="text" name="name2" id="ownerName" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="number" id="phone" class="form-control shadow-none" required pattern="\d{10}" title="Phone number must be exactly 10 digits.">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gst" class="form-label">GSTIN Number</label>
                                <input type="text" name="gst" id="gst" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary shadow-none">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function (e) {
            const phone = document.getElementById('phone');
            const email = document.getElementById('email');
            const password = document.getElementById('password');

            if (phone.value.length !== 10 || !/^\d+$/.test(phone.value)) {
                e.preventDefault();
                alert("Phone number must be exactly 10 digits.");
                phone.focus();
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                e.preventDefault();
                alert("Please enter a valid email address.");
                email.focus();
                return;
            }

            if (password.value.length < 6) {
                e.preventDefault();
                alert("Password must be at least 6 characters long.");
                password.focus();
                return;
            }
        });
    </script>
</body>

</html>
