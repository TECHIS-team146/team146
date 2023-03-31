@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="d-flex flex-row w-100">
        <!-- サイドメニュー -->
        <nav class="bg-secondary">
            <ul class="nav flex-column m-0 p-5">
                <li class="nav-item mb-2">
                    <a href="{{ route('items.index') }}" class="p-5 text-white nav-link">商品一覧</a>
                </li>
            </ul>
        </nav>
        <!-- メインコンテンツ -->
        <main class="w-100 align-items-center">
            <div class="fs-4 fw-bold bg-light border shadow-sm">Dashboard</div>
            <h3 class="p-3">ようこそホーム画面へ</h3>
        </main>
    </div>
</div>
@endsection