@extends('layouts.music')
@section('title', 'detail page')

@section('content')
<body style="background: #272525;color:white;">
<div style="width:80%;margin:2.5rem auto 0 auto">
    <div class="mb-3 target1" style="text-align: center;align-items: center;height:20rem;">
        <img src="{{asset('storage/uploads/'.$post->music_image)}}" style="height:100%">
    </div>
    <div class="mb-3 target2" style="background-color:rgba(255,255,255,0.3);text-align: center;align-items: center;height:20rem;width:100%">
        <p style="margin-top:1.5rem">{{ $post->music_lylic}}</p>
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

    <div>
        <audio src="{{asset('storage/uploads/'.$post->music_trial)}}"></audio>
        <div id="play">Play</div>
        <div id="stop">Stop</div>
        <div id="skip">SKIP</div>
        <div id="time">
            <span id="current">00:00</span>
            <span id="duration">00:00</span> 
            <div id="seekbar"></div>
        </div>
    </div>
    
   
    <div class="text-center">
        <p>ticket：{{ $post->music_ticket }}</p>
    </div>
</div>
</body>
<style>
#time{
  margin: 0 1em;
}
#current, #duration {
  padding: 0;
  margin: .2em;
}
.target1.is-hidden {
  display: none;
}
.target2{
    display:none;
}
.target2.is-appear{
    display:inline-block;
}
audio {
      display: none
}
#play, #stop, #skip {
      display: inline-block;
      width: 60px;
      height: 60px;
      margin: 1em;
      border-radius: 50%;
      background: black;
      text-align: center;
      line-height: 60px;
      cursor: pointer;
    }
    #play:hover, #stop:hover {
      background: #eee;
    }
    #time {
      margin: 0 1em;
    }
    #current, #duration {
      padding: 0;
      margin: .2em;
    }
    #seekbar {
      width: 160px;
      height: 10px;
      margin: 1em;
      border-radius: 5px;
      background: linear-gradient(#ccc, #ccc) no-repeat #eee;
    }
</style>
<script>
    var $target1 = document.querySelector('.target1')
    var $target2 = document.querySelector('.target2')
    var $button = document.querySelector('.button')
    $button.addEventListener('click', function() {
    $target1.classList.toggle('is-hidden')
    $target2.classList.toggle('is-appear')
    })

    const audio = document.getElementsByTagName("audio")[0]
    const playButton = document.getElementById("play")
    const stopButton = document.getElementById("stop")
    const skipButton = document.getElementById("skip")
    
    playButton.addEventListener('click', () => {
      if (audio.paused) {
        audio.play()
        play.innerHTML = play.innerHTML === 'Play' ? 'Pause' : 'Play'
      } else {
        audio.pause()
        play.innerHTML = 'Play'
      }
    })
    stopButton.addEventListener('click', () => {
      audio.pause()
      audio.currentTime = 0
    })
    skipButton.addEventListener('click', () => {
        audio.currentTime += 15
    })

    audio.addEventListener("timeupdate", (e) => {
      const current = Math.floor(audio.currentTime)
      const duration = Math.round(audio.duration)
      if(!isNaN(duration)){
        document.getElementById('current').innerHTML = playTime(current)
        document.getElementById('duration').innerHTML = playTime(duration)
        const percent = Math.round((audio.currentTime/audio.duration)*1000)/10
        document.getElementById('seekbar').style.backgroundSize = percent + '%'
      }
    })

    document.getElementById('seekbar').addEventListener("click", (e) => {
      const duration = Math.round(audio.duration)
      if(!isNaN(duration)){
        const mouse = e.pageX
        const element = document.getElementById('seekbar')
        const rect = element.getBoundingClientRect()
        const position = rect.left + window.pageXOffset
        const offset = mouse - position
        const width = rect.right - rect.left
        audio.currentTime = Math.round(duration * (offset / width))
      }
    })





    function playTime (t) {
      let hms = ''
      const h = t / 3600 | 0
      const m = t % 3600 / 60 | 0
      const s = t % 60
      const z2 = (v) => {
        const s = '00' + v
        return s.substr(s.length - 2, 2)
      }
      if(h != 0){
        hms = h + ':' + z2(m) + ':' + z2(s)
      }else if(m != 0){
        hms = z2(m) + ':' + z2(s)
      }else{
        hms = '00:' + z2(s)
      }
      return hms
    }
</script>
@endsection