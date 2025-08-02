<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class AdController extends Controller
{
    public function show(String $slug){
        $ad = Advertise::where('slug',$slug)->first();
        //  $ad = DB::select('SELECT * FROM advertises WHERE slug = ? LIMIT 1', [$slug]);

        // $ad = $ad[0] ?? null;

       if(!$ad){
        return view('erro-404');
       }
       $idAnTela = $ad->id;
     //  dd($idAnTela);

       $ad->views++;
       $ad->save();

       $adsAll = Advertise::where('category_id',$ad->category_id)
       ->where('state_id',$ad->state_id)
       ->whereNotIn('id',[$idAnTela])
       ->with('images')
       ->limit(4)
       ->get();

    //    $imgUrl = AdvertiseImage::where('advertise_id',$adsAll->id)
    //    ->where('featured',1)
    //    ->get();
    //    $urlImg = $imgUrl[0]->url;
       return view('single-ad',compact('ad','adsAll'));
    }
}
