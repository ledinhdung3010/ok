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
        <h2 style="color: #000">Tạo bán ý tưởng mới</h2>

        <div class="form-container">
            <form action="{{ route('admin.storeSellIdeas') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="input-group">
                    <label for="text">Tiêu đề</label>
                    <input type="text" id="text" name="title" placeholder="Nhập tiêu đề" required>
                    @error('title')
                    <div style="color:#e11d48;font-size:12px">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="description">Mô tả bài viết</label>
                    <textarea id="description" name="description" rows="8" placeholder="Nhập mô tả...">{{ old('description') }}</textarea>
                    @error('description')
                    <div style="color:#e11d48;font-size:12px">{{ $message }}</div>
                    @enderror
                </div>



                <div class="input-group">
                    <label for="images">Hình ảnh (nhiều ảnh)</label>
                    <input type="file" id="images" name="image[]" accept="image/*" multiple>
                    <small>Hỗ trợ JPG/PNG/WebP/GIF • Tối đa 10 ảnh • ≤ 5MB/ảnh</small>
                    @error('image')
                    <div style="color:#e11d48;font-size:12px">{{ $message }}</div>
                    @enderror
                    @error('image.*')
                    <div style="color:#e11d48;font-size:12px">{{ $message }}</div>
                    @enderror
                    <div id="preview" class="preview-grid"></div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-save">Save</button>
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





    <script>
        const input = document.getElementById('images');
        const preview = document.getElementById('preview');
        const MAX_FILES = 10;
        const MAX_SIZE = 50 * 1024 * 1024; // 5MB
        let currentFiles = [];

        // render thumbnails
        function render() {
            preview.innerHTML = '';
            currentFiles.forEach((file, i) => {
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement('div');
                    div.className = 'thumb';
                    div.innerHTML = `
        <img src="${e.target.result}" alt="">
        <button type="button" class="remove" data-index="${i}">×</button>
        <span class="name" title="${file.name}">${file.name}</span>
      `;
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }

        // when user selects files
        input.addEventListener('change', (e) => {
            const chosen = Array.from(e.target.files);

            // validate + merge (không vượt quá MAX_FILES)
            const merged = [...currentFiles, ...chosen].slice(0, MAX_FILES);
            const valid = merged.filter(f => f.type.startsWith('image/') && f.size <= MAX_SIZE);

            if (merged.length !== valid.length) {
                alert('Một số ảnh không đúng định dạng hoặc > 5MB nên đã bỏ qua.');
            }

            currentFiles = valid;

            // cập nhật lại FileList cho input bằng DataTransfer
            const dt = new DataTransfer();
            currentFiles.forEach(f => dt.items.add(f));
            input.files = dt.files;

            render();
        });

        // remove one file
        preview.addEventListener('click', (e) => {
            if (!e.target.classList.contains('remove')) return;
            const idx = Number(e.target.dataset.index);
            currentFiles.splice(idx, 1);
            const dt = new DataTransfer();
            currentFiles.forEach(f => dt.items.add(f));
            input.files = dt.files;
            render();
        });
    </script>

@endpush
