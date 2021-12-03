<?php

namespace App\Http\Controllers;

use App\Sample_data;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Student;
use App\Feedback;
use App\User;
use DB;

class AbsentstudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
if(request()->ajax())
     {
       if($request->category)
      {
       $data = DB::table('feedback')
         ->where('semester', $request->category && 'a_status', 'Absent' )
         ->orwhere('a_status', 'Waiting')
         ->join('students', 'feedback.s_id', '=', 'students.s_id')
            ->select('students.*','feedback.*')
            ->get();
      }
      else
      {
       $data = DB::table('feedback')
         ->where('a_status', 'Absent')
         ->orwhere('a_status', 'Waiting')
         ->join('students', 'feedback.s_id', '=', 'students.s_id')
            ->select('students.*','feedback.*')
            ->get();
      }
      return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-refresh"></i> Shift</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
     }
          
        $user= User:: all();
        return view('admin.absentstudentlist',compact('user'));
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
            'semester' => 'required',
            'email' => 'required|email|string|max:255|unique:feedback',        
            'feedback' => 'required'
            
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       $student = new Feedback;

         $student->s_id = $request->input('s_id');
         $student->s_name = $request->input('s_name');
         $student->semester = $request->input('semester');
         $student->email = $request->input('email');
         $student->a_status = $request->input('a_status');
         $student->sv_init = $request->input('sv_init');
         $student->sv_name = $request->input('sv_name');
         $student->feedback = $request->input('feedback');
         $student->user_id = auth()->user()->id;
         
        $student->save();

        return response()->json(['success' => 'Feedback Added successfully.']);

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
            'semester'=>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'semester' =>  $request->semester
        );

        Student::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Student Info is successfully updated']);

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
