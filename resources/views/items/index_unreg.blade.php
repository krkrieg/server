<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Display all items</div>
        <div class="card-body">
          <!-- Define table structure -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Item</th>
                <th>Color</th>
                <th>Found&nbsp;time</th>
                <th>Found&nbsp;place</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
              <tr>
                <td>{{$item['item_category']}}</td>
                <td>{{$item['color']}}</td>
                <td>{{$item['found_time']}}</td>
                <td>{{$item['found_place']}}</td>
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
