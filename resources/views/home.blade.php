@extends('layouts.ItemLayout')

@section('content')
<div class="container h-100">
    <div class="d-flex flex-row w-100">

        <!-- メインコンテンツ -->
        <main class="w-100 align-items-center">
            <h2 class="p-3" id="animated-text"></h2>
            <h1 class="p-3" id="animated-text-2"></h1>
        </main>
    </div>
</div>

<script>
// ユーザー名を取得してアニメーションする
const username = '{{ $username }}';
const animatedText = document.getElementById('animated-text');
const animatedText2 = document.getElementById('animated-text-2');
animatedText.textContent = `ようこそ${username}さん、こちらはホーム画面です。`;
animatedText.classList.add('animation-typing');

// 一つ目のアニメーションが終わったら二つ目のアニメーションを開始する
animatedText.addEventListener('animationend', () => {
    animatedText.classList.remove('animation-typing');
    animatedText.style.borderRight = 'none';
    animatedText2.style.opacity = 1;
    animatedText2.textContent = 'もし、商品の一覧が確認したいならサイドバーの商品一覧を押してください。';
    animatedText2.classList.add('animation-typing-2');
});

// 二つ目のアニメーションが終わったらカーソルを消す
animatedText2.addEventListener('animationend', () => {
    animatedText2.style.borderRight = 'none';
});


</script>
@endsection