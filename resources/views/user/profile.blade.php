<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftBike | User Profile</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    @include('user.navbar')

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


    <section class="flex justify-center py-10">
        <div class="bg-white shadow-lg rounded-lg w-full max-w-4xl p-8">
            <div class="relative flex flex-col items-center justify-center mt-4 mb-10 w-full md:w-1/2">
                <h1 class="absolute text-6xl md:text-8xl font-extrabold text-gray-300 opacity-25 select-none">
                    Profile
                </h1>
                <h1 class="relative text-2xl md:text-4xl font-extrabold text-gray-800">
                    {{ auth()->user()->username }}
                </h1>
            </div>
            
            <div class="bg-gray-200 h-[2px] w-full my-4"></div>

            <div class="flex flex-col md:flex-row">
                <div class="bg-teal-400 md:w-1/3 flex flex-col items-center mb-8 md:mb-0 py-8 rounded">
                    <div class="w-32 h-32 rounded-full bg-gray-200 mb-4 flex items-center justify-center">
                        @if (auth()->user()->foto)
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="User Foto" class="w-full h-full object-cover rounded-full">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Default Foto" class="w-full h-full object-cover rounded-full">
                        @endif
                    </div>

                    <form action="{{ route('profile.updateFoto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button type="button" onclick="document.getElementById('uploadInput').click()" class="text-blue-500 underline mb-4">Upload Picture</button>
                        <input type="file" id="uploadInput" name="foto" class="hidden" onchange="this.form.submit()">
                    </form>

                    <div>
                        <h2 class="mb-2 text-center text-gray-800">SwiftBike</h2>
                        <p class="text-gray-700 mt-2 text-sm italic">Sewa Motor PWL</p>
                    </div>  
                </div>

                <div class="md:w-2/3 md:pl-10">
                    <form action="{{ route('profile.update') }}" method="POST">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-1" for="username">Username :</label>
                            <input type="text" id="username" name="username" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="{{ Auth::user()->username }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-1" for="nama">Nama :</label>
                            <input type="text" id="nama" name="nama" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="{{ Auth::user()->nama }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-1" for="email">E-mail :</label>
                            <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="{{ Auth::user()->email }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-1" for="alamat">Alamat :</label>
                            <input type="text" id="alamat" name="alamat" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="{{ Auth::user()->alamat }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-1" for="deskripsi">Deskripsi :</label>
                            <textarea id="deskripsi" name="deskripsi" class="w-full p-3 border border-gray-300 rounded-lg" rows="3" placeholder="{{ Auth::user()->deskripsi }}" disabled></textarea>
                        </div>
                        <div class="mt-8 flex justify-center md:justify-start gap-4">
                            <button type="button" onclick="toggleModal()" class="px-8 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 shadow-lg transition duration-200">
                                Edit Profile
                            </button>
                    </form>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="px-8 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 shadow-lg transition duration-200">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="editProfileModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-full max-w-lg p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Edit Profile</h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1" for="username">Username :</label>
                    <input type="text" id="username" name="username" class="w-full p-3 border border-gray-300 rounded-lg" value="{{ Auth::user()->username }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1" for="nama">Nama :</label>
                    <input type="text" id="nama" name="nama" class="w-full p-3 border border-gray-300 rounded-lg" value="{{ Auth::user()->nama }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1" for="email">E-mail :</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" value="{{ Auth::user()->email }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1" for="alamat">Alamat :</label>
                    <input type="text" id="alamat" name="alamat" class="w-full p-3 border border-gray-300 rounded-lg" value="{{ Auth::user()->alamat }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1" for="deskripsi">Deskripsi :</label>
                    <textarea id="deskripsi" name="deskripsi" class="w-full p-3 border border-gray-300 rounded-lg" rows="3">{{ Auth::user()->deskripsi }}</textarea>
                </div>
                <div class="flex justify-end gap-4">
                    <button type="button" onclick="toggleModal()" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600">Cancel</button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    @include('user.footer')

    <script>
        function toggleModal() {
            const modal = document.getElementById('editProfileModal');
            modal.classList.toggle('hidden');
        }
    </script>

</body>
</html>
