<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertRequest;
use App\Tour;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index($page=0){
        $tours=Tour::all();
        $quantity=count($tours);
        $result=[];
        for($i=$page*5;$i<$page+5;$i++){
            array_push($result,$tours[$i]);
        }
        return view('admin',['tours'=>$result,'quantity'=>$quantity]);
    }
    function page(Request $req){
        $page=$req->page;
        $tours=Tour::all();
        $quantity=count($tours);
        $result=[];
        for($i=$page*5;$i<$page+5;$i++){
            array_push($result,$tours[$i]);
        }
        return view('admin',['tours'=>$result,'quantity'=>$quantity]);
    }
    function insert(InsertRequest $req){
       $tour = new Tour();
       $tour->name=$req->input('name');
       $tour->typetour=$req->input('typetour');
       $tour->schedule=$req->input('schedule');
       $tour->depart=$req->input('depart');
       $tour->numberPeople=$req->input('numberPeople');
       $tour->price=$req->input('price');
       $tour->image=$this->createImage($req->input('image'),'storage/public/');
       $tour->save();
       return redirect('admin');
    }
    public function createImage($img,$folderPath)
    {
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '. '.$image_type;
        file_put_contents($file, $image_base64);
        return $file;
    }
}
