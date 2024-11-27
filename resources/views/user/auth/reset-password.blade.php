<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>
<body>
    <section class="flex justify-center items-center min-h-screen bg-[#eee] p-4">
        <form action="{{ route('password.update') }}" method="POST" class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <h2 class="text-2xl font-semibold mb-4 text-center">Reset Password</h2>
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">New Password</label>
                <input type="password" name="password" id="password" placeholder="New Password" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="w-full bg-teal-400 text-white py-3 rounded-md">Reset Password</button>
        </form>
    </section>
</body>
</html>
