@extends('layouts.master')

@section('title')

    Admin Panel

@endsection



@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Category List </h4>

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
                <th>Category ID</th>
                <th>Team One</th>
                <th>Team Two</th>
                <th>Bet Price</th>
                <th>Sport Status</th>
                <th>Match Date</th>
                <th>Venue</th>
                <th>Match Result</th>
                <th>DELETE</th>
              </thead>
              <tbody>

                  @foreach ( $all_sport as $sport )

                <tr>
                  <td>{{ $sport->id }}</td>
                  <td>{{ $sport->category_id }}</td>
                  <td>{{ $sport->team_one }}</td>
                  <td>{{ $sport->team_two }}</td>
                  <td>{{ $sport->bet_price }}</td>
                  <td>{{ $sport->sport_status }}</td>
                  <td>{{ $sport->match_date }}</td>
                  <td>{{ $sport->venue }}</td>
                  <td>{{ $sport->match_result }}</td>
                  <td>
                      <form action="{{ url('admin/sport-delete/'.$sport->id) }}" method="POST">
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
