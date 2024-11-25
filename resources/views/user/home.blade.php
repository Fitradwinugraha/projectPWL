@extends('layouts.user')

@section('banner')
    <section class="bg-[#eee] py-24">
        <div class="container mx-auto flex flex-col items-center justify-center p-6">
            <div class="w-full md:w-1/2 flex justify-center mb-6 md:mb-0">
                <img src="{{ asset('assets/img/logos.png') }}" alt="logo" class="max-w-full h-auto" />
            </div>
            <div class="w-full md:w-1/2 text-center mt-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">
                    Dare to Dream, Strive for Greatness
                </h1>
                <div class="mt-10">
                    <a href="#about" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('about') 
    <section class="bg-gray-800 p-6 " id="about">
        <div class="container mx-auto flex flex-col justify-center items-center px-4 py-10">
            <div class="relative flex flex-col items-center justify-center mt-4 mb-10">
                <h1 class="absolute text-6xl md:text-8xl font-extrabold text-gray-300 opacity-25 select-none">
                    About
                </h1>
                <h1 class="relative text-2xl md:text-4xl font-extrabold text-white">
                    About Us
                </h1>
            </div>
            <div class="text-white">
                <h1 class="text-2xl font-bold mb-4">Apa itu Swift Bike ?</h1>
                <p class="text-justify">
                Swift Bike adalah layanan penyewaan motor terpercaya yang berkomitmen untuk memberikan pengalaman berkendara yang nyaman dan aman bagi setiap pelanggan. Kami memahami kebutuhan Anda akan transportasi yang fleksibel dan efisien, baik untuk keperluan pribadi maupun bisnis.
                </p>
                <p class="text-justify">
                Dengan berbagai pilihan motor terbaru dan berkualitas, kami menawarkan tarif sewa yang kompetitif dan layanan pelanggan yang ramah. Tim kami siap membantu Anda memilih motor yang sesuai dengan kebutuhan Anda, serta memberikan informasi dan tips berkendara yang berguna.
                </p>
            </div>
            <div class="flex flex-col lg:flex-row lg:justify-between w-full mt-7 text-white">
                <div class="md:w-1/2">
                    <h1 class="text-2xl font-bold mb-4">Keuntungan yang apa saja yang didapatkan jika menggunakan Swift Bike !</h1>
                    <div class="mb-10">
                        <ul class="text-justify list-disc px-4">
                            <li>Kualitas Terbaik</li>
                            <li>Harga Bersaing</li>
                            <li>Proses Sewa Mudah</li>
                            <li>Proses Cepat</li>
                        </ul>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('assets/img/logos.png') }}" alt="logo" class="max-w-full h-[75px]"/>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="bg-[#eee] p-6">
        <div class="relative flex flex-col items-center justify-center mt-4 mb-10">
            <h1 class="absolute text-6xl md:text-8xl font-extrabold text-gray-300 opacity-75 select-none">
                Available
            </h1>
            <h1 class="relative text-2xl md:text-4xl font-extrabold text-gray-800">
                BIKES
            </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="bikes">
            @foreach($motors as $motor)
                <div class="card bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('uploads/' . $motor->foto_motor) }}" alt="{{ $motor->nama_motor }}" class="w-full h-48 object-cover" style="width: 300px; height: 300;">
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900">{{ $motor->nama_motor }} {{ $motor->tahun_pembuatan }}</h3>
                        <p class="text-gray-700">{{ $motor->merek_motor }}</p>
                        <p class="text-red-700">Unit Tersedia: {{ $motor->jumlah }}</p>
                        <p class="text-green-500 font-semibold mt-2">Rp {{ number_format($motor->harga_sewa, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center justify-center py-4">
                    <button onclick="window.location.href='{{ route('transaksi', $motor->id) }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">Pesan Sekarang</button>
                        <a href="https://wa.me/6281375839812" target="_blank">
                            <i class="fab fa-whatsapp text-2xl bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 border rounded inline-block ml-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
