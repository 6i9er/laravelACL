<?php
namespace App\Http\Controllers;
use App\Enums\PermissionEnums;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Validator;
class PermissionsController extends Controller
{
    function __construct() {
    }
    public function index(){
        return View('permissions.index');
    }

    public function savePermission(Request $request){
        $validator = Validator::make($request->all(), PermissionEnums::$savePermissionRules);
        if (!$validator->passes()) {
            $msg = getErrorMessageDataForLiTag($validator->errors()->all() );
            return [
                'errors' => 1,
                'msg' => $msg
            ];
        }else{
            // check if the module is found in the permissions_modules_id_array_enums

            //check if the permission_uuid is found on the database
                // => if yes then it will update on the database
                // => if no then it will create new One
            //return json Success Message
            return $request;

        }
    }

}