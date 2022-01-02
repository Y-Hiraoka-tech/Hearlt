@extends('layouts.private')
@section('content')
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body style="background: #272525;color:white;">
    <div class="main" style="margin-top: 5%;">
        <h3 style="font-size: 18px;">公開範囲設定</h3>
        <input type="checkbox" id='check'/>
        <label class="text" for='private-setting'>全員に公開する</label>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$('#check').on('click', function() {
  $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('user.private.update') }}",
      type: 'POST',
  })
  .done(function(data){
    location.reload();
    console.log(data);
  })
  .fail(function() {
    window.alert('正しく読み込めませんでした')
  })
});
</script>
<script>
if({{ $user->private }} == 0){
  let element = document.getElementById('check');
  element.checked = true;
}      
</script>

</body>   

@endsection