<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostSettings extends Controller
{
    private $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function createMeme()
    {
        $title = $this->request->input("title");
        $keywords = $this->request->input("keywords");
        $imageURL = $this->request->input("imageURL");

        DB::table('memes')->insert([
            'title' => $title,
            'keywords' => $keywords,
            'imageURL' => $imageURL
        ]);
        return redirect()->route('feed')->with('message', 'Meme başarıyla eklendi!');
    }
    public static function showMeme()
    {
        $memes = DB::table("memes")->get()->reverse();
        return $memes->toArray();
    }
}
