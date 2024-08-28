<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    //
    public function add(Request $request){
       Log::info("data" . json_encode($request->all()));
        try{
        $validate = $request->validate([
            'name'=>'required|string|max:20',
            'subject'=>'required|string|max:20',
            'marks'=>'required|numeric'
        ]);

        $existingrecord = Students::where('name',$validate['name'])->where('subject',$validate['subject'])->first();
        
        if($existingrecord){
            return response([
                'status'=>'error',
                'message'=>'This student has already been'
            ]);
        }

        Students::create($validate);
        
        return response([
            'status'=>'success',
            'message'=>'This student has been added successfully'
        ],201);
    }catch(\Exception $e){
        Log::error("Error: ".$e->getMessage());

        return redirect()->back()->with('error','failed to add data '.$e->getMessage());
    }
    }

    public function update(Request $request){
        $validate = $request->validate([
            'id'=>'required|exists:students,id',
            'name'=>'required|string|max:20',
            'subject'=>'required|string|max:20',
            'marks'=>'required|numeric'
        ]);

        $student = Students::find($request->id);
        $student->update([
            'name'=>$validate['name'],
            'subject'=>$validate['subject'],
            'marks'=>$validate['marks']
        ]);

        return redirect()->back()->with('success','marks updated successfully');
    }


    public function delete($id){
       $students =  Students::find($id);

       if(!$students){
        return redirect()->back()->with('error','No students found');
       }

       $students->delete();

       return redirect()->back()->with('success','Successfully deleted');
    }
}
