<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource for all items.
     * no param
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check if registered user
        if(Auth::check()) {
          $items = Item::all()->toArray();
          return view('items.index', compact('items'));
          }
        // if not registered
        $items = Item::all()->toArray();
        return view('items.index_unreg', compact('items'));
      }

    /**
     * Show the form for creating a new resource.
     * no param
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return create form in views
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // form validation
        $item = $this->validate(request(), [ 'item_category' => 'required',
        'color' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500', ]);
        //Handles the uploading of the image
        if ($request->hasFile('image')){
              //Gets the filename with the extension
              $fileNameWithExt = $request->file('image')->getClientOriginalName();
              //just gets the filename
              $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
              //Just gets the extension
              $extension = $request->file('image')->getClientOriginalExtension();
              //Gets the filename to store
              $fileNameToStore = $filename.'_'.time().'.'.$extension;
              //Uploads the image
              $path =$request->file('image')->storeAs('public/images', $fileNameToStore); }
        else {
                $fileNameToStore = 'noimage.jpg';
              }
         // create a Item object and set its values from the input
         $item = new Item;
         $item->item_category = $request->input('item_category');
         $item->description = $request->input('description');
         $item->color = $request->input('color');
         $item->found_time = $request->input('found_time');
         $item->found_place = $request->input('found_place');
         $item->created_at = now();
         $item->found_user_id = Auth::id();

         $item->image = $fileNameToStore;
        // save the Item object
        $item->save();
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'Item has been added');
    }

    /**
     * Display the specified resource (items-details).
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // check if registered user
        if(Auth::check()) {
        $item = Item::find($id);
        return view('items.show',compact('item'));
        }
    }

    /**
     * Show the form for editing an item.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get properties for auth check
        $allow_to_edit= Auth::id();
        $item = Item::find($id);
        $check = $item->found_user_id;
        // check if user is creator of the item object or admin
        if ($allow_to_edit == $check || Auth::user()->role == '1'){
          $item = Item::find($id);
          return view('items.edit',compact('item'));
      }
        // display message box and redirect back to initial page
        echo '<script>alert("Cannot edit item from another user")</script>';
        $items = Item::all()->toArray();
        return view('items.index', compact('items'));
    }

    /**
     * Update the item in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        //form validation
        $this->validate(request(), [
          'item_category' => 'required',
          'color' => 'required']);
          // update the Item object and set its values from the input
          $item->item_category = $request->input('item_category');
          $item->description = $request->input('description');
          $item->color = $request->input('color');
          $item->found_time = $request->input('found_time');
          $item->found_place = $request->input('found_place');
          $item->updated_at = now();
          //Handles the uploading of the image
          if ($request->hasFile('image')){
            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Gets the filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
          }
          else {
            $fileNameToStore = 'noimage.jpg';
          }
          // save updated item object
          $item->image = $fileNameToStore;
          $item->save();
          return redirect('items')->with('success','Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get properties for auth check
        $allow_to_delete= Auth::id();
        $item = Item::find($id);
        $check = $item->found_user_id;
        // check if user is creator of the item object or admin
        if ($allow_to_delete == $check || Auth::user()->role == '1'){
        // delete Item object through Item ID
        $item->delete();
        return redirect('items')->with('success','Item has been deleted');
        }
        echo '<script>alert("Cannot delete item from another user")</script>';
        return redirect('items')->with('success','Item has been deleted');
    }

}
