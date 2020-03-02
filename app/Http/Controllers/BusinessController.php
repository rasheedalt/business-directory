<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use App\User;
use App\Events\BusinessViewed;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business_list = Business::paginate(10);
        return $this->response('success', 'Businesses retrievd successfully', $business_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $business = Business::create($request->all());
        $this->addDefaultImage();
        return $this->response('success', 'Businesses saved successfully', $business);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business = Business::with('category')->find($id);
        event (new BusinessViewed($id));
        return $this->response('success', 'retieved successfully', $business);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $business = Business::find($id);
        $business->update($request->all());
        return $this->response('success', 'Updated successfully', $business);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business = Business::find($id)->delete();
        return $this->response('success', 'deleted successfully', '');
    }


    public function addCategory(Request $request)
    {
        $category = Category::find($request->category);
        $business = Business::find($request->business);
        $business->category()->attach($category);

        return $this->response('success', 'Added successfully', '');
    }

    public function search($keyword)
    {
        $business = Business::where('name', 'like', "%$keyword%")
                    ->orWhere('desc', 'like', "%$keyword%")->get();
        if(!$business){
            return $this->response('error', 'error searching', '');
        }
        return $this->response('success', 'fetch successfully', $business);
    }

    public function toggleActive(Request $request)
    {
        $business = Business::find($request->id);
        $business->active = $request->status;
        $business->save();
        return $this->response('success', 'updated successfully', $business);
    }

    public function addDefaultImage($business_id)
    {
        $image = new Image;
        $image->name = 'default_avatar';
        $image->bussiness_id = $business_id;
        $image->save();
    }

    

    public function addImage(Request $request, $business_id)
    {
        request()->validate([
            'file' => 'required|image|mimes:jpeg, png, gif|max:2048',
        ]);
        
        $filename = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('img'), $filename);
        //$business = Business::find($business_id);
        $image = new Image;
        $image->name = $filename;
        $image->bussiness_id = $business_id;
        $image->save();
        return $this->response('success', 'image added successfully', $filename);

    }


}
