@extends('admin.layout.app')
@push('style')
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

        /* Form Container */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #007bff;
        }

        /* Nút hành động */
        .form-actions {
            display: flex;
            justify-content: space-between;
        }

        .btn-save {
            background-color: #8e44ad;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-save:hover {
            background-color: #732d91;
        }

        .btn-cancel {
            background-color: #e74c3c;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-cancel:hover {
            background-color: #c0392b;
        }
        #description {
            color: inherit;
            font-size: inherit;
        }


    </style>
    <style>
        .preview-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;margin-top:10px}
        .thumb{position:relative;border:1px solid #e5e7eb;border-radius:10px;overflow:hidden;background:#f9fafb}
        .thumb img{width:100%;height:120px;object-fit:cover;display:block}
        .thumb .name{display:block;font-size:12px;padding:6px 8px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
        .thumb .remove{position:absolute;top:6px;right:6px;border:0;border-radius:999px;cursor:pointer;
            width:24px;height:24px;line-height:24px;text-align:center;background:#ef4444;color:#fff;font-weight:700}
        @media (max-width:640px){.preview-grid{grid-template-columns:repeat(2,1fr)}}
    </style>

@endpush
@section('content')
    <div class="container">
        <h2 style="color:#000">Chỉnh sửa thiết kế ý tưởng</h2>

        <div class="form-container">
            <form id="designForm" action="{{ route('admin.updateCategory', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="input-group">
                    <label for="text">Tên danh mục</label>
                    <input type="text" id="text" name="name"
                           value="{{ old('name', $post->name) }}"
                           placeholder="Nhập tiêu đề" required>
                    @error('title')
                    <div style="color:#e11d48;font-size:12px">{{ $message }}</div>
                    @enderror
                </div>





                <div class="form-actions">
                    <button type="submit" class="btn-save">Update</button>
                    <a href="javascript:history.back()" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')

@endpush
