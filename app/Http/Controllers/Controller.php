<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    { $user = Auth::user();
        //dd($user->email);
        if($user && $user->administrateur)
    {        
      $prospectController = new ProspectController();
        $prospectCount = $prospectController->countProspects();
        $prospectCountok = $prospectController->countProspectsok();
        $prospectCountnook = $prospectController->countProspectsnook();
        $userController = new UserController();
        $userCount = $userController->countUsers();
    
        return view('dashboard', compact('prospectCount','userCount','prospectCountok','prospectCountnook'));
    }
    else{
        $prospectController = new ProspectController();
        $prospectCount = $prospectController->countProspects();
        $userController = new UserController();
        $userCount = $userController->countUsersok();

        return view('accueil',compact('prospectCount','userCount'));}

}
}
