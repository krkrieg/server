<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Make a request on the item</div>
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
            <!-- define the request form -->
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="{{url('requestItems')}}" enctype="multipart/form-data">
                @csrf
                    <label> <b>Reason</label><br>
                    <textarea rows="4" style='width:100%' name="reason"> Space for notes about the request. </textarea>
                    <input type="submit" class="btn btn-primary" />
                    <td><a href="{{route('items.index')}}" class="btn btn-primary" role="button">Back to the list</a></td>
              </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
