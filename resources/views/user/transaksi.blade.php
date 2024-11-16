<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Penyewaan Motor</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @include('user.navbar')

    <section class="container mx-auto p-6 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <div class="bg-gradient-to-bl from-teal-400 to-gray-800 text-white p-8 rounded-xl shadow-2xl relative">
            <h1 class="text-4xl font-extrabold mb-6 text-center">Detail Motor</h1>
            <div class="flex justify-center mb-4">
                <img src="{{ asset('uploads/' . $motor->foto_motor) }}" alt="{{ $motor->nama_motor }}" class="h-[250px] w-auto rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
            </div>
            <div class="text-lg space-y-4">
                <p class="flex flex-col"><span class="font-bold w-40 mb-2">Nama Motor:</span><span>{{ $motor->nama_motor }}</span></p>
                <p class="flex flex-col" ><span class="font-bold w-40 mb-2">Merek:</span> <span>{{ $motor->merek_motor }}</span></p>
                <p class="flex flex-col"><span class="font-bold w-40 mb-2">Transmisi:</span> <span>{{ $motor->transmisi }}</span></p>
                <p class="flex flex-col"><span class="font-semibold w-40 mb-2">Harga/unit (1 hari): </span> <span>Rp {{ number_format($motor->harga_sewa, 0, ',', '.') }}</span></p>
                <p class="flex mt-4"><span class="bg-green-600 text-white px-3 py-1 rounded-full">Jumlah Unit Tersedia: {{ $motor->jumlah }}</span></p>
            </div>
                <div class="mt-6 border-t border-gray-200 pt-4 text-center">
                    <h2 class="text-2xl font-bold">Deskripsi</h2>
                    <p class="text-1xl font-semibold">Lorem Ipsum Dolor sit amet dolor dolord sits amet</p>
                </div>
            </div>

            <input type="hidden" name="motor_id" value="{{ $motor->id }}">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <!-- Data Penyewa -->
                        <h2 class="text-4xl font-semibold mb-4 text-blue-700 text-center">Form Pemesanan</h2><br>
                        <h2 class="text-2xl font-semibold mb-4 text-blue-500">Data Penyewa</h2>

                        <div>
                            <label for="nama" class="block font-medium text-gray-700">Nama Penyewa</label>
                            <input type="text" name="nama" id="nama" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="identitas" class="block font-medium text-gray-700">Nomor Identitas</label>
                            <input type="text" name="identitas" id="identitas" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="telepon" class="block font-medium text-gray-700">Nomor Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="email" class="block font-medium text-gray-700">Alamat Email</label>
                            <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="ktp" class="block font-medium text-gray-700">Upload KTP</label>
                            <input type="file" name="ktp" id="ktp" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <!-- Data Transaksi -->
                        <h2 class="text-2xl font-semibold mt-8 mb-4 text-blue-500">Data Transaksi</h2>
                        <div>
                            <label for="tanggal_sewa" class="block font-medium text-gray-700">Tanggal Sewa</label>
                            <input type="datetime-local" name="tanggal_sewa" id="tanggal_sewa" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="tanggal_kembali" class="block font-medium text-gray-700">Tanggal Kembali</label>
                            <input type="datetime-local" name="tanggal_kembali" id="tanggal_kembali" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="total_harga" class="block font-medium text-gray-700">Total Harga</label>
                            <input type="number" name="total_harga" id="total_harga" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" readonly>
                        </div>

                        <!-- Pembayaran -->
                        <h2 class="text-2xl font-semibold mt-8 mb-4 text-blue-700">Pembayaran</h2>
                        <div>
                            <label for="metode_pembayaran" class="block font-medium text-gray-700">Metode Pembayaran</label>
                            <select name="metode_pembayaran" id="metode_pembayaran" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="bri">BRI</option>
                                <option value="bni">BNI</option>
                                <option value="bca">BCA</option>
                                <option value="mandiri">Mandiri</option>
                                <option value="dana">Dana</option>
                            </select>
                        </div>
                        <div>
                            <label for="bukti_pembayaran" class="block font-medium text-gray-700">Bukti Pembayaran</label>
                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <button type="submit" class="w-full mt-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-200 transform hover:scale-105">
                            Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('user.footer')
</body>
</html>
