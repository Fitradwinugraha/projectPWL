<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran | SwiftBike</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 via-blue-50 to-blue-200 min-h-screen flex flex-col">


    @include('user.navbar')

    @if ($errors->any())
        <div id="toast-container" class="fixed bottom-4 right-4 space-y-4">
            @foreach ($errors->all() as $error)
                <div class="bg-red-500 text-white p-4 rounded-lg shadow-lg w-80 max-w-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out toast">
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-semibold">{{ $error }}</p>
                        <button onclick="closeToast(this)" class="text-white text-lg font-semibold">&times;</button>
                    </div>
                </div>
            @endforeach
        </div>

        <script>
            window.onload = function() {
                const toasts = document.querySelectorAll('.toast');
                toasts.forEach((toast, index) => {
                    setTimeout(() => {
                        toast.classList.remove('opacity-0', 'pointer-events-none');
                        toast.classList.add('opacity-100', 'pointer-events-auto');
                    }, index * 500);
                });

                toasts.forEach((toast) => {
                    setTimeout(() => {
                        closeToast(toast);
                    }, 5000);
                });
            };

            function closeToast(toast) {
                toast.classList.remove('opacity-100', 'pointer-events-auto');
                toast.classList.add('opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }
        </script>
    @endif

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

    @if(session('error'))
        <div id="toast" class="fixed bottom-4 right-4 bg-red-500 text-white p-4 rounded-lg shadow-lg w-80 max-w-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
            <div class="flex justify-between items-center">
                <p class="text-sm font-semibold">{{ session('error') }}</p>
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

    <div class="mx-auto px-6 py-12 space-y-12">

        <div class="flex flex-col md:flex-row justify-center items-start gap-12">
            <div class="max-w-lg w-full bg-white p-8 rounded-2xl shadow-md">
                <div class="flex justify-center -mt-16">
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-6 rounded-full shadow-lg">
                        <i class="fas fa-money-check-alt text-white text-4xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-extrabold text-center text-gray-900 mt-8 mb-6">Upload Bukti Pembayaran</h1>
                <p class="text-gray-600 text-center mb-6">
                    Silakan unggah bukti pembayaran Anda untuk melanjutkan proses transaksi. File berupa gambar <b>jpeg, png, jpg</b>.
                </p>
                <form id="paymentForm" action="{{ route('user.prosesPembayaran', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="fileInput" class="block text-gray-700 font-medium mb-2">Unggah Bukti</label>
                        <input type="file" name="bukti_bayar" id="fileInput" 
                            class="block w-full border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                            accept="image/*"
                            required>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Preview Gambar</label>
                        <img id="imagePreview" class="w-full h-64 object-cover rounded-lg shadow-lg border" src="#" alt="Preview Gambar" style="display: none;">
                    </div>
                    <button type="button" onclick="confirmPayment()" 
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                        <i class="fas fa-upload mr-2"></i> Bayar Sekarang
                    </button>
                </form>
            </div>

            <!-- Card: Detail Transaksi -->
            <div class="max-w-lg w-full bg-white p-8 rounded-2xl shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Transaksi</h2>
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
                
                <!-- Panduan Pembayaran -->
                <div class="mx-auto bg-gradient-to-r from-white to-teal-400 p-8 mt-4 rounded shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Panduan Pembayaran</h2>
                    <ol class="list-decimal list-inside space-y-2 text-gray-600 leading-relaxed">
                        <li>Transfer sesuai jumlah di invoice.</li>
                        <li>Simpan bukti pembayaran dalam format JPG, PNG, atau JPEG.</li>
                        <li>Unggah bukti pembayaran melalui formulir di samping.</li>
                        <li>Tunggu konfirmasi melalui notifikasi di akun Anda.</li>
                    </ol>
                </div>
            </div>

        </div>

        <!-- Rekening Pembayaran -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
            <!-- Card Rekening -->
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-center mb-2">
                    <img src="https://www.bni.co.id/Portals/1/BNI/Images/logo-bni-new.png" alt="bni logo" class="w-20 h-20 object-contain">
                </div>
                <div class="pb-2">
                    <h3 class="text-xl font-semibold text-center text-gray-800">BNI</h3>
                    <p class="text-center text-gray-600 mt-2">123 - 456 - 789</p>
                    <p class="text-center text-gray-600 mt-2"><strong>a.n. </strong><i>Jhon V Nababan</i></p>
                </div>
            </div>
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-center mb-2">
                    <img src="https://bri.co.id/o/bri-corporate-theme/images/bri-logo.png" alt="bri logo" class="w-20 h-20 object-contain">
                </div>
                <div class="pb-2">
                    <h3 class="text-xl font-semibold text-center text-gray-800">BRI</h3>
                    <p class="text-center text-gray-600 mt-2">123 - 456 - 789</p>
                    <p class="text-center text-gray-600 mt-2"><strong>a.n. </strong><i>Jhon V Nababan</i></p>
                </div>
            </div>
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-center mb-2">
                    <img src="https://karir.bca.co.id/public/assets/img/logo-color.svg" alt="bca logo" class="w-20 h-20 object-contain">
                </div>
                <div class="pb-2">
                    <h3 class="text-xl font-semibold text-center text-gray-800">BCA</h3>
                    <p class="text-center text-gray-600 mt-2">123 - 456 - 789</p>
                    <p class="text-center text-gray-600 mt-2"><strong>a.n. </strong><i>Jhon V Nababan</i></p>
                </div>
            </div>
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-center mb-2">
                    <img src="https://www.bankmandiri.co.id/image/layout_set_logo?img_id=31567&t=1732295033127" alt="mandiri logo" class="w-20 h-20 object-contain">
                </div>
                <div class="pb-2">
                    <h3 class="text-xl font-semibold text-center text-gray-800">Mandiri</h3>
                    <p class="text-center text-gray-600 mt-2">123 - 456 - 789</p>
                    <p class="text-center text-gray-600 mt-2"><strong>a.n. </strong><i>Jhon V Nababan</i></p>
                </div>
            </div>
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="flex items-center justify-center mb-2">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/2560px-Logo_dana_blue.svg.png" alt="dana logo" class="w-20 h-20 object-contain">
                </div>
                <div class="pb-2">
                    <h3 class="text-xl font-semibold text-center text-gray-800">DANA</h3>
                    <p class="text-center text-gray-600 mt-2">123 - 456 - 789</p>
                    <p class="text-center text-gray-600 mt-2"><strong>a.n. </strong><i>Jhon V Nababan</i></p>
                </div>
            </div>
            
        </div>
    </div>


    @include('user.footer')

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

    <script>
        function confirmPayment() {
            Swal.fire({
                title: 'Konfirmasi Pembayaran',
                text: 'Apakah Anda yakin ingin melanjutkan pembayaran ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Lanjutkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('paymentForm').submit();
                }
            });
        }
    </script>
</body>
</html>
