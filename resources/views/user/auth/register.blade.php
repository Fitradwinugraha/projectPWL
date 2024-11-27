<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftBike | Sign Up</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <section class="bg-[#eee] flex justify-center items-center min-h-screen p-4">
        <div class="w-full max-w-4xl flex flex-col md:flex-row shadow-lg rounded-lg overflow-hidden">

            <div class="md:w-1/2 bg-gradient-to-bl from-teal-400 to-gray-800 text-white flex flex-col justify-center items-center p-8 md:p-12">
                <h2 class="text-2xl md:text-3xl font-semibold mb-4 text-center">Great to See You Again!</h2>
                <p class="mb-6 text-center">" Stay connected with us—please sign in with your personal information. "</p>
                <button class="bg-white text-teal-500 font-semibold py-2 px-6 rounded-full" onclick="window.location.href = '/login'">Sign In</button>
            </div>

            <div class="md:w-1/2 bg-white p-8 md:p-12 flex flex-col justify-center">
                <img src="{{ asset('assets/img/logos.png') }}" alt="Logo" class="text-left mb-4 w-10 mx-auto md:mx-0">
                <div class="flex justify-center md:justify-start items-center space-x-4 mb-4">
                    <a href="https://wa.me/6281375839812"><i class="fab fa-whatsapp text-xl text-gray-500"></i></a>
                    <a href="https://mail.google.com"><i class="fas fa-envelope text-xl text-gray-500"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram text-xl text-gray-500"></i></a>
                </div>
                <h2 class="text-2xl md:text-3xl font-semibold text-teal-500 mb-4 text-center">Create Account</h2>
                <p class="text-gray-400 mb-4 text-center">fill in the fields below</p>
                <form action="{{ route('register') }}" method="POST" class="w-full space-y-4">
                    @csrf
                    <div>
                        <label for="nama" class="sr-only">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Nama" class="w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:border-teal-500" required>
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:border-teal-500" required>
                    </div>
                    <div>
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:border-teal-500" required>
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:border-teal-500" required>
                    </div>
                    <button class="w-full bg-teal-500 text-white font-semibold py-3 rounded-full">Sign Up</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
