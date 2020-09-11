@extends('layouts.master')

@section('title')

    Admin Panel

@endsection



@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> All Users Info </h4>

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
                <th>Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Referrer Name</th>
                <th>Coins</th>
                <th>DELETE</th>
              </thead>
              <tbody>

                  @foreach ( $all_user as $user )

                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->user_name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->referrer_name }}</td>
                  <td>{{ $user->wallet }}</td>
                  <td>
                      <form action="{{ url('admin/user-delete/'.$user->id) }}" method="POST">
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
