<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <div class="relative w-full h-40 bg-black rounded-lg flex items-center justify-center">
            <h2 class="text-xl font-bold text-white">Create Account</h2>
        </div>
        <form action="../actions/sign-up.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-700">Full Name</label>
                <div class="flex items-center border rounded-lg p-2 bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-2.21 0-4 1.79-4 4v2h8v-2c0-2.21-1.79-4-4-4z"></path></svg>
                    <input type="text" name="name" placeholder="John Doe" class="w-full bg-transparent outline-none pl-2" required>
                </div>
            </div>
            <div>
                <label class="block text-gray-700">Email Address</label>
                <div class="flex items-center border rounded-lg p-2 bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7 5 7-5M3 8v8h14V8l-7 5-7-5z"></path></svg>
                    <input type="email" name="email" placeholder="you@example.com" class="w-full bg-transparent outline-none pl-2" required>
                </div>
            </div>
            <div>
                <label class="block text-gray-700">Phone Number</label>
                <div class="flex items-center border rounded-lg p-2 bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21v-6m4 6v-6M6 21v-6m-3 6v-6m14 0v6m0-10H4m4 0V5a2 2 0 012-2h4a2 2 0 012 2v5m4 0h-6"></path></svg>
                    <input type="tel" name="number" placeholder="1234567890" class="w-full bg-transparent outline-none pl-2" maxlength="10" pattern="\d{10}" title="Please enter a 10-digit number" required>
                </div>
            </div>
            <div>
                <label class="block text-gray-700">Password</label>
                <div class="flex items-center border rounded-lg p-2 bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 2a6 6 0 00-6 6v2h12v-2a6 6 0 00-6-6z"></path></svg>
                    <input type="password" name="pass" placeholder="********" class="w-full bg-transparent outline-none pl-2" required>
                </div>
            </div>
            <div>
            </div>
            <button type="submit" class="w-full p-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Create Account</button>
        </form>
        <p class="text-center text-gray-600">Already have an account? <a href="login.php" class="text-blue-600">Sign in</a></p>
    </div>
</body>
</html>
