<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;

class ParticipantController extends Controller
{
    // GET /participants
    public function index()
    {
        return Participant::select('id', 'firstname', 'lastname')->get();
    }

    // GET /participants/{id}
    public function participantById($id)
    {
        return Participant::select('id', 'firstname', 'lastname')->where('id', $id)->get();
    }

    // GET /participants/{id}/{passcode}
    public function participantCompleteData($id, $passcode)
    {
        return Participant::select('*')->where(['id' => $id, 'passcode' => $passcode])->get();
    }

    // GET /participants/page/{page}/{limit}
    public function fetchByPage($page, $limit = 3)
    {
        return Participant::select('id', 'firstname', 'lastname')->limit($limit)->offset($page - 1)->get();
    }

    // DELETE /participants/{id}/{passcode}
    public function deleteParticipant($id, $passcode)
    {
        if (Participant::where(['id' => $id, 'passcode' => $passcode])->delete()) {
            return array('id' => $id);
        } else {
            return array('error' => 'Nothing to delete');
        }
    }

    // PUT /participants/{id}/{passcode}
    public function updateParticipant(Request $request, $id, $passcode)
    {
        $data =  $request->json()->all();
        if (Participant::where(['id' => $id, 'passcode' => $passcode])->update($data)) {
            return array('id' => $id);
        } else {
            return array('error' => 'Nothing to update');
        }
    }

    // POST /participants
    public function createParticipant(Request $request)
    {
        $data =  $request->json()->all();
        return Participant::create($data);
    }
}
