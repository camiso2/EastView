<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Custom\StatusController;
use App\Custom\ValidatorAppController;

use App\tasks;
use Illuminate\Support\Facades\Validator;


class Citizens extends Model
{
    use SoftDeletes;

    protected $table = "citizens";

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


     protected $fillable = [
        'name',
        'email',
        'phone',
    ];
     /**
     * REgister citizens data user
     *
     * @param mixed $request
     *
     * @return array
     *
     */
    public static function setRegister($request): array
    {

        if (ValidatorAppController::getDataUserRegister($request)->fails()) {
            return StatusController::successfullMessage(422, 'Register validation error', false, count(ValidatorAppController::getDataUserRegister($request)->errors()), ['error' => ValidatorAppController::getDataUserRegister($request)->errors()]);
        }

        $account = new Citizens;
        $account->email = $request['email'];
        $account->name = $request['name'];
        $account->phone = $request['phone'];
        $success =  $account->save();

        if ($success) {
            return StatusController::successfullMessage(201, 'Register successfull', true, $account->count(), ['citizens' => $account]);
        }
        return StatusController::successfullMessage(102, 'Register error', false, 0, ['error' => ['unknown error']]);
    }

     /**
     * delete citizen data base
     *
     * @param mixed $id
     *
     * @return array
     *
     */
    public static function setCitizenDelete($id): array
    {

        $citizens = Citizens::where('id', $id);
        if($citizens->delete()){
            return StatusController::successfullMessage(201, 'Deleted task for id', true, 1, ['id' => $id, 'message'=>'delete' ]);
        }
        return StatusController::successfullMessage(201, 'Deleted not found, id  not exist', false, 0, ['error' => 'id_not_exist']);


    }

}
