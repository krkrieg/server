<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Show item details</div>
        <div class="card-body">
          <!-- Define table body and inputs -->
          <table class="table table-striped" border="1" >
            <tr>
              <th> <b>Item Category </th>
              <td> {{$item['item_category']}}</td></tr>
              <tr>
                <th>Color </th>
                <td>{{$item['color']}}</td></tr>
                <tr>
                  <th>Place </th>
                  <td>{{$item['found_place']}}</td></tr>
                  <tr>
                    <th>Date </th>
                    <td>{{$item['found_time']}}</td></tr>
                    <tr>
                      <th>Notes </th>
                      <td style="max-width:150px;" >{{$item['description']}}</td></tr>
                      <tr>
                        <td colspan='2' ><center><img style="width:30%; height:auto;"
                        src="{{ asset('storage/images/'.$item['image'])}}"></center></td></tr>
                      </table>
                        <table>
                          <tr>
                            <td><a href="{{route('items.index')}}" class="btn btn-primary" role="button">Back to the list</a></td>
                            <!-- Define that only admin and users that created the item can edit and delete it -->
                            <?php if(Auth::user() && Auth::user()->found_user_id == Auth::user() || Auth::user()->role == '1') : ?>
                              <td><a href="{{action('ItemController@edit', $item['id'])}}" class="btn btn- warning">Edit</a></td>
                              <td><form action="{{action('ItemController@destroy', $item['id'])}}" method="post"> @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </input>
                                </form>
                              </td>
                            <?php endif; ?>
                            <td><a href="{{action('RequestItemController@create')}}" class="btn btn- warning">Request Item</a></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
@endsection
