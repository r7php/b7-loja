<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;

class DeleteController extends Controller
{

      public function delete(String $id){

        echo $id;
        $ad = Advertise::where('id',$id)
        ->where('user_id', Auth::user()->id)
        ->first();

        if($ad){
            AdvertiseImage::where('advertise_id', $ad->id)
            ->delete();
            $ad->delete();
            return redirect()->back();
        }else{
            echo 'Erro ao deletat';
        }




    }

}
