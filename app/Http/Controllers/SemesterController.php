<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Student;
use App\User;
use App\Semester;
use DB;

class SemesterController extends Controller
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
        if(request()->ajax())
             {
               $data = DB::table('semesters');
              return DataTables::of($data)
                            ->addColumn('action', function($data){
                                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-info btn-sm"> <i class="fa fa-pencil-square-o"></i> ADD</button>';
                              
                                return $button;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
             }
                  
                $user= User:: all();
                return view('admin.semesterinfo',compact('user'));
     }
     
        public function messagelist()
    {
        $students = Message::all();
        return view('message.messagelist', compact('students'));
    }
     
  public function semesterlink()
    {
        $semester = Semester::all();
        return view('admin.linkdisable', compact('semester'));
    }
    
    
    public function openlink(Request $request) {
        $id = $request->id;
        $user = Semester::find($id);
        $user->status = 'open';
        $user->save();
    }
    
        public function offlink(Request $request) {
        $id = $request->id;
        $user = Semester::find($id);
        $user->status = 'stop';
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
        if(request()->ajax())
        {
            $data = Semester::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'semester_name' =>  'required',
            'year'=>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'semester_name'   =>  $request->semester_name,
            'year'    =>  $request->year,
        );

        Semester::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Semester Info is successfully updated']);

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
