var $target1 = document.querySelector('.target1')
var $target2 = document.querySelector('.target2')
var $button = document.querySelector('.button')
$button.addEventListener('click', function() {
$target1.classList.toggle('is-hidden')
$target2.classList.toggle('is-appear')
})

//定義
var audio = document.querySelector("#music");
const preButton = document.querySelector("#pre")
const playButton = document.querySelector("#play")
const skipButton = document.querySelector("#next")
var seekbar = document.getElementById('seekbar')

//再生・停止
playButton.addEventListener('click', () => {
  if (audio.paused) {
    audio.play()
    play.innerHTML = play.innerHTML === '<i class="fa fa-play fa-2x"></i>' ? '<i class="fa fa-pause fa-2x"></i>' : '<i class="fa fa-play fa-2x"></i>'
  } else {
    audio.pause()
    play.innerHTML = '<i class="fa fa-play fa-2x"></i>'
  }
})
preButton.addEventListener('click', () => {
  audio.pause()
  audio.currentTime -= 10
  audio.play()
})


skipButton.addEventListener('click', () => {
  audio.pause()
  audio.currentTime += 10
  audio.play()
})

audio.addEventListener('timeupdate', () => {
  var current = Math.floor(audio.currentTime)
  var duration = Math.round(audio.duration)
  seekbar.setAttribute("max", duration)
  seekbar.value = audio.currentTime

  //durationがあるならばこれらを実行する
  if(!isNaN(duration)){
    document.getElementById('current').innerHTML = playTime(current)
    document.getElementById('duration').innerHTML = playTime(duration)
  }
})

seekbar.addEventListener('change',()=>{
  audio.pause();
  audio.currentTime = Math.floor(seekbar.value)
  audio.play()
 
});



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