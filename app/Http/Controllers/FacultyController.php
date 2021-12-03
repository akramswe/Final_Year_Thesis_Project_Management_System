<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adminpanel_coursepreregistration;
use DB;
use App\Message;
use App\Feedback;
use App\ProjectDetail;

class FacultyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('faculty');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

     public function faculty()
    {
        return view('faculty.index'); 
    }
    
    public function feedbackstudent(Request $request)
    {
        $search = $request->input('search');
        $students = Feedback::all()
                    ->where("semester",$search);
        return view('faculty.feedbackstudent', compact('students'));
    }

    public function assignstudent(Request $request)
    {
        $search = $request->input('search');
        $students = ProjectDetail::all()
                    ->where("semester",$search);
        return view('faculty.display', compact('students'));
    }
    
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
        $student = ProjectDetail::find($id);
        $students = ProjectDetail::all();
        $message = Message::all();
        return view('faculty.view', compact('student', 'id', 'message','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = ProjectDetail::find($id);
        return view('faculty.view', compact('student', 'id'));
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
}
