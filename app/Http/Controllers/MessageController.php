<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Message;
use App\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Message::all();
        return view('message.messagelist', compact('students'));
    }
    
   public function messagelist()
    {
        $students = Message::all();
        return view('message.student_message', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function banFreelancer(Request $request) {
        $id = $request->id;
        $user = Message::find($id);
        $user->status = 'pending';
        $user->save();
    }
    
    public function progressFreelancer(Request $request) {
        $id = $request->id;
        $user = Message::find($id);
        $user->status = 'progress';
        $user->save();
    }

    public function unbanFreelancer(Request $request) {
        $id = $request->id;
        $user = Message::find($id);
        $user->status = 'done';
        $user->save();
    }

    public function create()
    {
        $students = Student::all();
        return view('message.sentmessage', compact('students'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            's_id' => 'required',
            's_name' => 'required',
            'email' => 'required',            
            'subject' => 'required',
            'message' => 'required',
            
        ]);
          
          $student = Student::all();
          $message = new Message;

         $message->s_id = $request->input('s_id');
         $message->s_name = $request->input('s_name');
         $message->email = $request->input('email');
         $message->subject = $request->input('subject');
         $message->message = $request->input('message');
         $message->status = $request->input('status');
         $message->due_date = $request->input('due_date');
         $message->sup_id  = auth()->user()->id; 
         $message->sup_name  = auth()->user()->name; 
         
        $message->save();

          $students = Message::all();
        // return view('sentmessage.index', compact('students'));
         return redirect()->route('sentmessage.index')->with('students');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Message::find($id);
        return view('message.viewmessage', compact('student', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('message.sentmessage', compact('student', 'id'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Message::find($id);
        $student->delete();
        return redirect('allmessage')->with('status','Data Deleted ');
    }
}
