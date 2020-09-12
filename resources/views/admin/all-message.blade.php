@extends('layouts.master')

@section('title')

    Admin Panel

@endsection



@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> All Messages List </h4>

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
                <th>Sender Name</th>
                <th>Sender Email</th>
                <th>Message</th>
                <th>DELETE</th>
              </thead>
              <tbody>

                  @foreach ( $all_message as $message )

                <tr>
                  <td>{{ $message->id }}</td>
                  <td>{{ $message->name }}</td>
                  <td>{{ $message->email }}</td>
                  <td>
                      <p>{{ $message->messages }}</p>
                  </td>
                  <td>
                      <form action="{{ url('admin/message-delete/'.$message->id) }}" method="POST">
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
