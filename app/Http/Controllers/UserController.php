<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{        
    public function callHRApi( Request $request )
    {
        $user = new User();
        $data = $request->all();
        $url = env('HR_APP_BASE_URL') . "API_HR/api.php";

        try {            
            $response = $user->callAPI('POST', $url, json_encode($data));
                        
        } catch( Exception $ex ){
            $response = $ex->getMessage();
        }
        
        return $response;
    }
    
}
