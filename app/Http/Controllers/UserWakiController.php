<?php

namespace App\Http\Controllers;
use App\Models\UserWakiModel;
use Illuminate\Http\Request;

class UserWakiController extends Controller
{
    public function index(){
        $userData = UserWakiModel::get();
        return json_encode(array(
            "data"=>$userData
        ));
    }

    public function store(Request $request){
        UserWakiModel::create($request->all());
        $userData = UserWakiModel::get();
        return json_encode(array(
            "data"=>$userData
        ));
        
    }

    public function edit(Request $request){
        $userData = UserWakiModel::find($request->input('edit_id'));
        $userData->name = $request->input('edit_name');
        $userData->email = $request->input('edit_email');
        $userData->save();
        $Data = UserWakiModel::get();
        return json_encode(array(
            "data"=>$Data
        ));
    }
    public function delete(Request $request){
        $userData = UserWakiModel::find($request->input('delete_id'));
        $userData->delete();
        $Data = UserWakiModel::get();
        return json_encode(array(
            "data"=>$Data
        ));
    }
}
