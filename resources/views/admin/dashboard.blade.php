@extends('layouts.master')

@section('title')

    Admin Panel

@endsection



@section('content')


<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Overall</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Total User</th>
                <th>Total Amount</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $total_user }}</td>
                  <td>{{ $amount }}</td>
                  <td></td>
                  <td></td>
                </tr>
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
