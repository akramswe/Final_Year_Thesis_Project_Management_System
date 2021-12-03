<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adminpanel_coursepreregistration;
use DB;
use DataTables;
use Validator;
use App\User;
use App\Message;
use App\Notice;
use App\Eligibility;
use App\Semester;
use App\ProjectDetail;
use App\Videourl;
use App\DisableDate;

class VideourlController extends Controller
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
    public function index(Request $request)
    {
           $email = DB::table('project_details')
            ->select('mid_video','final_video','f_url','Internal_Reviewer_1')
            ->where('project_details.email', auth()->user()->email)
            ->first();

          $title = DB::table('project_details')
            ->SELECT ('title')
            ->where('email', auth()->user()->email)
            ->first();

        $videourl = ProjectDetail::all();
        
        // $videourl = DB::table('project_details')
        //     ->select('*')
        //     ->get(); 

       $student = DB::table('project_details')
                  ->select('*')
                  ->get();
         $dates = DB::table('disable_dates')
                   ->select('*')
                   ->first();
           

        return view('student.uploadvideo', compact('videourl','student','email','dates'));
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

    
     public function viewvideolist(Request $request)
    {
        $category = $request->input('category');
         $search = $request->input('search');
        if($request->has('search') && $search != null) {
         $videourl = Videourl::all()
         ->where("semester",$search)
         ->where("defense",$category);
        }
        else {
             $videourl = Videourl::all();
        }
        //  $videourl = DB::table('project_details')->paginate(9);
          $semester = Semester::all();
      
        return view('admin.videodetails', compact('videourl','semester','students'));
    }
    
    
    public function uploadvideourl()
    {
       $email = DB::table('project_details')
            ->SELECT ('email')
            ->where('email', auth()->user()->email)
            ->first();
            
          $title = DB::table('project_details')
            ->SELECT ('title')
            ->where('email', auth()->user()->email)
            ->first();
            
        $semester = Semester::all();
        $students = ProjectDetail::all();
        $message = Message::all();
        return view('student.uploadvideo', compact('students','message','email','semester','title'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {


      $isExistfinal = ProjectDetail::select("final_video")
                        ->where("s_id", $request->s_id)
                        ->exists();
   $email = DB::table('project_details')
            ->SELECT ('mid_video','final_video','f_url','Internal_Reviewer_1')
            ->where('email', auth()->user()->email)
            ->first();
    

if ($email->mid_video==NULL) {
         $students = ProjectDetail::all();
         $message = Message::all();
    
         $videourl = DB::table('project_details')
               ->where('s_id', $request->input('s_id'))
               ->update(['mid_video' =>$request->input('url')]);

            return redirect('uploadvideo')->with('students','message')->with('success', 'MID Video URL is Updated successfully');

        }

elseif ($email->f_url==NULL && $email->Internal_Reviewer_1==Null) {

    $students = ProjectDetail::all();
         $message = Message::all();
         $videourl = DB::table('project_details')
               ->where('s_id', $request->input('s_id'))
               ->update(['f_url' =>$request->input('url')]);

            return redirect('uploadvideo')->with('students','message')->with('success', 'Document Drive URL is Updated successfully');
}
else{
     $students = ProjectDetail::all();
         $message = Message::all();
         $videourl = DB::table('project_details')
               ->where('s_id', $request->input('s_id'))
               ->update(['final_video' =>$request->input('url')]);

            return redirect('uploadvideo')->with('students','message')->with('success', 'Final Video URL is Updated successfully');  
}

    // elseif {
    //      $students = ProjectDetail::all();
    //      $message = Message::all();
    //      $validatedData = $request->validate([
    //         's_id' => 'required',
    //         'url' => 'required',
            
    //     ]);
        
    //      $student = new Videourl;

    //      $student->s_id = $request->input('s_id');
    //      $student->semester = $request->input('semester');
    //      $student->mid_video = $request->input('url');
    //      $student->user_id = auth()->user()->id;
         
    //     $student->save();

    //  return redirect('uploadvideo')->with('students','message')->with('success', 'Video Upload is successfully');
    // }

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
        $student = ProjectDetail::find($id);
         $user  = User:: all();
        return view('student.editvideo', compact('student', 'id'));
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
          $student = ProjectDetail::find($id);
         $student->mid_video = $request->input('url');
         $student->save();

//  return redirect()->route('viewinfo.index')->with('success', 'Data Updated');
    return redirect('uploadvideo')->with('success', 'MID Video URL is successfully Updated');
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
