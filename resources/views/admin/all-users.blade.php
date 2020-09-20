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

        <!----- Search field ------>
        {{-- <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="{{ url('admin/user-search') }}" method="POST">
                {{ csrf_field() }}
              <input class="form-control mr-sm-2" name="user_name" type="search" placeholder="User name.." aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search User</button>
            </form>
        </nav> --}}
        <!----- Search field end------>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Referrer Name</th>
                <th>Money</th>
                <th>Redeem</th>
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
                    <a href="{{ URL::to('admin/wallet-redeem/'.$user->id) }}" class="btn btn-success">REDEEM</a>
                </td>
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

          <div>
              {{ $all_user->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection



@section('scripts')

@endsection
