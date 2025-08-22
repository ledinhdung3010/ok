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
        .form-input {
            width: 100%; /* Chiều rộng đầy đủ */
            padding: 12px 15px; /* Padding để tạo không gian bên trong */
            font-size: 16px; /* Cỡ chữ dễ đọc */
            line-height: 1.6; /* Đảm bảo không gian giữa các dòng */
            border: 1px solid #ddd; /* Đường viền mờ */
            border-radius: 8px; /* Bo góc */
            background-color: #f9f9f9; /* Màu nền sáng */
            color: #333; /* Màu chữ */
            box-sizing: border-box; /* Đảm bảo padding và border không vượt ngoài kích thước */
            resize: vertical; /* Cho phép người dùng thay đổi chiều cao */
            transition: all 0.3s ease; /* Hiệu ứng chuyển động mượt mà */
        }

        /* Hiệu ứng hover và focus */
        .form-input:focus {
            border-color: #007bff; /* Đổi màu viền khi được chọn */
            background-color: #fff; /* Màu nền sáng hơn khi focus */
            outline: none; /* Loại bỏ viền mặc định của trình duyệt */
        }

        /* Placeholder với màu sắc nhạt */
        .form-input::placeholder {
            color: #aaa; /* Màu nhạt cho placeholder */
            font-style: italic; /* Làm cho placeholder in nghiêng */
        }

        /* Khi nhập dữ liệu, text area sẽ có bóng đổ */
        .form-input:focus {
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3); /* Bóng đổ khi focus */
        }

        /* Thêm hiệu ứng khi hover vào text area */
        .form-input:hover {
            border-color: #007bff; /* Đổi màu viền khi hover */
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container--default .select2-selection--multiple {
            min-height: 40px;
            padding: 5px;
            font-size: 16px;
        }
        .select2-results__options{
            background: #ccc !important;
        }
        .select2-container {
            width: 100% !important;
        }
        .content-user{
            padding: 50px 20px 20px 120px !important
        }
        @media (max-width: 768px) {
            .content{
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
            .content-user{
                padding: 0 !important;
            }
            .table th, .table td {
                padding: 8px;
                font-size: 13px;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .btn {
                font-size: 12px;
                padding: 5px 10px;
            }
            .content-user {
                padding: 50px 10px 10px 10px !important;
            }
            img.img-thumbnail {
                width: 50px;
                height: auto;
            }
            .btn-warning {
                margin: 10px 0 !important;
            }
        }

    </style>
@endpush
@section('content')
    <div class="container">
        <h2 style="color:#000">Chỉnh sửa sản phẩm</h2>

        <div class="form-container">
            <form id="designForm" action="{{ route('admin.updateNew', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="input-group">
                    <label for="text">Tiêu đề</label>
                    <input type="text" id="text" name="title"
                           value="{{ old('title', $post->title) }}"
                           placeholder="Nhập tiêu đề" required>
                    @error('title')
                    <div style="color:#e11d48;font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="image">Hình ảnh</label>

                    <!-- Hiển thị ảnh hiện tại nếu có -->
                    @if ($post->image)
                        <div>
                            <img src="{{ asset('storage/'.$post->image) }}" alt="Current Image" width="100">
                        </div>
                    @endif

                    <!-- Input để tải ảnh mới lên -->
                    <input type="file" id="image" name="image" accept="image/*">
                    <small>Chỉ hỗ trợ JPG, PNG, GIF, WebP</small>

                    @error('image')
                    <div style="color:#e11d48;font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="description">Sơ lược nội dung </label>
                    <textarea class="form-input"  id="sort" name="sort" rows="3" placeholder="Nhập mô tả s lược ...">{{ old('sort',$post->sort) }}</textarea>
                    @error('sort')
                    <div style="color:#e11d48;font-size:12px">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="description">Nội dung tin tức</label>
                    <textarea id="description" name="desc" rows="8" placeholder="Nhập mô tả...">{!! old('desc', $post->desc) !!}</textarea>

                    @error('description')
                    <div style="color:#e11d48;font-size:12px">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Ảnh cũ --}}




                <div class="form-actions">
                    <button type="submit" class="btn-save">Update</button>
                    <a href="javascript:history.back()" class="btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
    <script>
        CKEDITOR.ClassicEditor.create(document.querySelector('#description'), {
            ckfinder: { uploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}" },

            toolbar: {
                items: [
                    'heading','|',
                    'bold','italic','underline','strikethrough','|',
                    'fontSize','fontColor','fontBackgroundColor','|',
                    'link','bulletedList','numberedList','|',
                    'imageUpload','undo','redo'
                ]
            },

            fontSize: { options: ['default', 12, 14, 16, 18, 24, 32, 48], supportAllValues: true },

            image: {
                toolbar: [
                    'imageTextAlternative','|',
                    'imageStyle:inline','imageStyle:block','imageStyle:side','|','linkImage'
                ]
            },

            removePlugins: [
                // AI (phải ghi đúng tên, viết hoa AI)
                'AIAssistant','AIAssistantUI',

                // Collaboration / thương mại khác
                'RealTimeCollaborativeComments','RealTimeCollaborativeTrackChanges','RealTimeCollaborativeRevisionHistory',
                'PresenceList','Comments','TrackChanges','TrackChangesData','RevisionHistory',
                'WProofreader','MathType','Pagination','DocumentOutline','TableOfContents',
                'MultiLevelList','FormatPainter','Template','SlashCommand','PasteFromOfficeEnhanced','CaseChange',

                // Không cần cho nhu cầu hiện tại (gọn nhẹ)
                'ExportPdf','ExportWord','ImportWord','ImportPdf','Mention','WordCount','Base64UploadAdapter'
            ]
        }).catch(console.error);
    </script>


@endpush
