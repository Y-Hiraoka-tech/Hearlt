@extends('layouts.app')
@section('title', 'Artist')

@section('content')
<div class="container mt-5">
<h2 class="mb-3">チケット管理</h2>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ticket_price-tab" data-toggle="tab" href="#ticket_price" role="tab" aria-controls="ticket_price" aria-selected="true">Ticket Price</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ticket-tab" data-toggle="tab" href="#ticket" role="tab" aria-controls="ticket" aria-selected="false">Ticket保持</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="purchase_history-tab" data-toggle="tab" href="#purchase_history" role="tab" aria-controls="purchase_history" aria-selected="false">Ticket 購入履歴</a>
            </li>
        </ul>

        <div class="tab-content mt-3"style="margin:0 auto;width: 90%;">
            <div class="form-group tab-pane fade show active" id="ticket_price" role="tabpanel" aria-labelledby="ticket_price-tab">
                <label>Ticket Price</label>
                <div class="row">
                  <div class="col-12">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <th>id</th>
                                  <th>チケット枚数</th>
                                  <th>金額</th>
                                  <th>アクション</th>
                              </tr>
                              
                              @foreach ($ticket_prices as $ticket_price)
                              <tr>
                                  <td>{{ $ticket_price->id }}</td>
                                  <td>{{ $ticket_price->ticket }}</td>
                                  <td>{{ $ticket_price->money }}</td>
                                  <td>０００</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table> 
                  </div>
              </div>
                
            </div>
            <div class="form-group tab-pane fade" id="ticket" role="tabpanel" aria-labelledby="ticket-tab">
                <label>Ticket</label>
                <div class="row">
                  <div class="col-12">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <th>id</th>
                                  <th>ユーザーID</th>
                                  <th>保有チケット</th>
                                  <th>アップデート</th>
                                  <th>アクション</th>
                              </tr>
                              
                              @foreach ($tickets as $ticket)
                              <tr>
                                  <td>{{ $ticket->id }}</td>
                                  <td>{{ $ticket->user_id }}</td>
                                  <td>{{ $ticket->tickets }}</td>
                                  <td>{{ $ticket->updated_at }}</td>
                                  <td>０００</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table> 
                  </div>
              </div>
            </div>
            <div class="form-group tab-pane fade" id="purchase_history" role="tabpanel" aria-labelledby="purchase_history-tab">
                <label>Ticket　購入履歴</label>
                <div class="row">
                  <div class="col-12">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <th>id</th>
                                  <th>ユーザーID</th>
                                  <th>お金</th>
                                  <th>チケット枚数</th>
                                  <th>成功（１）</th>
                                  <th>取引日</th>
                                  <th>アクション</th>
                              </tr>
                              
                              @foreach ($purchase_histories as $purchase_history)
                              <tr>
                                  <td>{{ $purchase_history->id }}</td>
                                  <td>{{ $purchase_history->user_id }}</td>
                                  <td>{{ $purchase_history->money }}</td>
                                  <td>{{ $purchase_history->ticket }}</td>
                                  <td>{{ $purchase_history->success }}</td>
                                  <td>{{ $purchase_history->created_at }}</td>
                                  <td>０００</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table> 
                  </div>
              </div>
            </div>
        </div>
</div>
@endsection