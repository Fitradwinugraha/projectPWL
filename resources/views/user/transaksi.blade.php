<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @include('user.navbar')
    
    <section class="bg-[#eee] p-6">
        <div class="flex flex-col justify-center items-center">
            <h1>Transaksi Page</h1>
        </div>
    </section>

    @include('user.footer')
</body>
</html>