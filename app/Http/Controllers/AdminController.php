<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adminpanel_coursepreregistration;
use DB;
use App\Student;
use App\User;
use App\Message;
use App\Feedback;
use App\Supervisor_Mark;
use App\Internal_Mark;
use App\semesterlist;
use App\ProjectDetail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        // $this->middleware('superadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $cuser = User::all()
                    ->where("role",'student');
        $cfuser = User::all()
              ->where("role",'faculty');
        $causer = User::all()
              ->where("role",'admin');
       $cproposal = ProjectDetail::all();
              
        $totaluser = count($cuser);
        $totalfaculty = count($cfuser);
        $totaladmin = count($causer);
        $totalproposal = count($cproposal);
        
        return view('admin.index', compact('totaluser','totalfaculty', 'totaladmin', 'totalproposal'));
    }
    
    
    public function superadmin()
    {
         $cuser = User::all()
                    ->where("role",'student');
        $cfuser = User::all()
              ->where("role",'faculty');
        $causer = User::all()
              ->where("role",'admin');
       $cproposal = ProjectDetail::all();
              
        $totaluser = count($cuser);
        $totalfaculty = count($cfuser);
        $totaladmin = count($causer);
        $totalproposal = count($cproposal);
        
        return view('superadmin.index', compact('totaluser','totalfaculty', 'totaladmin', 'totalproposal'));
    }
    
    public function showfeedback(Request $request)
    {
        $search = $request->input('search');
        $students = Feedback::all()
                    ->where("semester",$search);
        return view('admin.feedbackstudent', compact('students'));
    }
    
    
    
        public function showmarks(Request $request)
    {
        $search = $request->input('search');

                    
             $students_intr = DB::table('supervisor__marks')
                     ->join('internal__marks','internal__marks.s_id', '=', 'supervisor__marks.s_id')
                     ->select('internal__marks.*','supervisor__marks.*')
                      ->where("internal__marks.semester",$search)
                       ->where("supervisor__marks.semester",$search)
                     ->get();
                    
                    
          
        return view('admin.marks', compact('students_intr'));
    }

 public function showinfo12()
    {
         $students = ProjectDetail::all();
         $user= User:: all();
        return view('admin.display', compact('students','user'));
    }
    
     public function allstudentinfo(Request $request) {
         $semester = semesterlist::all();
       $search = $request->input('search');
       $campus = $request->input('campus');
       
 if( $campus != null) {
        if($request->has('search') && $search != null) {
                $students = ProjectDetail::all() 
                  ->where("semester",$search);
        }
   }
 else if( $search != null) {
        if($request->has('campus') && $campus != null) {
                $students = ProjectDetail::all() 
                  ->where("campus",$campus);
        }
   }
  else if($request->has('search') && $search != null && $request->has('campus')&& $campus != null) {
    //   $students = ProjectDetail::all() 
    //               ->where("semester",$search)
    //               ->where("campus",$campus);
         $students = DB::table('project_details')
                  ->where("semester",$search)
                  ->where("campus",$campus)
                  ->get();
  }
  else
        {
            $students = ProjectDetail::all();
       
        }
        return view('admin.allstudent', compact('students','search','semester'));
     }
    
 ///PC Student Info Download
      public function pcallstudentinfo(Request $request) {
         $semester = semesterlist::all();
       $search = $request->input('search');
       $campus = $request->input('campus');
       
        if($request->has('search') && $search != null) {
    //   $students = ProjectDetail::all() 
    //               ->where("semester",$search)
    //               ->where("campus",$campus);
         $students = DB::table('project_details')
                  ->where("semester",$search)
                  ->where("campus",'PC')
                  ->get();
  }
  else
        {
            $students = DB::table('project_details')
                  ->where("campus",'PC')
                  ->get();
       
        }
        return view('admin.pcallstudent', compact('students','search','semester'));
     }
    
    
    
    
     public function SupervisorSummary(Request $request) {
         $semester = semesterlist::all();
 $search = $request->input('search');
      $students = ProjectDetail::all()
                  ->where("semester",$search);
        $collection = ProjectDetail::groupBy('sv_init')
                    ->where("semester",$search)
                    ->selectRaw('count(sv_init), sv_init')
                    ->selectRaw('sv_init')
                    ->pluck('count(sv_init)','sv_init');
        return view('admin.supervisorsummary', compact('students','collection','search','semester'));
     }
     
    public function index1(Request $request)
    {
        if(request()->ajax())
     {
      if($request->category)
      {
       $data = DB::table('project_details')
         ->where('semester', $request->category);
      }
      else
      {
       $data = DB::table('project_details')
         ->select("*");
      }
       return DataTables::of($data)
                    ->make(true);
     }

     $search = $request->input('search');
        $search = $request->input('search');
        $collection = ProjectDetail::groupBy('sv_init')
                    ->where("semester",$search)
                    ->selectRaw('count(sv_init), sv_init')
                    ->selectRaw('sv_init')
                    ->pluck('count(sv_init)','sv_init');
        $user= User:: all();
        
        return view('admin.report',compact('user','collection'));
    }

     public function index2()
    {
        $students = ProjectDetail::all();
         $collection = ProjectDetail::groupBy('sv_init')
                     ->where("semester",'Spring-2020')
                    ->selectRaw('count(sv_init), sv_init')
                    ->selectRaw('sv_init')
                    ->pluck('count(sv_init)','sv_init');
        return view('admin.display', compact('students','collection'));
    }
    
  public function index3()
    {
        $students = ProjectDetail::all();
        return view('admin.showstudent', compact('students'));
    }
    
    
     public function assignstudent(Request $request)
    {
     $search = $request->input('search');
        $students = ProjectDetail::all()
                    ->where("semester",$search);
        return view('admin.assign', compact('students'));
 
    }
    
