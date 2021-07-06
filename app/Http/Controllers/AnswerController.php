<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $answer = Answer::all();
        return view('indexa', compact('answer'));
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
        //
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'answer' => 'required',
            'email' => 'required|email',
            'status' => 'required|max:255',
        ]);
        $question = Answer::create($storeData);

        return redirect('/answers')->with('completed', 'Answer has been saved!');
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
        $answer = Answer::findOrFail($id);
        return view('edita', compact('answer'));
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
        $updateData = $request->validate([
            'name' => 'max:255',
            'content' => 'text',
            'answer' => 'required',
            'email' => 'email',
            'status' => 'required|max:255',
        ]);
        Answer::whereId($id)->update($updateData);
        return redirect('/answers')->with('completed', 'Question has been answered');
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
        $answer = Answer::findOrFail($id);
        //$question->delete();
        /*$updateData = $request->validate([
            'status' => 'spam',
        ]);*/
        //Answer::whereId($id)->update($updateData);
        Answer::whereId($id)->update(array('status' => 'spam'));
        return redirect('/answers')->with('completed', 'Question has been answered');

        //return redirect('/questions')->with('completed', 'Question has been deleted');
    }
}
