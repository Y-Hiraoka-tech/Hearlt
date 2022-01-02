@extends('layouts.purchase')
@section('content')
<body style="background: #272525;color:white;">
    <div style="text-align: center; padding-top:7vw;">
        <p style="border-radius: 10px;margin:0 auto;font-size: 18px;width:80%;padding:4vw 0;background: #7B7575;">保有ギフト券：{{$ticket_sum}}枚</p>
    </div>
@foreach($ticketprices as $ticketprice)
    <div style="width:80%;margin:0 auto; margin-top:7vw;display:flex;align-items: center;border-bottom:1px solid;">
        <div style="margin-right: 10vw;">
        <svg width="60" height="60" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="background-color: white;padding:5px;border-radius:15%">
            <path d="M20.6421 1.78502L18.0729 4.35418C17.8372 3.8592 17.519 3.37601 17.1066 2.96353C15.1502 1.0072 11.9918 1.0072 10.0355 2.96353C8.79805 4.20097 8.362 5.90981 8.6802 7.5008L8.88055 8.87966L7.48991 8.66753C5.9107 8.36111 4.20186 8.79716 2.96442 10.0346C1.00809 11.9909 1.00809 15.1493 2.96442 17.1057C3.3769 17.5181 3.86009 17.8363 4.35507 18.072L1.78591 20.6412C0.477764 21.9494 0.489549 24.0353 1.7977 25.3435L14.7495 38.3189C16.0577 39.627 18.1554 39.627 19.4636 38.3189L38.3198 19.4627C39.6279 18.1545 39.6279 16.0568 38.3198 14.7486L25.3561 1.78502C24.048 0.476876 21.9502 0.476876 20.6421 1.78502ZM12.3925 5.32056C13.0407 4.67238 14.1014 4.67238 14.7495 5.32056C15.3977 5.96874 15.3977 7.0294 14.7495 7.67758C14.1014 8.32576 13.0407 8.32576 12.3925 7.67758C11.7443 7.0294 11.7443 5.96874 12.3925 5.32056ZM5.32144 12.3916C5.96963 11.7434 7.03029 11.7434 7.67847 12.3916C8.32665 13.0398 8.32665 14.1005 7.67847 14.7486C7.03029 15.3968 5.96963 15.3968 5.32145 14.7486C4.67326 14.1005 4.67326 13.0398 5.32144 12.3916ZM35.9627 17.1057L17.1066 35.9618L14.7495 33.6048L33.6057 14.7486L35.9627 17.1057ZM30.0702 11.2131L11.214 30.0693L4.14293 22.9982L10.1298 17.0114L11.0137 22.7979L14.3017 22.2675L13.2882 15.6443L12.8639 12.863L15.6452 13.2873L22.2684 14.3008L22.7988 11.0128L17.0123 10.1289L22.9991 4.14204L30.0702 11.2131Z" fill="#C90000"/>
        </svg>
        ×{{$ticketprice->ticket}}
        </div>
        <div>
            ¥{{$ticketprice->money}}
        </div>
     
        <div style="position:absolute;right:10%;">
        <form action="/purchase/gift/store/">
            <input type="hidden" name="tickets" value="{{$ticketprice->ticket}}" >
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-amount="{{$ticketprice->money}}"
                data-name="Stripe決済デモ"
                data-label="決済をする"
                data-description="これはデモ決済です"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="JPY">
            </script>
        </form>
        </div>
    
    </div>

@endforeach
   
@extends('layouts.app_footer')
</body>
@endsection