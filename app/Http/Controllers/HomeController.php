<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('loggedOut');
    }

    public function home()
    {
        Session::put('title', "Home");
        $user_id = Session::get('loginId');

        $notes = Note::where('user_id', $user_id)->paginate(10);
        return view('home.home', [
            'notes' => $notes,
        ]);
    }

    public function createNote(Request $request)
    {
        $requestBody = json_decode($request->getContent());

        $created_notes = Note::create([
            'title' => isset($requestBody->title) ? $requestBody->title : "empty title",
            'body' => isset($requestBody->body) ? $requestBody->body : "empty body",
            'user_id' => Session::get('loginId'),
        ]);

        if ($created_notes) {
            return Response::json([
                "error" => false,
                'message' => "note add successfully",
            ], 200);
        } else {
            return Response::json([
                "error" => true,
                'message' => "Something went wrong",
            ], 500);
        }
    }

    public function updateQuery($noteId, $note)
    {
        return Note::where('id', $noteId)
            ->where('user_id', Session::get('loginId'))
            ->update($note);
    }

    public function updateNote($id, Request $request)
    {
        $requestBody = json_decode($request->getContent());
        $title = isset($requestBody->title) ? $requestBody->title : false;
        $body = isset($requestBody->body) ? $requestBody->body : false;

        if ($title && $body) {
            $updatedNote = $this->updateQuery($id, [
                'title' => $title,
                'body' => $body,
            ]);
            if ($updatedNote) {
                return Response::json([
                    'error' => false,
                    'message' => "note updated successfully",
                ], 200);
            } else {
                return Response::json([
                    'error' => true,
                    'message' => "something went wrong",
                ], 500);
            }
        } else if ($title) {
            $updatedNote = $this->updateQuery($id, [
                'title' => $title,
            ]);
            if ($updatedNote) {
                return Response::json([
                    'error' => false,
                    'message' => "note title updated successfully",
                ], 200);
            } else {
                return Response::json([
                    'error' => true,
                    'message' => "something went wrong",
                ], 500);
            }
        } else if ($body) {
            $updatedNote = $this->updateQuery($id, [
                'body' => $body,
            ]);
            if ($updatedNote) {
                return Response::json([
                    'error' => false,
                    'message' => "note body updated successfully",
                ], 200);
            } else {
                return Response::json([
                    'error' => true,
                    'message' => "something went wrong",
                ], 500);
            }
        } else {
            return Response::json([
                'error' => true,
                'message' => "all items needed",
            ], 400);
        }
    }

    public function deleteNote($id)
    {
        $note = Note::find($id)->first();
        $note->delete();
        return Response::json([
            'error' => false,
            'message' => "note deleted",
        ],200);
    }
}
