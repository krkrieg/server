<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11 ">
      <div class="card">
        <div class="card-header">Display all Requests</div>
        <div class="card-body">
          <!-- Define table structure -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Admin&nbsp;answer </th>
                <th>Request</th>
                <th>Reason</th>
                <th>Date&nbsp;of&nbsp;request</th>
                <th>User</th>
                <th colspan="3" style="text-align: center;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($requestItems as $req)
              <tr>
                <!-- Display of admin answers -->
                <td>
                  <?php if($req['confirmed_by_admin']==1) : ?>
                  <label><b><font color="green">Confirmed</font></label>
                  <?php elseif($req['confirmed_by_admin']== Null) : ?>
                  <label>Pending...</label>
                  <?php else : ?>
                  <label>Denied</label>
                  <?php endif; ?>
                </td>
                <td>{{$req['id']}}</td>
                <td>{{$req['reason']}}</td>
                <td><?php echo date_format(date_create("{$req['created_at']}"), "Y/m/d - H:i:s");?></td>
                <td>{{$req['search_user_id']}}</td>
                <!-- Define admin actions -->
                <td>
                  <form action="{{action('RequestItemController@destroy', $req['id'])}}"  method="post"> @csrf
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="btn btn-danger" type="submit"> Delete </button>
                </form>
                </td>
                <td>
                <form action="{{action('RequestItemController@update', $req['id'])}}"  method="post"> @csrf
                <input name="_method" type="hidden" value="PATCH">
                <button class="btn" style="background-color: green; color: white" type="submit"> Confirm </button>
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
