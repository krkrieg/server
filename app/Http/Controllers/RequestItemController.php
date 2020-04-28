<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestItem;
use Auth;
use App\Item;

class RequestItemController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check if user is registered and admin
        if (Auth::user() && Auth::user()->role == '1')
        {
          // display list of requests
          $requestItems = RequestItem::all()->toArray();
          return view('items.adminValidate', compact('requestItems'));
        }
        // display message of denied access and return to inital page
        echo '<script>alert("Only admin can access the page")</script>';
        $items = Item::all()->toArray();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return request form in views
        return view('items.requestItem');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         // create a Request object and set its values from the input
         $requestItem = new RequestItem;
         $requestItem->reason = $request->input('reason');
         $requestItem->search_user_id = Auth::id();
         // save the Request object
         $requestItem->save();
         // generate a redirect HTTP response with a success message
         return back()->with('success', 'Request has been added');
    }

    /**
     * Display the requests.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // display all requests
        $requestItem = RequestItem::find($id);
        return view('items.requestItem');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // no edit function needed so far
    }

    /**
     * Confirm request.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // set value for confirmed by admin to 1, so that the request is confirmed
          $requestItem = RequestItem::find($id);
          $requestItem->confirmed_by_admin = 1;
          $requestItem->save();
          return redirect('requestItems')->with('success','Request has been confirmed');
      }

    /**
     * Remove the specified resource from storage. - Deny the request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Deny request trough deleting the request object.
        // Further implementation would be to send messages to the users if request has been denied, so that they also kmow
        $requestItem = RequestItem::find($id);
        $requestItem->delete();
        return redirect('requestItems')->with('success','Request has been deleted');
    }

}
