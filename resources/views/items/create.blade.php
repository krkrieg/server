<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Create a new item</div>
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
            </div>
            <br />
            @endif
            <!-- define the create form -->
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="{{url('items') }}" enctype="multipart/form-data">
                @csrf
                  <table class="table table-striped">
                    <tr>
                      <td>
                        <label><b>Item&nbsp;Category</label></td>
                      <td>
                        <select name="item_category" >
                          <option value="phone">Phone</option>
                          <option value="jewlery">Jewlery</option>
                          <option value="pet">Pet</option> </select></td>
                    </tr>
                    <tr>
                      <td>
                        <label><b>Color</label></td>
                      <td>
                        <input type="text" name="color" style='width:100%'/></td>
                    </tr>
                    <tr>
                      <td>
                        <label ><b>Place</label></td>
                      <td>
                        <input type="text" name="found_place" placeholder="enter city and street" style='width:100%'/></td>
                    </tr>
                    <tr>
                      <td>
                        <label ><b>Date</label></td>
                      <td>
                        <input type="datetime" name="found_time" placeholder="YYYY-MM-DD" style='width:100%'/></td>
                    </tr>
                    <tr>
                      <td>
                        <label><b>Image </label></td>
                      <td>
                        <input type="file" name="image" placeholder="Image file" style='width:100%'/></td>
                    </tr>
                    <tr>
                      <td>
                        <label ><b>Description</label></td>
                      <td>
                        <textarea rows="4" style='width:100%' name="description"> Space for notes about the item. </textarea></td>
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
