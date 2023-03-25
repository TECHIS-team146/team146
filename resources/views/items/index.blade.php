@extends('layouts.ItemLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('items.create') }}" class=" btn btn-primary mb-3">新規商品追加</a>
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>種別</th>
                        <th>詳細</th>
                        <!-- <th>追加ユーザー</th> -->
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->detail }}</td>
                        <!-- <td>{{ $item->user->name }}</td> -->
                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">編集</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection