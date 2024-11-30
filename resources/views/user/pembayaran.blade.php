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
                        <label class="block text-gray-700 font-medium mb-2">Pilih Metode Pembayaran</label>
                        <div class="grid grid-cols-3 gap-4">
                            <label class="block">
                                <input type="radio" name="metode_pembayaran" value="bni" 
                                       class="mr-2" 
                                       {{ $transaksi->metode_pembayaran == 'bni' ? 'checked' : '' }}>
                                <img src="https://www.bni.co.id/Portals/1/BNI/Images/logo-bni-new.png" 
                                     class="inline-block w-20 h-10 object-contain">
                            </label>
                            <label class="block">
                                <input type="radio" name="metode_pembayaran" value="bri" 
                                       class="mr-2"
                                       {{ $transaksi->metode_pembayaran == 'bri' ? 'checked' : '' }}>
                                <img src="https://bri.co.id/o/bri-corporate-theme/images/bri-logo.png" 
                                     class="inline-block w-20 h-10 object-contain">
                            </label>
                            <label class="block">
                                <input type="radio" name="metode_pembayaran" value="bca" 
                                       class="mr-2"
                                       {{ $transaksi->metode_pembayaran == 'bca' ? 'checked' : '' }}>
                                <img src="https://karir.bca.co.id/public/assets/img/logo-color.svg" 
                                     class="inline-block w-20 h-10 object-contain">
                            </label>
                            <label class="block">
                                <input type="radio" name="metode_pembayaran" value="mandiri" 
                                       class="mr-2"
                                       {{ $transaksi->metode_pembayaran == 'mandiri' ? 'checked' : '' }}>
                                <img src="https://www.bankmandiri.co.id/image/layout_set_logo?img_id=31567&t=1732295033127" 
                                     class="inline-block w-20 h-10 object-contain">
                            </label>
                            <label class="block">
                                <input type="radio" name="metode_pembayaran" value="dana" 
                                       class="mr-2"
                                       {{ $transaksi->metode_pembayaran == 'dana' ? 'checked' : '' }}>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/2560px-Logo_dana_blue.svg.png" 
                                     class="inline-block w-20 h-10 object-contain">
                            </label>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="fileInput" class="block text-gray-700 font-medium mb-2">Unggah Bukti</label>
                        <input type="file" name="bukti_bayar" id="fileInput " class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition duration-200">Kirim Bukti Pembayaran</button>
                </form>
            </div>
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
</body>
</html>