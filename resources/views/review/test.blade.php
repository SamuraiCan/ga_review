<!DOCTYPE HTML>
<html>

<head>
    <title>レビュー投稿</title>

 <!-- Fonts -->
 <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="{{ asset('css/ga_review.css') }}" rel="stylesheet">
<!-- Styles -->
<style>
</style>
</head>

<body>
    <h2>タイトルの評価をお願いします</h2>
    <br>

    <form method="POST">
      @csrf
        <!-- 10段階評価 -->
      <div class="form-group row">
            <label for="radio01" class="col-md-4 col-form-label text-md-right">グラフィック</label>
            <div class="col-md-6">
               @for($i=1;$i <= 10;$i++)
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" id="graphic-{{ $i }}" name="graphic" value="{{ $i }}">
                     <label class="form-check-label" for="inlineRadio01">{{ $i }}点</label>
                  </div>
               @endfor
               <br>

               <label for="radio01" class="col-md-4 col-form-label text-md-right">ゲームボリューム</label>
            <div class="col-md-6">
               @for($i=1;$i <= 10;$i++)
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" id="volume-{{ $i }}" name="volume" value="{{ $i }}">
                     <label class="form-check-label" for="inlineRadio01">{{ $i }}点</label>
                  </div>
               @endfor
               <br>

            <label for="radio01" class="col-md-4 col-form-label text-md-right">サウンド</label>
            <div class="col-md-6">
               @for($i=1;$i <= 10;$i++)
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" id="sound-{{ $i }}" name="sound" value="{{ $i }}">
                     <label class="form-check-label" for="inlineRadio01">{{ $i }}点</label>
                  </div>
               @endfor
               <br>

            <label for="radio01" class="col-md-4 col-form-label text-md-right">ストーリー</label>
            <div class="col-md-6">
               @for($i=1;$i <= 10;$i++)
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" id="story-{{ $i }}" name="story" value="{{ $i }}">
                     <label class="form-check-label" for="inlineRadio01">{{ $i }}点</label>
                  </div>
               @endfor
               <br>
               <label for="radio01" class="col-md-4 col-form-label text-md-right">快適さ</label>
            <div class="col-md-6">
               @for($i=1;$i <= 10;$i++)
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" id="comfort-{{ $i }}" name="comfort" value="{{ $i }}">
                     <label class="form-check-label" for="inlineRadio01">{{ $i }}点</label>
                  </div>
               @endfor

        </div>
        <br>

        <!-- 総合評価 -->
        <h2>総合評価</h2>
        <select name="score" class="form-control m-2 review-score-color">
            <option value="5" class="review-score-color">★★★★★</option>
            <option value="4" class="review-score-color">★★★★</option>
            <option value="3" class="review-score-color">★★★</option>
            <option value="2" class="review-score-color">★★</option>
            <option value="1" class="review-score-color">★</option>
         </select>
         <br>

        <!-- プレイ機器 -->
        <div class="form-group row">
            <label for="chk01" class="col-md-4 col-form-label text-md-right">プレイ機器</label>
            <div class="col-md-6">
                <div class="form-check from-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlinechk01" name="chkGrp01" value="1">
                    <label class="form-check-label" for="inlinechk01">Switch</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlinechk02" name="chkGrp02" value="2">
                    <label class="form-check-label" for="inlinechk02">PS4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlinechk03" name="chkGrp03" value="3">
                    <label class="form-check-label" for="inlinechk03">PS5</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlinechk04" name="chkGrp04" value="4">
                    <label class="form-check-label" for="inlinechk04">PC</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlinechk05" name="chkGrp05" value="5">
                    <label class="form-check-label" for="inlinechk05">その他</label>
                </div>
            </div>
        </div>
        <br>

        <!-- レビューエリア -->
        <p>レビュー</p>
        <textarea name="review" rows="7" cols="70"></textarea>
        <br>
      
         <x-jet-button class="ml-4">
                    {{ __('投稿') }}
                </x-jet-button>
    </form>
</body>

</html>