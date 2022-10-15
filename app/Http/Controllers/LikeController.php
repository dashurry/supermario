<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function productLike(Request $req)
    {
        if($req->ajax())
        {
            $product_id = $req->product_id;
            $ip = $req->ip();

            $vote = null; // 0 = Liked 1= Unvoted
            $likeCount = 0;

            //if Liked...
            if($liked = Like::where('product_id',$product_id)->where('user_ip',$ip)->first())
            {
                /* delete Like on product delete */
                if($liked->delete())
                {
                    $vote = 1;
                    $likeCount = count(Like::where('product_id',$product_id)->get());
                }
                else{
                    $vote = 2;
                }
            }
            else{
                $newLike = new Like();

                $newLike->product_id = $product_id;
                $newLike->user_ip = $ip;

                if ($newLike->save()) {
                    $vote = 0;
                    $likeCount = count(Like::where('product_id',$product_id)->get());
                }
                else{
                    $vote = 2;
                }
            }
            return json_encode(array(
                "code" => $vote,
                "likes" => $likeCount,
            ));
        }
    }
}
