@extends('layouts.master')

@section('title')

    Admin Panel

@endsection



@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> All Confirm Bid List </h4>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>ID</th>
                <th>Post ID</th>
                <th>Sport ID</th>
                <th>Placer ID</th>
                <th>Placer Supported Team</th>
                <th>Taker ID</th>
                <th>Taker Supported Team</th>
                <th>Confirm Amount</th>
                <th>Win Decider</th>
                <th></th>
                <th>DELETE</th>
              </thead>
              <tbody>

                @foreach ( $all_bet as $bet )

                <tr>
                  <td>{{ $bet->id }}</td>
                  <td>
                    <a href={{ URL::to('admin/post-info/'.$bet->post_id) }} class="btn btn-success">{{ $bet->post_id }}</a>
                  </td>
                  <td>
                    {{ $bet->sp_id }}
                  </td>
                  <td>{{ $bet->placer_id }}</td>
                  <td>{{ $bet->placer_team }}</td>
                  <td>{{ $bet->taker_id }}</td>
                  <td>{{ $bet->taker_team }}</td>
                  <td>{{ $bet->confirm_price }}</td>

                  <td>
                    <form action="{{ url('admin/placer-win/'.$bet->placer_id.'/'.$bet->confirm_price.'/'.$bet->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                          <button type="submit" class="btn btn-success">BET PLACER</button>
                    </form>
                  </td>
                  <td>
                    <form action="{{ url('admin/taker-win/'.$bet->taker_id.'/'.$bet->confirm_price.'/'.$bet->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                          <button type="submit" class="btn btn-alert">BET TAKER</button>
                    </form>
                  </td>

                  <td>
                      <form action="{{ url('admin/bet-delete/'.$bet->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger">DELETE</button>
                      </form>
                  </td>
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



@section('scripts')

@endsection
