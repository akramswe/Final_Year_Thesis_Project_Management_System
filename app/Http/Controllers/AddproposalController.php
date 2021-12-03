<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Adminpanel_coursepreregistration;
use DB;
use App\User;
use App\Message;

class AddproposalController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $message = Message::all();
        return view('student.index', compact('message'));
    }
    
    public function link()
    {
        $message = Message::all();
        return view('student.linkdisable', compact('message'));
    }

       public function proposal()
    {
        $students = Student::all();
        $message = Message::all();
        return view('student.display', compact('students','message'));
    }
    

    
    public function displayinfo()
    {
        $students = Student::all();
        $message = Message::all();
        return view('student.display', compact('students','message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        if( strcmp($request->get('project'), $request->get('cgpa')) == 0){
            if( $request->get('cgpa') >= 3.5){
            //Current password and new password are same
            return redirect()->route('student.create')->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        }
        
         $students = Student::all();
        $message = Message::all();
        

          $validatedData = $request->validate([
            's_id' => 'required',
            's_name' => 'required',
            'batch' => 'required',
            'semester' => 'required',
            'email' => 'required|string|email|max:255|unique:students',            
            'phone' => 'required',
            'project' => 'required',
            'cgpa' => 'required',
            'credit' => 'required',
            'study' => 'required',
            'title' => 'required',
            'description' => 'required'
            
        ]);
        
         $student = new Student;

         $student->s_id = $request->input('s_id');
         $student->s_name = $request->input('s_name');
         $student->batch = $request->input('batch');
         $student->semester = $request->input('semester');
         $student->email = $request->input('email');
         $student->phone = $request->input('phone');
         $student->project = $request->input('project');
         $student->cgpa = $request->input('cgpa');
         $student->credit = $request->input('credit');
         $student->course = $request->input('course');
         $student->study = $request->input('study');
         $student->title = $request->input('title');
         $student->description = $request->input('description');
         $student->user_id = auth()->user()->id;
         
        $student->save();

    //   return redirect()->route('student.display')->with('success', 'Your Project Topics Successfully Submit');
     return view('student.display', compact('students','message'));
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
    // public function edit($id)
    // {
    //      $student = Student::find($id);
    //      $user  = User:: all();
    //     return view('admin.edit', compact('student', 'id','user'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//     public function update(Request $request, $id)
//     {
//         // $this->validate($request, [
//         //     'sv_name' =>  'required',
//         //     'sv_init' =>  'required'
//         // ]);

//          $student = Student::find($id);
//          $student->s_id = $request->input('s_id');
//          $student->s_name = $request->input('s_name');
//          $student->batch = $request->input('batch');
//          $student->semester = $request->input('semester');
//          $student->email = $request->input('email');
//          $student->phone = $request->input('phone');
//          $student->project = $request->input('project');
//          $student->title = $request->input('title');
//          $student->description = $request->input('description');
//          $student->sv_name = $request->input('sv_name');  
//          $student->sv_init = $request->input('sv_init'); 
         
//         $student->save();

//  return redirect()->route('viewinfo.index')->with('success', 'Data Updated');
      
//     }

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
