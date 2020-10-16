<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('children')->get();
        // return $categories;
        $brands = Brand::all();

        return view('welcome',compact('categories','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showFormContact()
    {
        return view('mail.contact-form');
    }

    public function contact(Request $request)
    {
        $data = $request->all();
        // dd($data);

        // \Mail::to('nhi12299@gmail.com')->send(new OrderConfirmMail($data));

        $to_email = $data['email'];
        $to_name = $data['name'];
        $from_email = 'nhi12299@gmail.com';
        Mail::send('mail.contact-mail',$data, function($message) use ($to_email,$to_name, $from_email){
            $message->to($to_email,$to_name)->subject('Contact Mail');
            $message->from($from_email,'Shop-Sport');
        });
        return 'success';
    }
}
