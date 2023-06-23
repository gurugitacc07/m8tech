<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional stylesheets or scripts can be included here -->
    <style>
        /* Custom styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #f8f9fa;
            padding: 10px;
        }

        header .navbar-brand {
            font-weight: bold;
        }

        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            min-height: 100vh;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: #000;
            text-decoration: none;
        }

        .content {
            padding: 20px;
            min-height: 100vh;
        }
    </style>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <!-- Header -->
    <header class="navbar navbar-expand-lg">
        <div class="container-fluid" style="gap: 35px;">
            <a class="navbar-brand" href="#">MI Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end;">
                <ul class="navbar-nav ml-auto">
                    <!-- Add your header navigation links here -->

                    <li class="nav-item">
                       <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </header>

    <!-- Sidebar and Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <aside class=" sidebar" style=" width: 10%;">
                <!-- Add your sidebar content here  -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category')}}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subcategory')}}">Sub Category</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('products.index')}}">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('invoices.index')}}">invoices</a>
                    </li>
                </ul>
            </aside>

            <!-- Content -->
            <main class="col content">
                <!-- Add your main content here -->
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/js/bootstrap.bundle.min.js"></script>
    <!-- Additional scripts can be included here -->
</body>
</html>
