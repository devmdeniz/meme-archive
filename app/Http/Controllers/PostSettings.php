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
    /*
    ! PostType{
        ? 0: Image With URL
        ? 1: Video With URL
        ? 2: Gif With URL
        ? 3: Just Text
        ? 4: Image With Upload
        ? 5: Video With Upload
        ? 6: Gif With Upload
        }
        ! */
    public function createMeme()
    {
        /**
         * Get Data from Request
         */
        $number = $this->request->input("memeType");
        $title = $this->request->input("title");
        $keywords = $this->request->input("keywords");
        $imageURL = $this->request->input("imageURL");

        /**
         * Upload Image,Video,GIF with using URL
         * Numbers must be different but saving style is same
         * Showing styles is different
         */

        if ($number == 0 || $number == 1 || $number == 2) {
            $this->createMemeWithImageURL($title, $keywords, $imageURL,$number);
        }
        return redirect()->route('feed')->with('message', 'Meme başarıyla eklendi!');
    }

    private function createMemeWithImageURL($title, $keywords, $imageURL,$number)
    {
        DB::table('memes')->insert([
            'title' => $title,
            'keywords' => $keywords,
            'imageURL' => $imageURL,
            'postType' => $number
        ]);
    }

    public static function showMeme()
    {
        $memes = DB::table("memes")->get()->reverse();
        return $memes->toArray();
    }
}
