@extends('admin.layout.app')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 style="color: #000">Quản Lý bán ý tưởng</h2>

        <div class="table-container">
            <button onclick="window,location.href='/admin/ban-y-tuong/create'" class="add-btn">Thêm bài viết</button>
            <table class="spin-table">
                <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Ngày tạo</th>
                    <th>Hành Động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $value)
                    <tr>
                        <td>{{$value->title}}</td>
                        <td>
                            @if($value->created_at)
                                {{ $value->created_at->format('d/m/Y') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.editSellIdeas', $value->id) }}" class="btn-edit">Sửa</a>
                            <form action="{{ route('admin.deleteSellIdeas', $value->id) }}" method="POST" style="display:inline;">
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
