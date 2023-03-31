@extends('layouts.ItemLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('items.create') }}" class=" btn btn-primary mb-3">新規商品追加</a>
            <!-- 検索機能ここから -->
            <div>
                <form method="GET" action="">
                    @csrf
                    <input type="text" name="keyword">
                    <input type="submit" value="検索">
                </form>
            </div>
            <!-- 検索機能ここまで -->
            <table class="table table-bordered table-fixed">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>種別</th>
                        <th>詳細</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->type }}</td>

                        <td class="detail-cell">
                            <span class="detail-text">{{ Str::limit($item->detail, 20, '...') }}</span>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-{{ $item->id }}">詳細</button>
                        </td>

                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">編集</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Modal Component -->
                    <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" aria-labelledby="modal-{{ $item->id }}-label" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title w-100 text-center" id="modal-{{ $item->id }}-label">{{ $item->name }}</h5>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="閉じる"></button>
                        </div>
                        <div class="modal-body">
                            <p>【ID】{{ $item->id }}</p>
                            <p>【種別】<br> {{ $item->type }}</p>
                            <p>【詳細】<br> {{ $item->detail }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
            <!-- ページネーション -->
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection