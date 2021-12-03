<?php

namespace App\Http\Controllers;

use App\Sample_data;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Student;
use App\User;
use App\semesterlist;
use DB;
use App\ProjectDetail;

class AllstudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
          public function __construct()
    {
        $this->middleware('auth');
    }
     
     function index(Request $request)
    {

       $semester = semesterlist::all();

     if(request()->ajax())
     {
      if($request->category AND $request->campus)
      {
       $data = DB::table('project_details')
         ->where('semester', $request->category)
         ->where('campus',$request->campus)
         ->orderBy('sv_init', 'ASC');
      }
      else
      {
       $data = DB::table('project_details')
            ->select('*')
            ->orderBy('sv_init', 'ASC'); 

        
      }
       return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-user-plus"></i>  Assign</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
     }

     $search = $request->input('search');
        $search = $request->input('search');
        $collection = ProjectDetail::groupBy('sv_init')
                    ->where("semester",$search)
                    ->selectRaw('count(sv_init), sv_init')
                    ->selectRaw('sv_init')
                    ->pluck('count(sv_init)','sv_init');
                    
        $user= User::orderBy('name', 'ASC')->get();
            
        
        return view('admin.allstudentview',compact('user','collection','semester'));
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
        $rules = array(
            'first_name'    =>  'required',
            'last_name'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name
        );

        Sample_data::create($form_data);

        return response()->json(['success' => 'Supervisor Added successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
    public function show(Sample_data $sample_data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        if(request()->ajax())
        {
            $data = ProjectDetail::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sample_data $sample_data)
    {
        $rules = array(
            'Internal_Reviewer_1' =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Internal_Reviewer_1'    =>  $request->Internal_Reviewer_1,
            'Internal_Reviewer_name'    =>  $request->Internal_Reviewer_name,
             'admin_id'          =>auth()->user()->id
        );

        ProjectDetail::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sample_data::findOrFail($id);
        $data->delete();
    }
}
