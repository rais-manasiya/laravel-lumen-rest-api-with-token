<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use Auth;

class ParticipantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllParticipants()
    {   
        
        $Participant = Participant::all();
        if($Participant->isEmpty())
        {
            return response()->json(['status' => 'Participants data not found'], 200);
        }
        else
        {
            return response()->json(['status' => 'success','result' => Participant::simplePaginate(5)]);
        }
        
    }

    public function showOneParticipant($id)
    {
        $Participant = Participant::where('id', '=', $id)->first();
        if ($Participant === null) {
          return response()->json(['status' => 'Participant does not Exist'], 200);
        }
        else
        {  
           return response()->json(['status' => 'success','result' => Participant::find($id)]);
        }
    }

    public function create(Request $request)
    {
       $this->validate($request, [
            'name' => 'required',
            'age' => 'required|integer',
            'dob' => 'required|date_format:Y-m-d',
            'profession' => 'required|in:Employed,Student',
            'locality' => 'required',
            'no_of_guests' => 'required|integer|between:1,10',
            'address' => 'required|max:50',
        ]);

       
        /*$Participant = Participant::create($request->all());

        return response()->json($Participant, 201);
*/
        if(Participant::create($request->all())){
            return response()->json(['status' => 'Participant added Successfully'],200);
        }else{
            return response()->json(['status' => 'Failed in adding Participant'],200);
        }

       
    }

    public function update($id, Request $request)
    {
        $Participant = Participant::where('id', '=', $id)->first();
        if ($Participant === null) {
           return response('Participant does not Exist', 200);
        }
        else
        {  
            $this->validate($request, [
                'name' => 'required',
                'age' => 'required|integer',
                'dob' => 'required|date_format:Y-m-d',
                'profession' => 'required|in:Employed,Student',
                'locality' => 'required',
                'no_of_guests' => 'required|integer|between:1,10',
                'address' => 'required|max:50',
            ]);

            $Participant = Participant::findOrFail($id);
            $Participant->update($request->all());

            return response()->json($Participant, 200);
        }
    }

    public function delete($id)
    {
        $Participant = Participant::where('id', '=', $id)->first();
        if ($Participant === null) {
           return response()->json(['status' => 'Participant does not Exist'], 200);
        }
        else
        {            
            Participant::findOrFail($id)->delete();
             return response()->json(['status' => 'Participant Deleted Successfully'], 200);
        }
    }
}