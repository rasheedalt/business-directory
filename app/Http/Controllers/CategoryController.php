<?php

namespace App\Http\Controllers;

use App\Category;
use App\Business;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response('success', 'retrievd successfully', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = Category::create($request->all());
        return $this->response('success', 'saved successfully', $category);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return $this->response('success', 'retieved successfully', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return $this->response('success', 'Updated successfully', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return $this->response('success', 'deleted successfully');
    }


    public function count()
    {
        $data = [];
        $data['category'] = Category::all()->count();
        $data['business'] = Business::all()->count();
        $data['active'] = Business::where('active', 1)->count();
        $data['inactive'] = Business::where('active', 0)->count();
        return $this->response('success', 'count successfull', $data);
    }

}
