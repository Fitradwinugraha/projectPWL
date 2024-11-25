<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi Penyewaan Motor</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    @include('user.navbar')

    <div class="container mx-auto mt-10  p-5 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-5">Riwayat Transaksi</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-4 border-b">No</th>
                    <th class="py-3 px-4 border-b">Motor</th>
                    <th class="py-3 px-4 border-b">Tanggal Sewa</th>
                    <th class="py-3 px-4 border-b">Tanggal Kembali</th>
                    <th class="py-3 px-4 border-b">Jumlah</th>
                    <th class="py-3 px-4 border-b">Total Harga</th>
                    <th class="py-3 px-4 border-b">Metode Pembayaran</th>
                    <th class="py-3 px-4 border-b">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse($transaksi as $key => $item)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4 border-b">{{ $key + 1 }}</td>
                    <td class="py-3 px-4 border-b">{{ $item->motor->nama_motor }}</td>
                    <td class="py-3 px-4 border-b">{{ $item->tanggal_sewa }}</td>
                    <td class="py-3 px-4 border-b">{{ $item->tanggal_kembali }}</td>
                    <td class="py-3 px-4 border-b">{{ $item->jumlah }}</td>
                    <td class="py-3 px-4 border-b">Rp {{ number_format($item->total_harga, 2, ',', '.') }}</td>
                    <td class="py-3 px-4 border-b">{{ strtoupper($item->metode_pembayaran) }}</td>
                    <td class="py-3 px-4 border-b">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $item->status == 'pending' ? 'bg-yellow-400 text-white' : ($item->status == 'dikonfirmasi' ? 'bg-green-500 text-white' : 'bg-red-500 text-white') }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-2">Belum ada riwayat transaksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('user.footer')
</body>
</html>