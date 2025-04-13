<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="relative">
            <img src="your-image.jpg" alt="Car Background" class="w-full h-40 object-cover">
            <h2 class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl font-semibold">Welcome Back</h2>
        </div>
        <form action="../actions/login_action.php" method="POST" class="p-6">
            <div class="mb-4">
                <label class="block text-gray-700">Email Address</label>
                <div class="flex items-center border rounded-lg px-3 py-2 mt-1">
                    <span class="text-gray-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m8 4H8m8-8H8m-2 10a2 2 0 01-2-2V6a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H6z"></path></svg></span>
                    <input type="email" name="email" class="w-full outline-none px-2" placeholder="you@example.com" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <div class="flex items-center border rounded-lg px-3 py-2 mt-1">
                    <span class="text-gray-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m0-6a4 4 0 00-4 4v2a4 4 0 008 0v-2a4 4 0 00-4-4z"></path></svg></span>
                    <input type="password" name="password" class="w-full outline-none px-2" placeholder="••••••••" required>
                </div>
            </div>
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-gray-600 text-sm">
                    <input type="checkbox" name="remember" class="mr-1">
                    Remember me
                </label>
                <a href="forgot-password.php" class="text-blue-600 text-sm">Forgot password?</a>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <button type="submit" name="submit" id="submit" class="w-full p-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Login</button>
            </div>
            <p class="text-sm text-center text-gray-600 mt-4">Don't have an account? <a href="signup.php" class="text-blue-600">Sign up</a></p>
        </form>
    </div>
</body>
</html>
