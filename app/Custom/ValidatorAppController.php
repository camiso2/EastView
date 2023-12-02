<?php

namespace App\Custom;

use Validator;
use Illuminate\Support\Facades\Log;
use App\Custom\StatusController;
use Illuminate\Foundation\Validation\ValidatesRequests;



class ValidatorAppController
{

    /**
     * Validate data register user
     *
     * @param mixed $request
     *
     * @return $validator
     *
     */
    public static function getDataUserRegister($request){
        try{

            $validator = Validator::make($request->all(), [
                'name' => 'required|between:2,100',
                'email' => 'required|email|unique:citizens|max:50',
                'phone' => 'required|string|min:1|unique:citizens|max:10',
            ]);

            return $validator;

        } catch (\Exception $e) {
            Log::info("Error exception getDataUserRegister./" . $e->getMessage());
            return StatusController::eMessageError([$e->getMessage()], 'Error exception getDataUserRegister.');

        }
    }

    /**
     * Validate data task asignation user
     *
     * @param mixed $request
     *
     * @return $validator
     *
     */
    public static function getDataTashRegister($request){
        try{

            $validator = Validator::make($request->all(), [
                'task' => 'required|between:2,100',
                'citizen_id' => 'required',
                'day' => 'required|string|min:1',
            ]);
            return $validator;

        } catch (\Exception $e) {
            Log::info("Error exception getDataUserRegister./" . $e->getMessage());
            return StatusController::eMessageError([$e->getMessage()], 'Error exception getDataUserRegister.');

        }
    }




}



