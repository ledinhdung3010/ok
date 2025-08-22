@extends('admin.layout.app')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 style="color: #000">Quản Lý sản phẩm bán</h2>

        <div class="table-container">
            <button onclick="window,location.href='/admin/product/create'" class="add-btn">Thêm sản phẩm</button>
            <table class="spin-table">
                <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Ngày tạo</th>
                    <th>Hành Động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $value)
                    <tr>
                        <td>{{$value->title}}</td>
                        <td>
                            @php
                                // Chuyển category_id từ chuỗi thành mảng
                                $categoryIds = explode(',', $value->category_id);

                                // Lấy tên các danh mục từ bảng category_product
                                $categories = \App\Models\CategoryProduct::whereIn('id', $categoryIds)->pluck('name');
                            @endphp

                                <!-- Hiển thị các tên danh mục -->
                            @foreach($categories as $category)
                                <span>{{ $category }}</span>@if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>
                            @if($value->created_at)
                                {{ $value->created_at->format('d/m/Y') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.editProduct', $value->id) }}" class="btn-edit">Sửa</a>
                            <form action="{{ route('admin.deleteProduct', $value->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>


                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
