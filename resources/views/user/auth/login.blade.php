<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftBike | Sign In</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    @error('username')
        <div id="toast" class="fixed bottom-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg w-80 max-w-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
            <div class="flex justify-between items-center">
                <p class="text-sm font-semibold">{{ $message }}</p>
                <button onclick="closeToast()" class="text-white text-lg font-semibold">&times;</button>
            </div>
        </div>

        <script>
            window.onload = function() {
                const toast = document.getElementById('toast');
                toast.classList.remove('opacity-0', 'pointer-events-none');
                toast.classList.add('opacity-100', 'pointer-events-auto');
                
                setTimeout(function() {
                    closeToast();
                }, 5000);
            };

            function closeToast() {
                const toast = document.getElementById('toast');
                toast.classList.remove('opacity-100', 'pointer-events-auto');
                toast.classList.add('opacity-0', 'pointer-events-none');
            }
        </script>
    @enderror

    @if(session('success'))
        <div id="toast" class="fixed bottom-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg w-80 max-w-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
            <div class="flex justify-between items-center">
                <p class="text-sm font-semibold">{{ session('success') }}</p>
                <button onclick="closeToast()" class="text-white text-lg font-semibold">&times;</button>
            </div>
        </div>

        <script>
            window.onload = function() {
                const toast = document.getElementById('toast');
                toast.classList.remove('opacity-0', 'pointer-events-none');
                toast.classList.add('opacity-100', 'pointer-events-auto');
                
                setTimeout(function() {
                    closeToast();
                }, 5000);
            };

            function closeToast() {
                const toast = document.getElementById('toast');
                toast.classList.remove('opacity-100', 'pointer-events-auto');
                toast.classList.add('opacity-0', 'pointer-events-none');
            }
        </script>
    @endif

    <section class="flex justify-center items-center min-h-screen bg-[#eee] p-4">
        <div class="w-full max-w-4xl flex flex-col md:flex-row shadow-lg rounded-lg overflow-hidden">
            <div class="md:w-1/2 bg-white p-8 md:p-12 flex flex-col justify-center">
                <div class="mb-8 text-center md:text-left">
                    <img src="{{ asset('assets/img/logos.png') }}" alt="Logo" class="mb-4 w-10 mx-auto md:mx-0">
                    <h2 class="text-2xl md:text-3xl font-semibold text-teal-400">Sign in to Swift Bike</h2>
                </div>
                <div class="flex justify-center md:justify-start space-x-4 mb-6">
                    <a href="https://wa.me/6281375839812"><i class="fab fa-whatsapp text-xl text-gray-500"></i></a>
                    <a href="https://mail.google.com"><i class="fas fa-envelope text-xl text-gray-500"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram text-xl text-gray-500"></i></a>
                </div>
                <p class="text-gray-400 mb-4 text-center md:text-left">fill in the fields below</p>
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" class="w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:border-green-500" required>
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:border-green-500" required>
                    </div>
                    <div class="text-right text-sm text-green-500 hover:underline">
                        <a href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    </div>
                    <button type="submit" class="w-full bg-teal-400 text-white font-semibold py-3 rounded-full">Sign In</button>
                </form>
            </div>

            <div class="md:w-1/2 bg-gradient-to-br from-teal-400 to-gray-800 text-white flex flex-col justify-center items-center p-8 md:p-12">
                <h2 class="text-2xl md:text-3xl font-semibold mb-4 text-center">Hi, There!</h2>
                <p class="text-center mb-6">" Ready to begin an amazing journey with us? Enter your details and let's get started! "</p>
                <button class="border border-white text-white font-semibold py-2 px-6 rounded-full" onclick="window.location.href = '/register'">Sign Up</button>
            </div>
        </div>
    </section>
</body>
</html>