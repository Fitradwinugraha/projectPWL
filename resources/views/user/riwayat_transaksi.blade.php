<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi | SwiftBike</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('user.navbar')

    <div class="mx-auto mt-10 p-5 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-5">Riwayat Transaksi</h1>

        @if(session('success'))
        <div id="toast" class="fixed bottom-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg w-80 max-w-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out z-999">
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

        @if($transaksi->contains('status', 'dikonfirmasi'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-6">
                <strong class="font-bold">Info:</strong>
                <span class="block sm:inline">Anda memiliki transaksi yang sudah dikonfirmasi. Segera lakukan pembayaran!</span>
            </div>
        @endif

        @if($transaksi->contains('status', 'selesai'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                <strong class="font-bold">Info:</strong>
                <span class="block sm:inline">Anda memiliki transaksi yang sudah berhasil. Silahkan lihat detail dan Terimakasih telah menggunakan jasa kami!</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-4 px-6 text-center border-b">No</th>
                        <th class="py-4 px-6 text-left border-b">Motor</th>
                        <th class="py-4 px-6 text-center border-b">Tanggal Sewa</th>
                        <th class="py-4 px-6 text-center border-b">Tanggal Kembali</th>
                        <th class="py-4 px-6 text-center border-b">Jumlah</th>
                        <th class="py-4 px-6 text-center border-b">Total Harga</th>
                        <th class="py-4 px-6 text-center border-b">Metode Pembayaran</th>
                        <th class="py-4 px-6 text-center border-b">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @forelse($transaksi as $key => $item)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-4 px-6 text-center">{{ $key + 1 }}</td>
                        <td class="py-4 px-6 text-left">{{ $item->motor->nama_motor }}</td>
                        <td class="py-4 px-6 text-center">{{ $item->tanggal_sewa }}</td>
                        <td class="py-4 px-6 text-center">{{ $item->tanggal_kembali }}</td>
                        <td class="py-4 px-6 text-center">{{ $item->jumlah }}</td>
                        <td class="py-4 px-6 text-center">Rp {{ number_format($item->total_harga, 2, ',', '.') }}</td>
                        <td class="py-4 px-6 text-center">{{ strtoupper($item->metode_pembayaran) }}</td>
                        <td class="py-4 px-6 text-center">
                            @if($item->status == 'dikonfirmasi')
                                <div class="p-4 bg-blue-100 border border-blue-400 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-info-circle text-blue-500 mb-4"></i>
                                        <p class="text-sm font-semibold text-blue-700">
                                            Pesanan Anda telah dikonfirmasi. Silakan lakukan pembayaran dengan menekan tombol di bawah ini.
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('user.pembayaran', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-full text-xs  md:font-semibold hover:bg-blue-600 transition">
                                            Bayar
                                        </a>
                                    </div>
                                </div>
                            @elseif($item->status == 'selesai')
                                <button class="bg-green-500 text-white px-4 py-2 rounded-full text-xs font-semibold hover:bg-green-600 transition" data-modal-toggle="detailModal{{ $item->id }}">
                                    Lihat Detail
                                </button>
                            @else
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $item->status == 'pending' ? 'bg-yellow-400 text-white px-4 py-2' : ($item->status == 'dibatalkan' ? 'bg-red-500 text-white px-4 py-2' : 'bg-green-500 text-white px-4 py-2') }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            @endif
                        </td>
                    </tr>
    
                    <!-- Modal Detail Transaksi -->
                    <div id="detailModal{{ $item->id }}" class="hidden fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50">
                        <div class="relative bg-white p-8 rounded-2xl shadow-2xl w-full max-w-3xl max-h-screen overflow-y-auto">
                            <!-- Close Button -->
                            <button data-modal-toggle="detailModal{{ $item->id }}" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl font-semibold">
                                &times;
                            </button>

                            <!-- Modal Header -->
                            <div class="flex flex-col items-center mb-8">
                                <h3 class="text-3xl font-bold text-gray-800">Detail Transaksi</h3>
                                <span class="text-sm text-gray-500">ID Transaksi: #{{ $item->id }}</span>
                            </div>

                            <!-- Modal Content -->
                            <div class="space-y-6">
                                <div class="flex justify-between items-center text-gray-700">
                                    <p><strong>Motor:</strong> {{ $item->motor->nama_motor }}</p>
                                    <p><strong>Jumlah:</strong> {{ $item->jumlah }}</p>
                                </div>
                                <div class="flex justify-between items-center text-gray-700">
                                    <p><strong>Tanggal Sewa:</strong> {{ $item->tanggal_sewa }}</p>
                                    <p><strong>Tanggal Kembali:</strong> {{ $item->tanggal_kembali }}</p>
                                </div>
                                <div class="flex justify-between items-center text-gray-700">
                                    <p><strong>Total Harga:</strong> Rp {{ number_format($item->total_harga, 2, ',', '.') }}</p>
                                    <p><strong>Metode Pembayaran:</strong> {{ strtoupper($item->metode_pembayaran) }}</p>
                                </div>
                                <div class="flex justify-between items-center text-gray-700">
                                    <p><strong>Status:</strong> 
                                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $item->status == 'pending' ? 'bg-yellow-400 text-white' : ($item->status == 'dibatalkan' ? 'bg-red-500 text-white' : 'bg-green-500 text-white') }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </p>
                                </div>

                                <div class="mt-6">
                                    <p class="text-gray-700 font-medium">Foto KTP:</p>
                                    <div class="mt-3 border border-gray-200 rounded-lg overflow-hidden">
                                        <img src="{{ asset('uploads/' . $item->foto_ktp) }}" alt="Foto KTP" class="w-full">
                                    </div>
                                </div>

                                @if($item->foto_bukti_pembayaran)
                                <div class="mt-6">
                                    <p class="text-gray-700 font-medium">Bukti Pembayaran:</p>
                                    <div class="mt-3 border border-gray-200 rounded-lg overflow-hidden">
                                        <img src="{{ asset('storage/' . $item->foto_bukti_pembayaran) }}" alt="Bukti Pembayaran" class="w-full">
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
    
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">Belum ada riwayat transaksi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="animate-pulse h-8 bg-gray-200 mb-2"></div>

    <div class="mt-8 text-right p-4">
        <h2 class="text-lg font-semibold mb-2">Waktu Terkini</h2>
        <p id="currentTime" class="font-light"></p>
    </div>


    @include('user.footer')

    <script>
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
            });
        });
    </script>

    <script>
        function updateTime() {
            const currentTime = new Date();
            document.getElementById('currentTime').innerText = currentTime.toLocaleString();
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>
</body>
</html>
