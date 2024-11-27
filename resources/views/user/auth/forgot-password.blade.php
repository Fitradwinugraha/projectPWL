<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
</head>
<body>
    <section class="flex justify-center items-center min-h-screen bg-[#eee] p-4">
        <form action="{{ route('password.email') }}" method="POST" class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
            @csrf
            <h2 class="text-2xl font-semibold mb-4 text-center">Forgot Password</h2>
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>
            @if (session('status'))
                <p class="text-green-500 mb-4">{{ session('status') }}</p>
            @endif
            <button type="submit" class="w-full bg-teal-400 text-white py-3 rounded-md">Send Reset Link</button>
        </form>
    </section>
</body>
</html>