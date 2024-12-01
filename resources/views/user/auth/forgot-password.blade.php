<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
</head>
<body>
{{-- Error Toast --}}
@if ($errors->any())
    <div id="error-toast" class="fixed bottom-4 right-4 bg-red-500 text-white p-4 rounded-lg shadow-lg w-80 max-w-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
        <div class="flex justify-between items-center">
            <p class="text-sm font-semibold">There were some errors:</p>
            <button onclick="closeToast('error-toast')" class="text-white text-lg font-semibold">&times;</button>
        </div>
        <ul class="list-disc pl-5 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Success Toast --}}
@if (session('status'))
    <div id="status-toast" class="fixed bottom-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg w-80 max-w-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
        <div class="flex justify-between items-center">
            <p class="text-sm font-semibold">{{ session('status') }}</p>
            <button onclick="closeToast('status-toast')" class="text-white text-lg font-semibold">&times;</button>
        </div>
    </div>
@endif

{{-- Script for displaying and closing toast --}}
<script>
    window.onload = function() {
        // Display error toast if any errors
        const errorToast = document.getElementById('error-toast');
        if (errorToast) {
            errorToast.classList.remove('opacity-0', 'pointer-events-none');
            errorToast.classList.add('opacity-100', 'pointer-events-auto');
            setTimeout(function() {
                closeToast('error-toast');
            }, 5000); // Hide after 5 seconds
        }

        // Display status toast if available
        const statusToast = document.getElementById('status-toast');
        if (statusToast) {
            statusToast.classList.remove('opacity-0', 'pointer-events-none');
            statusToast.classList.add('opacity-100', 'pointer-events-auto');
            setTimeout(function() {
                closeToast('status-toast');
            }, 5000); // Hide after 5 seconds
        }
    };

    // Function to close toast
    function closeToast(id) {
        const toast = document.getElementById(id);
        toast.classList.remove('opacity-100', 'pointer-events-auto');
        toast.classList.add('opacity-0', 'pointer-events-none');
    }
</script>



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