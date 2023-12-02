<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use App\Custom\StatusController;
use Illuminate\Http\JsonResponse;
use App\User;
use App\Citizens;
use Validator;

class CitizensController extends Controller
{
    
    /**
     * Registra usuarios con reespuesta json
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     */
    public function registerCitizens(Request $request):JsonResponse
    {


        try {
          return response()->json(Citizens::setRegister($request));
        } catch (\Exception $e) {
            Log::info("Error exception register./" . $e->getMessage());
            return response()->json(StatusController::eMessageError([$e->getMessage()], 'Error exception register.'));
        }
    }


     /**
     * delete citizen for vitizen_id
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function deleteCitizen(Request $request){
        try {
            return response()->json(citizens::setCitizenDelete($request->id));
        } catch (\Exception $e) {
            Log::info('Error exception deleteUser/' . $e->getMessage());
            return response()->json(StatusController::eMessageError([$e->getMessage()], 'Error exception deleteUser.'));

        }
    }

}
