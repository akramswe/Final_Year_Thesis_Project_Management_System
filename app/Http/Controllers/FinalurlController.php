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

class FinalurlController extends Controller
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
        return view('student.editfinalurl', compact('student', 'id'));
    }
    
        public function update(Request $request, $id)
    {
          $student = ProjectDetail::find($id);
         $student->final_video = $request->input('url');
         $student->save();

//  return redirect()->route('viewinfo.index')->with('success', 'Data Updated');
    return redirect('uploadvideo')->with('success', 'Final Video URL is successfully Updated');
    }


    
    
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
//          public function updatefinal1(Request $request, $id)
//     {
//           $student = DB::table('project_details')
//               ->where('id', $id)
//               ->update(['final_video' =>$request->input('url')]);
 

// //  return redirect()->route('viewinfo.index')->with('success', 'Data Updated');
//     return redirect('uploadvideo')->with('success', 'Final Video URL is successfully Updated');
//     }


//      public function updatefinal(Request $request, $id)
//     {
//           $student = DB::table('project_details')
//               ->where('id', $id)
//               ->update(['final_video' =>$request->input('url')]);
 

// //  return redirect()->route('viewinfo.index')->with('success', 'Data Updated');
//     return redirect('uploadvideo')->with('success', 'Final Video URL is successfully Updated');
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
