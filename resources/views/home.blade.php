<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard - You are logged in!</div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="font-size: 84px"> FiLo - System </div>
                    <br>
                    <!-- Content info text -->
                    <div class="col-md-13">
                      Everyday, hundreds and thousands of valuable items are lost from home, trains, and airports etc.
                      Many of those lost items are never returned to their owners because it is just very difficult to link a lost item to the owner.
                      This website should help out on that. <br><br>
                      Choose <b>'List' </b> in the top bar if you try to find something you lost
                      or <b>'Create'</b> if you want to report an item you found.
                      FiLo System wishes you good luck and says thank you!
                    </div>
                    <br>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
