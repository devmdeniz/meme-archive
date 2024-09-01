<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\JWTDecode;

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
        $userid = JWTDecode::decodeJWTforUserId($this->request);
        /**
         * Upload Image,Video,GIF with using URL
         * Numbers must be different but saving style is same
         * Showing styles is different
         */

        if ($number == 0 || $number == 2 || $number == 7) {
            $this->createMemeWithImageURL($title, $keywords, $imageURL,$number,$userid);
        } else if($number == 1) {
            $this->createMemeWithYoutubeVideoURL($title, $keywords, $imageURL,$number,$userid);
        } else if($number == 3){
            $this-> createMemeWithText($title,$keywords,$number,$userid);
        }
        return redirect()->route('feed')->with('message', 'Meme başarıyla eklendi!');
    }

    private function createMemeWithImageURL($title, $keywords, $imageURL,$number,$userid)
    {
        DB::table('memes')->insert([
            'title' => $title,
            'keywords' => $keywords,
            'imageURL' => $imageURL,
            'postType' => $number,
            'userID' => $userid
        ]);
    }

    private function createMemeWithYoutubeVideoURL($title,$keywords,$imageURL,$number,$userid){
        $imageURL = parse_str(parse_url($imageURL, PHP_URL_QUERY), $queryParams);
        $imageURL = $queryParams['v'] ?? null;
        DB::table('memes')->insert([
            'title' => $title,
            'keywords' => $keywords,
            'imageURL' => $imageURL,
            'postType' => $number,
            'userID' => $userid
        ]);
    }

    private function createMemeWithText($title,$keywords,$number,$userid){
        DB::table('memes')->insert([
            'title' => $title,
            'keywords' => $keywords,
            'postType' => $number,
            'userID' => $userid
        ]);
    }

    public static function showMeme()
    {
        $memes = DB::table("memes")->get()->reverse();
        return $memes->toArray();
    }

    public static function showMemeById($id){
        return DB::table("memes")->where("id", $id)->first();
    }

    public static function showMemeTypeByPostId($id){
        $memes = DB::table("memes")->where("id",$id)->first();
        $memeType = $memes->postType;
        return DB::table("postTypes")->where("id",$memeType)->first();
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

    public function editMeme()
    {
        $id = $this->request->route('id');
        $title = $this->request->input("title");
        $keywords = $this->request->input("keywords");
        $imageURL = $this->request->input("imageURL");
        $number = $this->request->input("memeType");

        if ($number == 0 || $number == 2 || $number == 7) {
            $this->editMemeWithImageURL($id, $title, $keywords, $imageURL,$number);
            return redirect()->route('feed')->with('message', 'Meme başarıyla güncellendi!');
        } else if($number == 1) {
            $this->editMemeWithYoutubeVideoURL($id, $title, $keywords, $imageURL,$number);
            return redirect()->route('feed')->with('message', 'Meme başarıyla güncellendi!');
        } else if($number == 3){
            $this-> editMemeWithText($id,$title,$keywords,$number);
            return redirect()->route('feed')->with('message', 'Meme başarıyla güncellendi!');
        }
        return redirect()->route('feed')->with('message', 'Meme oluşturma başarısız oldu!');
    }

    private function editMemeWithImageURL($id,$title,$keywords,$imageURL,$number){
        DB::table("memes")->where("id",$id)->update([
            'title' => $title,
            'keywords' => $keywords,
            'imageURL' => $imageURL,
            'postType' => $number
        ]);
    }
    private function editMemeWithYoutubeVideoURL($id,$title,$keywords,$imageURL,$number){
        $imageURL = parse_str(parse_url($imageURL, PHP_URL_QUERY), $queryParams);
        $imageURL = $queryParams['v'] ?? null;
        DB::table("memes")->where("id",$id)->update([
            'title' => $title,
            'keywords' => $keywords,
            'imageURL' => $imageURL,
            'postType' => $number
        ]);
    }
    private function editMemeWithText($id,$title,$keywords,$number){
        DB::table("memes")->where("id",$id)->update([
            'title' => $title,
            'keywords' => $keywords,
            'postType' => $number
        ]);
    }
}
