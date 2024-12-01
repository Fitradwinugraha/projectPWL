<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    @if ($errors->any())
        <div id="error-toast" class="fixed bottom-4 right-4 bg-red-500 text-white p-4 rounded-lg shadow-lg w-80 max-w-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
            <div class="flex justify-between items-center">
                <p class="font-bold">Terjadi Kesalahan:</p>
                <button onclick="closeToast('error-toast')" class="text-white text-lg font-semibold">&times;</button>
            </div>
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div id="status-toast" class="fixed bottom-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg w-80 max-w-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
            <div class="flex justify-between items-center">
                <p class="text-sm">{{ session('status') }}</p>
                <button onclick="closeToast('status-toast')" class="text-white text-lg font-semibold">&times;</button>
            </div>
        </div>
    @endif

    <script>
        window.onload = function() {
            // Tampilkan error toast jika ada error
            const errorToast = document.getElementById('error-toast');
            if (errorToast) {
                errorToast.classList.remove('opacity-0', 'pointer-events-none');
                errorToast.classList.add('opacity-100', 'pointer-events-auto');
                setTimeout(function() {
                    closeToast('error-toast');
                }, 5000);
            }

            const statusToast = document.getElementById('status-toast');
            if (statusToast) {
                statusToast.classList.remove('opacity-0', 'pointer-events-none');
                statusToast.classList.add('opacity-100', 'pointer-events-auto');
                setTimeout(function() {
                    closeToast('status-toast');
                }, 5000);
            }
        };

        function closeToast(id) {
            const toast = document.getElementById(id);
            toast.classList.remove('opacity-100', 'pointer-events-auto');
            toast.classList.add('opacity-0', 'pointer-events-none');
        }
    </script>

    <section class="flex justify-center items-center min-h-screen bg-[#eee] p-4">
        <form action="{{ route('password.update') }}" method="POST" class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <h2 class="text-2xl font-semibold mb-4 text-center">Reset Password</h2>
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" value="{{old('email')}}" class="w-full p-3 border border-gray-300 rounded-md" required>
            </div>

            <div class="relative flex flex-col mb-4">
                <label for="password" class="sr-only">Password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Password" 
                        class="w-full border border-gray-300 p-3 pr-10 rounded-md focus:outline-none focus:border-teal-500" 
                        required
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('password')" 
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-teal-500 focus:outline-none"
                    >
                        <i id="eye-icon-password" class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="relative flex flex-col mb-4">
                <label for="password_confirmation" class="sr-only">Password Confirmation</label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        placeholder="Confirm Password" 
                        class="w-full border border-gray-300 p-3 pr-10 rounded-md focus:outline-none focus:border-teal-500" 
                        required
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('password_confirmation')" 
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-teal-500 focus:outline-none"
                    >
                        <i id="eye-icon-password_confirmation" class="fas fa-eye"></i>
                    </button>
                </div>
            </div>


            <button type="submit" class="w-full bg-teal-400 text-white py-3 rounded-md">Reset Password</button>
        </form>
    </section>

    <script>
        function togglePasswordVisibility(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const eyeIcon = document.getElementById('eye-icon-' + fieldId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>
