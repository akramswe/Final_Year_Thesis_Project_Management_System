<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Eligibility;
use App\User;
use App\Feedback;
use DB;

class EligibilityController extends Controller
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

       $data = DB::table('eligibilities')
         ->select("*");
      
      return DataTables::of($data)
                    ->addColumn('action', function($data){
                       $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
     }
             
        $user= User:: all();
        return view('admin.eligibility',compact('user'));
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

       $student = new Eligibility;

         $student->thesis = $request->input('thesis');
         $student->intrnship = $request->input('intrnship');
         $student->project = $request->input('project');
         $student->user_id = auth()->user()->id;
         
        $student->save();

        return response()->json(['success' => 'Data Added successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
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
            $data = Eligibility::findOrFail($id);
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
    public function update(Request $request)
    {

            $student = new Eligibility;
         
         
      $form_data = array(
        'project' => $request->project,
         'thesis' => $request->thesis,
         'intrnship' => $request->intrnship,
         'user_id' => auth()->user()->id

        );

        Eligibility::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Eligibility is successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Eligibility::findOrFail($id);
        $data->delete();
    }
}
