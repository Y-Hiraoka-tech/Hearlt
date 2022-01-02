@extends('layouts.mymusic')
@section('content')
<body style="background: #272525;color:white;">
    <nav style="display:flex; padding-top:3%;padding-left:2%;padding-bottom:10px;">
        <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$giftedmusic->user->user_image)}}" style="width:10%; border-radius:50%;vertical-align:middle;">
        <span class="ml-2">{{ $giftedmusic->user->username }}</span><span class="ml-2">からあなたへ</span>
        </p>
    </nav>
    <div style="width:80%;margin:0 auto">
    <div class="mb-3 target1" style="text-align: center;align-items: center;height:20rem;">
        <img src="{{asset('storage/uploads/'.$post->music_image)}}" style="width:100%">
    </div>
    <div class="mb-3 target2" style="background-color:rgba(255,255,255,0.3);text-align: center;align-items: center;height:20rem;width:100%;overflow:auto;">
        <p class="mb-1"style="margin-top:2rem">{{ $giftedmusic->user->username }}からあなたへ</p>
        <p style="white-space: pre-wrap;color: #F16D0E;">{{ $giftedmusic->message }}</p>
        <p class="mt-4 mb-2">- Lyrics -</p>
        <p style="white-space: pre-wrap;">{{ $post->music_lylic}}</p>
    </div>
    <div style="display: flex;">
        <h1 style="font-size:24px;">{{ $post->name }} </h1>
        <span class="button" style="margin:auto 0 auto auto;">
            <svg width="30" height="24" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.875 0.75H0.375V3.66667H17.875V0.75ZM17.875 6.58333H0.375V9.5H17.875V6.58333ZM0.375 15.3333H12.0417V12.4167H0.375V15.3333ZM20.7917 0.75V12.6792C20.3396 12.5188 19.8438 12.4167 19.3333 12.4167C16.9125 12.4167 14.9583 14.3708 14.9583 16.7917C14.9583 19.2125 16.9125 21.1667 19.3333 21.1667C21.7542 21.1667 23.7083 19.2125 23.7083 16.7917V3.66667H28.0833V0.75H20.7917Z" fill="#696969"/>
            </svg>
        </span>
    </div>
    <p style="font-size:14px;color:#7B7575;">{{$post->artist->name}}</p>

    <div class="player text-center" style="width: 100%;">
      <audio id="music" src="{{asset('storage/uploads/'.$post->music_file)}}"></audio>
        <input id="seekbar" type="range" min="0" value="0" style="width:100%">
      <div id="time" style="display: flex;">
        <span id="current">00:00</span>
        <span id="duration">00:00</span> 
      </div>
      <div class="control-item">
        <div id="pre">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.9837 8.33317V1.6665L11.6504 9.99984L19.9837 18.3332V11.6665C25.5004 11.6665 29.9837 16.1498 29.9837 21.6665C29.9837 27.1832 25.5004 31.6665 19.9837 31.6665C14.4671 31.6665 9.98372 27.1832 9.98372 21.6665H6.65039C6.65039 29.0332 12.6171 34.9998 19.9837 34.9998C27.3504 34.9998 33.3171 29.0332 33.3171 21.6665C33.3171 14.2998 27.3504 8.33317 19.9837 8.33317Z" fill="#696969"/>
            <path d="M18.1503 26.6665H16.7336V21.2331L15.0503 21.7498V20.5998L18.0003 19.5498H18.1503V26.6665Z" fill="#696969"/>
            <path d="M25.284 23.733C25.284 24.2663 25.234 24.733 25.1173 25.0996C25.0006 25.4663 24.834 25.7996 24.634 26.0496C24.434 26.2996 24.1673 26.483 23.884 26.5996C23.6006 26.7163 23.2673 26.7663 22.9006 26.7663C22.534 26.7663 22.2173 26.7163 21.9173 26.5996C21.6173 26.483 21.3673 26.2996 21.1506 26.0496C20.934 25.7996 20.7673 25.483 20.6506 25.0996C20.534 24.7163 20.4673 24.2663 20.4673 23.733V22.4996C20.4673 21.9663 20.5173 21.4996 20.634 21.133C20.7506 20.7663 20.9173 20.433 21.1173 20.183C21.3173 19.933 21.584 19.7496 21.8673 19.633C22.1506 19.5163 22.484 19.4663 22.8506 19.4663C23.2173 19.4663 23.534 19.5163 23.834 19.633C24.134 19.7496 24.384 19.933 24.6006 20.183C24.8173 20.433 24.984 20.7496 25.1006 21.133C25.2173 21.5163 25.284 21.9663 25.284 22.4996V23.733ZM23.8673 22.2996C23.8673 21.983 23.8506 21.7163 23.8006 21.4996C23.7506 21.283 23.684 21.1163 23.6006 20.983C23.5173 20.8496 23.4173 20.7496 23.284 20.6996C23.1506 20.6496 23.0173 20.6163 22.8673 20.6163C22.7173 20.6163 22.5673 20.6496 22.4506 20.6996C22.334 20.7496 22.2173 20.8496 22.134 20.983C22.0506 21.1163 21.984 21.283 21.934 21.4996C21.884 21.7163 21.8673 21.983 21.8673 22.2996V23.9163C21.8673 24.233 21.884 24.4996 21.934 24.7163C21.984 24.933 22.0506 25.1163 22.134 25.2496C22.2173 25.383 22.3173 25.483 22.4506 25.533C22.584 25.583 22.7173 25.6163 22.8673 25.6163C23.0173 25.6163 23.1673 25.583 23.284 25.533C23.4006 25.483 23.5173 25.383 23.6006 25.2496C23.684 25.1163 23.7506 24.933 23.784 24.7163C23.8173 24.4996 23.8506 24.233 23.8506 23.9163V22.2996H23.8673Z" fill="#696969"/>
          </svg>
        </div>
        <div id="play"><i class="fa fa-play fa-2x"></i></div>
        <div id="next">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M29.9998 21.667C29.9998 27.1837 25.5165 31.667 19.9998 31.667C14.4832 31.667 9.99984 27.1837 9.99984 21.667C9.99984 16.1503 14.4832 11.667 19.9998 11.667V18.3337L28.3332 10.0003L19.9998 1.66699V8.33366C12.6332 8.33366 6.6665 14.3003 6.6665 21.667C6.6665 29.0337 12.6332 35.0003 19.9998 35.0003C27.3665 35.0003 33.3332 29.0337 33.3332 21.667H29.9998Z" fill="#696969"/>
            <path d="M18.1 26.5669V19.4502H17.95L15 20.5002V21.6502L16.6833 21.1335V26.5669H18.1Z" fill="#696969"/>
            <path d="M20.4165 22.4007V23.634C20.4165 26.8007 22.5998 26.6673 22.8165 26.6673C23.0498 26.6673 25.2165 26.8173 25.2165 23.634V22.4007C25.2165 19.234 23.0332 19.3673 22.8165 19.3673C22.5832 19.3673 20.4165 19.2173 20.4165 22.4007ZM23.8165 22.2007V23.8173C23.8165 25.1007 23.4665 25.534 22.8332 25.534C22.1998 25.534 21.8332 25.1007 21.8332 23.8173V22.2007C21.8332 20.9507 22.1998 20.5173 22.8165 20.5173C23.4498 20.5007 23.8165 20.9507 23.8165 22.2007Z" fill="#696969"/>
          </svg>
        </div>
      </div>
    </div>
</div>
</body>
@endsection
