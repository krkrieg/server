<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Edit and update the item</div>
        <!-- display the errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><br />
        @endif
        <!-- display the success status -->
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ action('ItemController@update', $item['id']) }} " enctype="multipart/form-data" >
            @method('PATCH')
            @csrf
              <!-- Define the edit form -->
              <table class="table table-striped">
                <tr><td>
                    <label><b>Item </label> </td>
                    <td>
                    <select name="item_category" value="{{ $item->item_category }}">
                      <option value="pet">Pet</option>
                      <option value="jewlery">Jewlery</option>
                      <option value="phone">Phone</option> </select></td>
                </tr>
                <tr><td>
                    <label ><b>Color </label></td>
                    <td>
                    <input type="text" style='width:100%' name="color" value="{{$item->color}}"/></td>
                </tr>
                <tr><td>
                    <label ><b>Place&nbsp;of&nbsp;found&nbsp;Item </label></td>
                    <td>
                    <input type="text" style='width:100%' name="found_place" value="{{$item->found_place}}" /></td>
                </tr>
                <tr><td>
                    <label ><b>Found&nbsp;time</label></td>
                    <td>
                    <input type="date" style='width:100%' name="found_time" value="{{$item->found_time}}" /></td>
                </tr>
                <tr><td>
                    <label ><b>Description</label></td>
                    <td>
                    <textarea rows="4" style='width:100%' name="description" > {{$item->description}} </textarea></td>
                </tr>
                <tr><td>
                    <label><b>Image</label></td>
                    <td>
                    <input type="file" name="image" /></td>
                </tr>
                <tr>
                <td></td>
                    <td align="right">
                      <input type="submit" class="btn btn-primary" />
                      <input type="reset" class="btn btn-danger" /></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
