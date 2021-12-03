<?php

namespace App\Http\Controllers;

use App\Sample_data;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Student;
use App\User;
use App\Message;
use DB;

class EditproposalController extends Controller
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
        $user_id = Auth()->user()->email;
        
        if(request()->ajax())
     {
       $user_id = Auth()->user()->email;
     $query = DB::table('students')->select('id','edit')->where('email', $user_id)->get();
     $edit1 = 12;
     $edit = 2;
     
      if($query =! 1 OR $query =1 )
      {
       $data = DB::table('students')
       ->Select("*")
         ->where('email', $user_id);
         return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button  type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
      }
      else
      {
       $data = DB::table('students')
         ->where('email', $user_id);
         return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button disabled type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
      }
       
     }

        $message = Message::all();
        $user = User::all();
        return view('student.editproposal',compact('user','message'));
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
    public function show($sample_data)
    {
        if(request()->ajax())
        {
            $data = Student::findOrFail($sample_data);
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

        Student::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Proposal is successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::findOrFail($id);
        $data->delete();
    }
}
