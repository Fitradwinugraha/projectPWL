<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran | SwiftBike</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-blue-100 via-blue-50 to-blue-200 min-h-screen flex flex-col">

    <!-- Navbar -->
    @include('user.navbar')

    <!-- Alerts -->
    <div class="container mx-auto px-4 mt-6">
        @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-lg shadow-md flex items-center gap-3 mb-4">
            <i class="fas fa-check-circle text-xl"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        @if(session('error'))
        <div class="bg-red-600 text-white p-4 rounded-lg shadow-md flex items-center gap-3 mb-4">
            <i class="fas fa-exclamation-circle text-xl"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif
    </div>

    <!-- Main Section -->
    <div class="flex flex-col md:flex-row justify-center items-start gap-12 mt-10 px-4">

        <!-- Upload Bukti Pembayaran -->
        <div class="max-w-lg w-full bg-white p-8 rounded-2xl shadow-xl transition transform hover:scale-105">
            <div class="flex justify-center -mt-16">
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-6 rounded-full shadow-lg">
                    <i class="fas fa-money-check-alt text-white text-4xl"></i>
                </div>
            </div>
            <h1 class="text-3xl font-extrabold text-center text-gray-900 mt-8 mb-6">Upload Bukti Pembayaran</h1>
            <p class="text-gray-600 text-center mb-8">
                Silakan unggah bukti pembayaran Anda untuk melanjutkan proses transaksi. File berupa gambar jpeg,png,jpg.
            </p>
            <form action="{{ route('user.prosesPembayaran', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="fileInput" class="block text-gray-700 font-medium mb-2">Unggah Bukti</label>
                    <input type="file" name="bukti_bayar" id="fileInput" 
                        class="block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                        accept="image/*,application/pdf"
                        required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Preview Gambar</label>
                    <img id="imagePreview" class="w-full h-64 object-cover rounded-lg shadow-lg border" src="#" alt="Preview Gambar" style="display: none;">
                </div>
                <button type="submit" 
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                    <i class="fas fa-upload mr-2"></i> Bayar Sekarang
                </button>
            </form>
        </div>

        <!-- Detail Transaksi -->
        <div class="bg-white p-8 rounded-2xl shadow-xl max-w-lg transition transform hover:scale-105">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Detail Transaksi</h2>
            <div class="divide-y divide-gray-200">
                <div class="py-4 flex justify-between items-center">
                    <span class="font-medium text-gray-600">Nama Motor</span>
                    <span class="text-gray-800">{{ $transaksi->motor->nama_motor }}</span>
                </div>
                <div class="py-4 flex justify-between items-center">
                    <span class="font-medium text-gray-600">Tanggal Sewa</span>
                    <span class="text-gray-800">{{ $transaksi->tanggal_sewa }}</span>
                </div>
                <div class="py-4 flex justify-between items-center">
                    <span class="font-medium text-gray-600">Tanggal Kembali</span>
                    <span class="text-gray-800">{{ $transaksi->tanggal_kembali }}</span>
                </div>
                <div class="py-4 flex justify-between items-center">
                    <span class="font-medium text-gray-600">Jumlah</span>
                    <span class="text-gray-800">{{ $transaksi->jumlah }}</span>
                </div>
                <div class="py-4 flex justify-between items-center">
                    <span class="font-medium text-gray-600">Total Harga</span>
                    <span class="text-gray-800">Rp {{ number_format($transaksi->total_harga, 2, ',', '.') }}</span>
                </div>
                <div class="py-4 flex justify-between items-center">
                    <span class="font-medium text-gray-600">Metode Pembayaran</span>
                    <span class="text-gray-800">{{ strtoupper($transaksi->metode_pembayaran) }}</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Panduan Pembayaran -->
    <div class="container mx-auto mt-12 px-4">
        <div class="bg-white p-6 rounded-2xl shadow-xl">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Panduan Pembayaran</h2>
            <ol class="list-decimal list-inside space-y-2 text-gray-600 leading-relaxed">
                <li>Transfer sesuai jumlah di invoice.</li>
                <li>Simpan bukti pembayaran dalam format JPG, PNG, atau PDF.</li>
                <li>Unggah bukti pembayaran melalui formulir di atas.</li>
                <li>Tunggu konfirmasi melalui email atau notifikasi di akun Anda.</li>
            </ol>
        </div>
    </div>

    <!-- Bank Info Cards -->
    <div class="container mx-auto mt-12 px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- BRI Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
            <div class="flex items-center justify-center mb-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Logo_Bank_Rakyat_Indonesia.svg/1200px-Logo_Bank_Rakyat_Indonesia.svg.png" alt="BRI Logo" class="w-20 h-20 object-contain">
            </div>
            <h3 class="text-xl font-semibold text-center text-gray-800">BRI</h3>
            <p class="text-center text-gray-600 mt-2">No. Rekening: 123-456-789</p>
        </div>

        <!-- BNI Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
            <div class="flex items-center justify-center mb-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Logo_Bank_Negara_Indonesia.svg/1200px-Logo_Bank_Negara_Indonesia.svg.png" alt="BNI Logo" class="w-20 h-20 object-contain">
            </div>
            <h3 class="text-xl font-semibold text-center text-gray-800">BNI</h3>
            <p class="text-center text-gray-600 mt-2">No. Rekening: 987-654-321</p>
        </div>

        <!-- BCA Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
            <div class="flex items-center justify-center mb-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Logo_Bank_Central_Asia.svg/1200px-Logo_Bank_Central_Asia.svg.png" alt="BCA Logo" class="w-20 h-20 object-contain">
            </div>
            <h3 class="text-xl font-semibold text-center text-gray-800">BCA</h3>
            <p class="text-center text-gray-600 mt-2">No. Rekening: 234-567-890</p>
        </div>

        <!-- Mandiri Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
            <div class="flex items-center justify-center mb-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Logo_Bank_Mandiri.svg/1200px-Logo_Bank_Mandiri.svg.png" alt="Mandiri Logo" class="w-20 h-20 object-contain">
            </div>
            <h3 class="text-xl font-semibold text-center text-gray-800">Mandiri</h3>
            <p class="text-center text-gray-600 mt-2">No. Rekening: 567-890-123</p>
        </div>

        <!-- Dana Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
            <div class="flex items-center justify-center mb-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Dana_logo.svg/2560px-Dana_logo.svg.png" alt="Dana Logo" class="w-20 h-20 object-contain">
            </div>
            <h3 class="text-xl font-semibold text-center text-gray-800">Dana</h3>
            <p class="text-center text-gray-600 mt-2">Nomor Akun: 08123456789</p>
        </div>
    </div>

    <!-- Footer -->
    @include('user.footer')

    <!-- JavaScript for Preview -->
    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
