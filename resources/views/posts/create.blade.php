@extends('layouts.postscreate')
@section('title', 'create page')

@section('content')
<script src="js/jquery-1.9.1.js" type="text/javascript"></script>
        <!-- メイン -->
        <body style="background: #272525;color:white;">
            <form action="/posts/store" method="post" enctype="multipart/form-data" style="background: #272525;color:white;">
                {{ csrf_field() }}
                <div style="padding:7% 7%;border-bottom:solid 1px;">         
                    <p style="margin-bottom: 0;">
                    <label style="width:30%;">
                        <img id="preview" src="{{asset('storage/uploads/ONZOprofile.png')}}" style="width:100%;">
                        <input type="file" name="music_image" accept="image/png, image/jpeg" onchange="previewImage(this);" hidden/>
                    </label>
                    <span id="name1" style="margin-left:15%;font-size:20px;">曲名</span>
                    </p>
                </div>
                
            <div class="form-group" style="width:80%;margin:0 auto;padding-top:5%;">
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">曲名</p>
                    <input type="text" id="name" class="name-control" name="name" style="background-color:#7B7575;width:100%;border-radius:10px;" placeholder="入力" onkeyup="document.getElementById('name1').innerText = document.getElementById('name').value;">
                </div>
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">歌詞</p>
                    <textarea name="music_lylic"　placeholder="入力" rows="2" style="background-color:#7B7575;width:100%;border-radius:10px;"></textarea>
                </div>
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">音源データ</p>
                    <label id="music" style="width: 100%;">
                    <input id="music_name" type="text" placeholder="+音源データ"style="background-color:#7B7575;border-radius:10px;padding: 3px;width:100%;" readonly/>
                    <input type="file" id="music_file" name="music_file" style="display:none;"/ onchange="changemusic_file()">
                    </label>
                </div>
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">試聴データ（15秒）</p>
                    <label id="musictrial" style="width: 100%;">
                    <input id="trial_name" type="text" placeholder="+試聴データ（15秒）"style="background-color:#7B7575;border-radius:10px;padding: 3px;width:100%;" readonly/>
                    <input type="file" id="music_trial" name="music_trial" style="display:none;"/ onchange="changemusic_trial()">
                    </label>
                </div>
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">曲単価</p>
                    <select class="ticket-select" name="music_ticket" style="background:#7B7575;color:#444444;border-radius:10px;padding: 3px;width:100%;">
                        <option selected>ギフト券枚数</option>
                        <option value="1">１枚</option>
                        <option value="2">２枚</option>
                        <option value="3">３枚</option>
                    </select>
                </div>
                    <div class="text-center" style="margin-top: 15%;">
                        <input class="btn" type="submit" value="投稿する" style="background-color: #F16D0E;color:white;">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
            </div>
            </form>
            @extends('layouts.app_footer')
        </body>
<script>
    function previewImage(obj)
    {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }

///音源ファイル 
        jQuery(function($) {
            jQuery("#music").click(function() {
                var music_file = document.getElementById("music_file");
                music_file.click();
            });
        });
        function changemusic_file() {
            // ファイル名のみ取得して表示します
            var music_file = document.getElementById("music_file").value;
            var regex = /\\|\\/;
            var array = music_file.split(regex);
            document.getElementById("music_name").value = array[array.length - 1];	
        }

///トライアル音源
    jQuery(function($) {
        jQuery("#musictrial").click(function() {
            var music_trial = document.getElementById("music_trial");
            music_trial.click();
        });
    });
    function changemusic_trial() {
        // ファイル名のみ取得して表示します
        var music_trial = document.getElementById("music_trial").value;
        var regex = /\\|\\/;
        var array = music_trial.split(regex);
        document.getElementById("trial_name").value = array[array.length - 1];	
    }
</script>
<style>
::-webkit-input-placeholder {
        color:#444444 ;
        opacity: 1;
    }
</style>

@endsection