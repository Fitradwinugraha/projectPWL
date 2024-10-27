<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}"> 
    <link rel="stylesheet" href="{{ asset('assets/css/content.css') }}"> 
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @yield('sidebar')
        

        <!-- Konten Utama -->
        <div class="content p-4 w-100">
            @yield('content')
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
