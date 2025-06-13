<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simon Kehadiran</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background-color: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }

    .sidebar {
      height: 100vh;
      background-color: #4a148c;
      padding-top: 1rem;
      position: fixed;
      width: 240px;
      color: white;
    }

    .sidebar a {
      color: white;
      display: block;
      padding: 12px 20px;
      text-decoration: none;
      transition: 0.2s;
    }

    .sidebar a:hover {
      background-color: #6a1b9a;
    }

    .sidebar .logo {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      padding-bottom: 20px;
      border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    .main-content {
      margin-left: 240px;
      padding: 30px;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .alert {
      border-radius: 10px;
    }

    footer {
      text-align: center;
      margin-top: 50px;
      color: #777;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <div class="logo mb-3">
      Simon Kehadiran
    </div>
    <a href="/mahasiswa"><i class="bi bi-people-fill mr-2"></i>Mahasiswa</a>
    <a href="/matkul"><i class="bi bi-person-badge-fill mr-2"></i>Matkul</a>
  </div>

  <div class="main-content">
    @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div>
    @endif

    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="card p-4">
      @yield('content')
    </div>

    <footer class="mt-4">
      &copy; Simon Kehadiran
    </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
  <script>
    new DataTable('#DataTable');
  </script>
</body>
</html>
