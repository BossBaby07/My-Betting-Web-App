@extends('layouts.master')

@section('title')

    Admin Panel

@endsection



@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Withdraw Request List </h4>

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
                <th>User ID</th>
                <th>Requested Amount</th>
                <th>Bikash Number</th>
                <th>Withdraw Success</th>
              </thead>
              <tbody>

                  @foreach ( $all_withdraw as $withdraw )

                <tr>
                  <td>{{ $withdraw->id }}</td>
                  <td>
                    <a href={{ URL::to('admin/user-info/'.$withdraw->user_id) }} class="btn btn-success">{{ $withdraw->user_id }}</a>
                  </td>
                  <td>{{ $withdraw->request_amount }}</td>
                  <td>{{ $withdraw->bikash_number }}</td>
                  <td>
                      <form action="{{ url('admin/withdraw-success/'.$withdraw->id.'/'.$withdraw->user_id.'/'.$withdraw->request_amount) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                          <button type="submit" class="btn btn-success">SUCCESS</button>
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
