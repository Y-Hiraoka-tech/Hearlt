@extends('layouts.gift')
@section('title', 'detail page')

@section('content')
<body style="background: #272525;color:white;">
                <div style="padding:7% 7%;border-bottom:solid 1px;">
                    <div> 
                        <img id="preview" src="{{asset('storage/uploads/'.$post->music_image)}}" style="width:30%;display:inline-block;">
                        <p style="display:inline-block;vertical-align:middle;text-align:center;width:65%;">{{ $post->name }}<br>{{ $post->artist->name }}</p>
                    </div>
                    <div>
                        <p style="text-align: right;margin-bottom:0;">ticket：{{ $post->music_ticket }}</p>
                    </div>
                </div>
         <form action="{{ route('gift.store',$post->id) }}"  method="post">       
            <div class="form-group" style="width:80%;margin:0 auto;padding-top:5%;">
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">送信先の選択</p>
                    <label style="width: 100%;">
                        <a href="{{ url('/gift/form/'.$post->id.'/users') }}">
                        <input  name="gifted_user_id" type="hidden" value="{{ $value?$value:null }}">
                        @if($user === NULL)
                        <input name="gifted_user_name" type="text" value="" style="background-color:#7B7575;border-radius:10px;padding: 3px;width:100%;"  readonly/>
                        @else
                        <input name="gifted_user_name" type="text" value="{{ $user->name?$user->name:null }}" style="background-color:#7B7575;border-radius:10px;padding: 3px;width:100%;"  readonly/>
                        @endif
                        </a>  
                    </label>
                </div>
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">メッセージ入力欄</p>
                    <textarea name="message"　placeholder="メッセージを入力" rows="2" style="background-color:#7B7575;width:100%;border-radius:10px;"></textarea>
                </div>
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">歌詞の選択</p>
                    <textarea name="lyric"　placeholder="歌詞選択" rows="2" style="background-color:#7B7575;width:100%;border-radius:10px;"></textarea>
                </div>

                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">アナログ・デジタルの選択</p>
                    <select id="method" class="method" name="method" onchange="entryChange2();" style="background:#7B7575;color:#444444;border-radius:10px;padding: 3px;width:100%;">
                        <option selected>選択</option>
                        <option value="1">アナログ</option>
                        <option value="2">デジタル</option>
                    </select>
                </div>
                <div id="address" style="margin-top: 1rem;">
                    <p style="margin-bottom: 0;">住所を入力してください</p>
                    <input name="address" style="background-color:#7B7575;width:100%;border-radius:10px;">
                </div>
                 <div class="text-center" style="margin-top: 15%;">
                    <input class="btn" type="submit" value="GIFT" style="background-color: #F16D0E;color:white;">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
            </div>
        </form>
        <script>
        var address = document.getElementById('address')
        address.style.display = "none";
        function entryChange2(){
            if(document.getElementById('method')){
                id = document.getElementById('method').value;
                if(id == '1'){
                    address.style.display = "block";
                }
                if(id == '2'){
                    address.style.display = "none";
                }
            }
        }
        </script>
</body>
@endsection