<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
        }

        .admin-wrapper {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            height: 100vh;
        }

        .sidebar-header h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
            border-radius: 5px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        h2 {
            color: #fff;
        }

        .section {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .section h3 {
            margin-bottom: 10px;
            font-size: 22px;
        }
        /* Sidebar */
        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
            border-radius: 5px;
        }

        /* Hiệu ứng cho mục active */
        .sidebar ul li.active a {
            background-color: #007bff;  /* Màu nền khi mục đang active */
            color: white;  /* Màu chữ khi mục active */
            border-radius: 5px;
        }
        .logout-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
        /* Cấu trúc container */
        .container {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Tiêu đề */
        h2 {
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
        }

        /* Nút thêm spin */
        .add-btn {
            background-color: #8e44ad;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .add-btn:hover {
            background-color: #732d91;
        }

        /* Bảng */
        .table-container {
            overflow-x: auto;
        }

        .spin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .spin-table th, .spin-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .spin-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #555;
        }

        .spin-table td {
            background-color: #fff;
        }

        /* Nút hành động */
        .btn-edit, .btn-delete {
            padding: 8px 15px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #3498db;
            margin-right: 10px;
        }

        .btn-edit:hover {
            background-color: #2980b9;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        /* Đảm bảo không có gạch dưới trong các liên kết */
        .btn-edit, .btn-delete {
            display: inline-block;
        }
        /* Thông báo thành công */
        .alert {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: opacity 0.3s ease-in-out;
        }

        .alert-success {
            background-color: #28a745; /* Màu xanh lá */
            color: white;
            border-left: 5px solid #155724;
        }

        .alert-success:hover {
            background-color: #218838;
            cursor: pointer;
        }

        .alert-success .alert-icon {
            font-size: 18px;
            margin-right: 10px;
        }

        .alert .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            font-size: 20px;
            color: white;
            cursor: pointer;
        }

        .alert .close-btn:hover {
            color: #aaa;
        }


    </style>
    @stack('style')
</head>
<body>
<div class="admin-wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Admin Panel</h2>
        </div>
        <ul>

            <li  class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="{{ request()->routeIs(['desginProduct','createDesginProduct','admin.editDesginProduct']) ? 'active' : '' }}"><a href="{{route('desginProduct')}}">Thiết kế sản phẩm</a></li>
            <li class="{{ request()->routeIs(['desginIdeas','createDesginIdeas','admin.editDesginIdeas']) ? 'active' : '' }}"><a href="{{route('desginIdeas')}}">Thiết kế ý tưởng</a></li>
            <li class="{{ request()->routeIs(['sellIdeas','createSellIdeas','admin.editSellIdeas']) ? 'active' : '' }}"><a href="{{route('sellIdeas')}}">Bán ý tưởng</a></li>
            <li class="{{ request()->routeIs(['category','createCategory','admin.editCategory']) ? 'active' : '' }}"><a href="{{route('category')}}">Danh mục sản phẩm</a></li>
            <li class="{{ request()->routeIs(['product','createProduct','admin.editProduct']) ? 'active' : '' }}"><a href="{{route('product')}}">Bán sản phẩm</a></li>
            <li class="{{ request()->routeIs(['new','createNew','admin.editNew']) ? 'active' : '' }}"><a href="{{route('new')}}">Tin tức</a></li>
            <li class="{{ request()->routeIs(['company','admin.updateCompany']) ? 'active' : '' }}"><a href="{{route('company')}}">Giới thiệu</a></li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Đăng xuất</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
</div>
@stack('script')
</body>
</html>
