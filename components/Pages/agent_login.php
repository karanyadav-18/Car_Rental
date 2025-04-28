<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            transition: transform 0.3s ease-out;
        }

        /* Smooth transitions for modal */
        .modal-enter-active, .modal-leave-active {
            transition: opacity 0.5s ease;
        }

        .modal-enter, .modal-leave-to {
            opacity: 0;
        }
    </style>
    <title>Agent Login</title>
</head>

<body class="bg-gradient-to-r from-indigo-500 to-indigo-700">

    <?php include '../common/navbar.php' ?>

    <!-- Login Form -->
    <div class="login-form rounded-lg bg-white shadow-xl p-6 transform transition-all hover:scale-105">
        <form action="../actions/agent-signin.php" method="post" id="loginForm">
            <h4 class="bg-indigo-800 text-center text-white py-3 text-xl font-semibold rounded-t-lg">AGENT LOGIN PANEL</h4>
            <div class="space-y-4 p-6">
                <div>
                    <input name="admin_email" type="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" placeholder="Email Address" required>
                </div>
                <div>
                    <input name="admin_pass" type="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" placeholder="Password" minlength="6" required>
                </div>
                <div class="flex justify-between items-center">
                    <button name="submit" type="submit" class="w-full bg-indigo-500 text-white py-2 rounded-lg hover:bg-indigo-600 transition duration-300 transform hover:scale-105">LOGIN</button>
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="w-full bg-gray-300 text-gray-800 py-2 rounded-lg hover:bg-gray-400 transition duration-300 transform hover:scale-105" data-bs-toggle="modal" data-bs-target="#sign-up">Don't have an account? Sign Up</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div id="sign-up" class="fixed inset-0 flex justify-center items-center bg-gray-800 bg-opacity-50 hidden transition duration-300 transform scale-95">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6 transform transition-all modal-enter-active">
            <h5 class="text-xl font-semibold text-center mb-4">Agent Registration</h5>
            <form action="../actions/agent_action.php" method="post" id="registrationForm">
                <div class="space-y-4">
                    <p class="text-sm text-gray-600 mb-4">Note: Your details must match your ID (Aadhar card, passport, driving license, etc.) for verification.</p>

                    <div>
                        <label for="companyName" class="block text-gray-700">Company Name</label>
                        <input type="text" name="name1" id="companyName" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
                    </div>

                    <div>
                        <label for="ownerName" class="block text-gray-700">Owner Name</label>
                        <input type="text" name="name2" id="ownerName" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700">Phone</label>
                        <input type="text" name="number" id="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required pattern="\d{10}" title="Phone number must be exactly 10 digits.">
                    </div>

                    <div>
                        <label for="gst" class="block text-gray-700">GSTIN Number</label>
                        <input type="text" name="gst" id="gst" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
                    </div>

                    <div class="flex justify-center mt-4">
                        <button type="submit" name="submit" class="w-full bg-indigo-500 text-white py-2 rounded-lg hover:bg-indigo-600 transition duration-300 transform hover:scale-105">REGISTER</button>
                    </div>
                </div>
            </form>
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

        // Toggle modal visibility
        document.querySelector('[data-bs-toggle="modal"]').addEventListener('click', function () {
            document.getElementById('sign-up').classList.remove('hidden');
            document.getElementById('sign-up').classList.add('scale-100');
        });

        document.querySelector('.btn-close').addEventListener('click', function () {
            document.getElementById('sign-up').classList.add('hidden');
            document.getElementById('sign-up').classList.remove('scale-100');
        });
    </script>
</body>

</html>
