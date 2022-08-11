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

        $notes = Note::where('user_id', $user_id)->paginate(2);
        return view('home.home', [
            'notes' => $notes,
        ]);
    }

    public function createNote(Request $request)
    {
        $requestBody = json_decode($request->getContent());

        $created_notes = Note::create([
            'title' => isset($requestBody->title) ? $requestBody->title: "empty title",
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
}
