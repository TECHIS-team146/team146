@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row w-100" style="height: calc(100% - 50px)">
        <!-- サイドメニュー -->
        <nav class="bg-darkgray">
            <ul class="nav flex-column m-0 p-3">
                <li class="nav-item mb-2"><a href="{{ route('items.index') }}" class="nav-link">商品一覧</a></li>
            </ul>
        </nav>
        <!-- メインコンテンツ -->
        <main class="w-100 bg-light">
            <!-- タイトルバー -->
            <div class="border shadow-sm d-flex flex-row align-items-center bg-light">
                <div class="navbar-brand toggle-menu">
                    <button class="btn btn-light btn-sm" id="toggle"><i class="fas fa-bars fa-lg"></i></button>
                </div>
                <div class="fs-4 fw-bold">Dashboard</div>
            </div>
        </main>
    </div>
</div>
@endsection