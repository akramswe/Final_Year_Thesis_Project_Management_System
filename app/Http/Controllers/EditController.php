<?php

namespace App\Http\Controllers;

use App\Sample_data;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Student;
use App\User;
use App\Feedback;
use DB;
use App\Semester;
use App\semesterlist;
use App\ProjectDetail;

class EditController extends Controller
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
     
     
    public function index(Request $request)
    {
        $semester = semesterlist::all();
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
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
     }
     
             
        // $semester = Semester::all();  
        $user= User:: all();
        return view('admin.showstudent',compact('user','semester'));
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
            's_id' => 'required',
            's_name' => 'required',
            'batch' => 'required',
            'semester' => 'required',
            'email' => 'required|string|email|max:255|unique:project_details',        
            'phone' => 'required',
            'project' => 'required',
            'cgpa' => 'required',
            'credit' => 'required',
            'study' => 'required',
            'title' => 'required',
            'description' => 'required'
            
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       $student = new ProjectDetail;

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
         $student->campus = $request->input('campus');
         $student->user_id = auth()->user()->id;
         
        $student->save();

        return response()->json(['success' => 'Proposal Added successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
    public function show($sample_data)
    {
        if(request()->ajax())
        {
            $data = ProjectDetail::findOrFail($sample_data);
            return response()->json(['result' => $data]);
        }
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
            's_id' =>  'required',
            's_name'=>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            's_id'   =>  $request->s_id,
            's_name'   =>  $request->s_name,
            'batch'    =>  $request->batch,
            'semester' =>  $request->semester,
            'email'    =>  $request->email,
            'phone'    =>  $request->phone,
            'project'  =>  $request->project,
            'cgpa'     =>  $request->cgpa,
            'study'    =>  $request->study,
            'title'    =>  $request->title,
            'description' =>  $request->description

        );

        ProjectDetail::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Proposal is successfully updated']);

    }

     
     
    // public function update(Request $request, Sample_data $sample_data)
    // {

    //     $rules = array(
    //         's_id' =>  'required',
    //         's_name'=>  'required'
    //     );

    //     $error = Validator::make($request->all(), $rules);

    //     if($error->fails())
    //     {
    //         return response()->json(['errors' => $error->errors()->all()]);
    //     }
        
    //             $isExist = Feedback::select("*")

    //                     ->where("s_id", $request->s_id)

    //                     ->exists();

   

    //     if ($isExist) {

    //          $form_data = array(
    //         's_id'   =>  $request->s_id,
    //         's_name'   =>  $request->s_name,
    //         'batch'    =>  $request->batch,
    //         'semester' =>  $request->semester,
    //         'email'    =>  $request->email,
    //         'phone'    =>  $request->phone,
    //         'project'  =>  $request->project,
    //         'cgpa'     =>  $request->cgpa,
    //         'credit'     =>  $request->credit,
    //         'study'    =>  $request->study,
    //         'title'    =>  $request->title,
    //         'description' =>  $request->description

    //     );

    //     Feedback::whereId($request->hidden_id)->update($form_data);

    //     }else{

    //          $student = new Feedback;

    //          $student->s_id = $request->input('s_id');
    //          $student->s_name = $request->input('s_name');
    //          $student->email = $request->input('email');
    //          $student->phone = $request->input('phone');
    //          $student->project = $request->input('project');
    //          $student->cgpa = $request->input('cgpa');
    //          $student->credit = $request->input('credit');
    //          $student->study = $request->input('study');
    //          $student->title = $request->input('title');
    //          $student->description = $request->input('description');
    //          $student->user_id = auth()->user()->id;
         
    //     $student->save();

    //     return response()->json(['success' => 'Data Added successfully.']);

    //     }

        

    //     return response()->json(['success' => 'Student Info is successfully updated']);

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProjectDetail::findOrFail($id);
        $data->delete();
    }
}
