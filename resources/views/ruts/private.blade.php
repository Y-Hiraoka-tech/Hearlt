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
</body>   
<script>
    
    document.getElementById("check").addEventListener('click', function() {
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "{{ url('/user/private/*') }}");
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
        xhr.send();
        })
</script> 

@endsection