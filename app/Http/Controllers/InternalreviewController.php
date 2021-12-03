<?php

namespace App\Http\Controllers;

use App\Sample_data;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Student;
use App\User;
use DB;
use App\semesterlist;

class InternalreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     function index(Request $request)
    {
     if(request()->ajax())
     {
      if($request->category)
      {
       $data = DB::table('students')
         ->where('semester', $request->category);
      }
      else
      {
       $data = DB::table('students')
         ->select("*");
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
        $collection = Student::groupBy('Internal_Reviewer_1')
                    ->where("semester",$search)
                    ->selectRaw('count(Internal_Reviewer_1), Internal_Reviewer_1')
                    ->selectRaw('Internal_Reviewer_1')
                    ->pluck('count(Internal_Reviewer_1)','Internal_Reviewer_1');
        $user= User:: all();
        
        $semester = semesterlist::all();
        
        return view('admin.internalreview',compact('user','collection','semester'));
    }
     
    public function index1(Request $request)
    {
        if($request->ajax())
        {
            $data = Student::latest()->get();
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
        $collection = Student::groupBy('sv_init')
                    ->where("semester",$search)
                    ->selectRaw('count(sv_init), sv_init')
                    ->selectRaw('sv_init')
                    ->pluck('count(sv_init)','sv_init');
        $user= User:: all();
        
        return view('admin.display',compact('user','collection'));
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

        return response()->json(['success' => 'Data Added successfully.']);

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
            $data = Student::findOrFail($id);
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
            'Internal_Reviewer_name'    =>  $request->Internal_Reviewer_name
        );

        Student::whereId($request->hidden_id)->update($form_data);

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
