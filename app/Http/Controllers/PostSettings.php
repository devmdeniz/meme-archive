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
    TODO: Connect database this options
    ! PostType{
        ? 0: Image With URL
        ? 1: Youtube Video With URL
        ? 2: Gif With URL
        ? 3: Just Text
        ? 4: Image With Upload
        ? 5: Video With Upload
        ? 6: Gif With Upload
        ? 7: Just Video With URL
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

        if ($number == 0 || $number == 2 || $number == 7) {
            $this->createMemeWithImageURL($title, $keywords, $imageURL,$number);
        } else if($number == 1) {
            $this->createMemeWithYoutubeVideoURL($title, $keywords, $imageURL,$number);
        } else if($number == 3){
            $this-> createMemeWithText($title,$keywords,$number);
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

    private function createMemeWithYoutubeVideoURL($title,$keywords,$imageURL,$number){
        $imageURL = parse_str(parse_url($imageURL, PHP_URL_QUERY), $queryParams);
        $imageURL = $queryParams['v'] ?? null;
        DB::table('memes')->insert([
            'title' => $title,
            'keywords' => $keywords,
            'imageURL' => $imageURL,
            'postType' => $number
        ]);
    }

    private function createMemeWithText($title,$keywords,$number){
        DB::table('memes')->insert([
            'title' => $title,
            'keywords' => $keywords,
            'postType' => $number
        ]);
    }

    public static function showMeme()
    {
        $memes = DB::table("memes")->get()->reverse();
        return $memes->toArray();
    }

    public static function getMemeTypes()
    {
        $memeTypes = DB::table("postTypes")->get();
        return $memeTypes->toArray();
    }

    public function deleteMeme($id)
    {
        DB::table("memes")->where("id", $id)->delete();
        return redirect()->route("feed")->with('message', 'Meme başarıyla silindi!');
    }

}
