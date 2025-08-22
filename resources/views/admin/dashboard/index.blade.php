@extends('admin.layout.app')

@section('content')
    <style>
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 ô / dòng */
            gap: 16px;
        }
        .stat-box {
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            font-weight: 600;
            text-align: center;
        }
        .stat-title { font-size: 14px; margin-bottom: 6px; }
        .stat-value { font-size: 22px; font-weight: 700; }

    </style>

    <div class="container mt-4">
        <h2 style="color: #000;margin-bottom: 50px">Thống kê website</h2>
        <div class="stat-grid">

            @foreach($posts as $cate =>$total)
                @php
                    // map id -> màu
                    $colors = [
                        1 => '#ec4899', // hồng
                        2 => '#a855f7', // tím
                        3 => '#14b8a6', // xanh ngọc
                    ];

                    // map id -> tên hiển thị
                    $names = [
                        1 => 'Thiết kế sản phẩm',
                        2 => 'Thiết kế ý tưởng',
                        3 => 'Bán ý tưởng',
                    ];


                    $bg = $colors[$cate] ?? '#3b82f6'; // default xanh
                    $title = $names[$cate] ?? 'Danh mục khác';
                @endphp

                <div class="stat-box" style="background:{{ $bg }}">
                    <div class="stat-title">{{ $title }}</div>
                    <div class="stat-value">{{ number_format($total) }} Bài viết</div>
                </div>
            @endforeach
            @if($news>0)
                    <div class="stat-box" style="background:#ccc">
                        <div class="stat-title">Tin tức</div>
                        <div class="stat-value">{{ number_format($news) }} Bài viết</div>
                    </div>
                @endif
                @if($product>0)
                    <div class="stat-box" style="background:#00FFFF">
                        <div class="stat-title">Sản phẩm</div>
                        <div class="stat-value">{{ number_format($product) }}</div>
                    </div>
                @endif


        </div>

    </div>
@endsection
