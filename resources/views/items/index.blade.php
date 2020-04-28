<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11 ">
      <div class="card">
        <div class="card-header">Display all items</div>
        <div class="card-body">
          <!-- Define the table structure -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Item</th>
                <th>Color</th>
                <th>Found&nbsp;time</th>
                <th>Found&nbsp;place</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
              <tr>
                <td>{{$item['item_category']}}</td>
                <td>{{$item['color']}}</td>
                <td>{{$item['found_time']}}</td>
                <td>{{$item['found_place']}}</td>
                <td>
                  <!-- Define action fields -->
                  <a href="{{action('ItemController@show', $item['id'])}}" class="btn btn- primary">Details</a></td>
                  <!-- Define that only admin and users that created the item can edit and delete it -->
                  <?php if(Auth::user() && Auth::user()->found_user_id == Auth::user() || Auth::user()->role == '1') : ?>
                  <td>
                    <a href="{{action('ItemController@edit', $item['id'])}}" class="btn btn- warning">Edit</a></td>
                    <td>
                      <form action="{{action('ItemController@destroy', $item['id'])}}"
                      method="post"> @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" type="submit"> Delete</button>
                    </form>
                  </td>
                  <?php endif; ?>
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
