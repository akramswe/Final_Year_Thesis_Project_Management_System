<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Notice;
use App\User;
use App\Feedback;
use DB;

class NoticeController extends Controller
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
       $data = DB::table('notices')
         ->where('semester', $request->category);
      }
      else
      {
       $data = DB::table('notices')
         ->select("*");
      }
      

      return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o"></i> ADD</button>';
                        // $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
     }
     
             
          
        $user= User:: all();
        return view('admin.notice',compact('user'));
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

       $student = new Notice;

         $student->semester = $request->input('semester');
         $student->contact = $request->input('contact');
         $student->google_code = $request->input('google_code');
         $student->seminar_date = $request->input('seminar_date');
         $student->meet_link = $request->input('meet_link');
         $student->description = $request->input('description');
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
            $data = Notice::findOrFail($id);
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

            $student = new Notice;
         
         
      $form_data = array(
        'semester' => $request->semester,
         'contact' => $request->contact,
         'google_code' => $request->google_code,
         'seminar_date' => $request->seminar_date,
         'meet_link' => $request->meet_link,
         'description' => $request->description,
         'user_id' => auth()->user()->id

        );

        Notice::whereId($request->hidden_id)->update($form_data);

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
        $data = Notice::findOrFail($id);
        $data->delete();
    }
}
