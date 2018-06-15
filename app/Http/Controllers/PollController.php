<?php

namespace App\Http\Controllers;
use \App\Poll;
use \App\Option;
use Illuminate\Http\Request;
use Auth;
use \App\Voted;


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
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required | min:6",
            "choices" => "required",
            "description" => "required",
            'type' => 'required'
        ]);

        $poll = Poll::create([
            "name" => $request->input("name"),
            "choices" => $request->input("choices"),
            "description" => $request->input("description"),
            "code" => uniqid(),
        ]);

        for($i=1;$i<=$poll->choices;$i++){
            $option = Option::create([
                "poll_id" => $poll->id,
                "count" => 0,
                "option" => $request->input("option{$i}"),
                "type" => $request->input("type") == "radio" ? 0 : 1,
            ]);
        }

        session()->flash('success_message', 'Success!');
 
        return redirect()->action("PollController@show", ["id" => $poll->id]); 

    
    }

    public function vote(Request $request, $id)
    {


//        dd($id);
        $options = $request->all()['option'];
//dd($options);
        foreach($options as $option_id){
            $option = Option::find($option_id);
//dd($option);
            $option->update ([
                'count' => $option->count + 1
            ]);

        }
        $voted = Voted::create([
            "user_id" => Auth::id(),
            "poll_id" => $id,
            "voted" => 1
        ]);

        $size = count(Voted::where('poll_id', '=', $voted->poll_id)->where('user_id', '=', $voted->user_id)->get());




        session()->flash('success_message', 'Success!');
        return redirect()->back();
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
        $options = Option::where("poll_id", "=", $id)->get();
        $view = view("show");
        $view->poll = $poll;
        $view->options = $options;
        $view->user = Auth::id();
        $size = count(Voted::where('poll_id', '=', $poll->id)->where('user_id', '=', Auth::id())->get());
        if($size<1){
            $show_form = true;
        } else {
            $show_form = false;
        }
        $view->show_form = $show_form;
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
        $view = view("update");
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
       
        $this->validate($request, [
            "name" => "required | min:6",
            "choices" => "required",
            "description" => "required",
        ]);

        $poll->update ([
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
