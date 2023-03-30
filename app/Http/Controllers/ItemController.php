<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        /* テーブルから全てのレコードを取得する */
        $items = Item::query();

        // キーワード検索処理
        $keyword = $request->input('keyword');

        //$keywordが空ではない場合、検索処理を実行
        if (!empty($keyword)) {
            $items->where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('type', 'LIKE', "%{$keyword}%");
            $items->Where('detail', 'LIKE', "%{$keyword}%");
        }

        /* ページネーション */
        // $posts = $items->paginate(20);
        // $items = Item::all();
        $items = $items->orderBy('id', 'desc')->paginate(20);
        // ページネーションと商品一覧用の変数をbladeに渡している
        return view('items.index', ['items' => $items]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'type' => 'required|max:255',
            'detail' => 'nullable|max:500',
        ]);
    
        // 現在のリクエストデータを取得し、user_id を追加
        $requestData = $request->all();
    
        // リクエストデータを使用してアイテムを作成
        auth()->user()->Item::items()->create($requestData);
    
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|max:100',
            'type' => 'required|max:255',
            'detail' => 'nullable|max:500',
        ]);

        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