public function getInitialList(Request $request)
    {
        $states = DB::table("initials")
                    ->where("sv_id",$request->sv_id)
                    ->pluck("sv_initial","sv_id");
        return response()->json($states);
    }
    
    

// public function getStates($id)
// {
//     $states = DB::table("initials")
//                 ->where("sv_id",$id)
//                 ->pluck("sv_initial","id");
//     return response()->json($states);
// }
    
    

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
    public function index4($id)
    {
         $student = ProjectDetail::find($id);
        $students = ProjectDetail::all();
        $message = Message::all();
        return view('admin.showinfo', compact('student', 'id', 'message','students'));
    }
    
    public function show($id)
    {
         $student = ProjectDetail::find($id);
        $students = ProjectDetail::all();
        $message = Message::all();
        return view('admin.studentinfo', compact('student', 'id', 'message','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
   public function edit1($id)
    {
         $student = ProjectDetail::find($id);
         $user  = User:: all();
        return view('admin.edit', compact('student', 'id','user'));
    }
    
    public function update1(Request $request, $id)
    {
        // $this->validate($request, [
        //     'sv_name' =>  'required',
        //     'sv_init' =>  'required'
        // ]);

         $student = ProjectDetail::find($id);
         $student->s_id = $request->input('s_id');
         $student->s_name = $request->input('s_name');
         $student->batch = $request->input('batch');
         $student->semester = $request->input('semester');
         $student->email = $request->input('email');
         $student->phone = $request->input('phone');
         $student->project = $request->input('project');
         $student->title = $request->input('title');
         $student->description = $request->input('description');
         $student->sv_name = $request->input('sv_name');  
         $student->sv_init = $request->input('sv_init'); 
         
        $student->save();

 return redirect()->route('admin')->with('success', 'Data Updated');
      
    }

     
     
    public function edit($id)
    {
         $student = ProjectDetail::find($id);
         $user  = User:: all();
        return view('admin.view', compact('student', 'id','user'));
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
         $students = ProjectDetail::all();
         
        $this->validate($request, [
            'sv_name' =>  'required',
            'sv_init' =>  'required'
        ]);

         $student = ProjectDetail::find($id);
         $student->s_id = $request->input('s_id');
         $student->s_name = $request->input('s_name');
         $student->batch = $request->input('batch');
         $student->semester = $request->input('semester');
         $student->email = $request->input('email');
         $student->phone = $request->input('phone');
         $student->project = $request->input('project');
         $student->title = $request->input('title');
         $student->description = $request->input('description');
         $student->sv_name = $request->input('sv_name');  
         $student->sv_init = $request->input('sv_init'); 
         $student->Internal_Reviewer_1 = $request->input('Internal_Reviewer_1');
         $student->Internal_Reviewer_2 = $request->input('Internal_Reviewer_2'); 
         
        $student->save();
 return redirect('viewstudent')->with('success','Update Successfully')->with('students', $students);
//  return redirect()->route('viewinfo.index')->with('success', 'Data Updated');
      
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
