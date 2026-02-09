<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Pro</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Custom style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 12px;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ url('/') }}">📝 Todo List Pro</a>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary">Danh sách</a>
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Thêm Task</a>
                <form method="POST" action="{{ route('logout') }}" class="ms-1">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary">Đăng xuất</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- Bootstrap JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toast.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "2000",
            "extendedTimeOut": "1000"
        }
    </script>
    @stack('scripts')
</body>
</html>
