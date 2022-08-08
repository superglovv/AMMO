<?php

namespace App\Http\Controllers;

use App\Models\PostUser;
use Illuminate\Http\Request;


class MovieUserController extends Controller
{
    //

    public function store (Request $request){
        MovieUser::create($request->all());

        return redirect()->back();
    }

    public function destroy (MovieUser $postUser){
        $movieUser->delete();

        return redirect()->back();
    }
}
