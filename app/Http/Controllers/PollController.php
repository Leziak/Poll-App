<?php

namespace App\Http\Controllers;
use \App\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::paginate(5);
        $view = view("polls");
        $view->polls = $polls;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poll = new Poll();
        $view = view("create");
        $view->poll = $poll;
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required | min:6",
            "choices" => "required | min:2",
            "description" => "required",
        ]);

        $poll = Poll::create([
            "name" => $request->input("name"),
            "choices" => $request->input("choices"),
            "description" => $request->input("description"),
            "code" => uniqid(),
        ]);

        session()->flash('success_message', 'Success!');
 
        return redirect()->action("PollController@show", ["id" => $poll->id]); 

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = Poll::find($id);
        $view = view("show");
        $view->poll = $poll;
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poll = Poll::findOrFail($id);
        $view = view("edit");
        $view->poll = $poll;
        return $view;
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
        $poll = Poll::find($id);
       

        $poll = Poll::update([
            "name" => $request->input("name"),
            "choices" => $request->input("choices"),
            "description" => $request->input("description"),
        ]);

        session()->flash('success_message', 'Success!');
 
        return redirect()->action("PollController@show", ["id" => $poll->id]); 
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
}
