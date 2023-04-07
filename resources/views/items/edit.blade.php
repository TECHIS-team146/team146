@extends('layouts.ItemLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>商品編集</h1>
            <form action="{{ route('items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                </div>
                <div class="form-group">
                    <label for="type">種別</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $item->type }}">
                </div>
                <div class="form-group">
                    <label for="detail">詳細</label>
                    <textarea class="form-control" id="detail" name="detail" rows="3" >{{ $item->detail }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">更新</button>
            </form>
        </div>
    </div>
</div>
@endsection

