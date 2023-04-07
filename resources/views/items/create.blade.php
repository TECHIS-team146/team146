@extends('layouts.ItemLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>商品登録</h1>
            <form action="{{ route('items.store') }}" method="POST" onsubmit="document.getElementById('submit-button').disabled=true;">
                @csrf
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="type">種別</label>
                    <input type="text" class="form-control" id="type" name="type">
                </div>
                <div class="form-group">
                    <label for="detail">詳細</label>
                    <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="submit-button">登録</button>
            </form>
        </div>
    </div>
</div>
@endsection

