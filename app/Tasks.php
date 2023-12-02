<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Custom\StatusController;
use App\Custom\ValidatorAppController;

class Tasks extends Model
{
    use SoftDeletes;
    protected $table = "tasks";

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */


    protected $fillable = [
       'task',
       'citizen_id',
       'day',
   ];

    /**
     * REgister citizens data user
     *
     * @param mixed $request
     *
     * @return array
     *
     */
    public static function setRegisterTask($request): array
    {

        if (ValidatorAppController::getDataTashRegister($request)->fails()) {
            return StatusController::successfullMessage(422, 'Register validation error', false, count(ValidatorAppController::getDataTashRegister($request)->errors()), ['error' => ValidatorAppController::getDataTashRegister($request)->errors()]);
        }

        //$account = tasks::create(array_merge(ValidatorAppController::getDataTashRegister($request)->validated()));
        $account = new Tasks;
        $account->task = $request['task'];
        $account->citizen_id = $request['citizen_id'];
        $account->day = $request['day'];
        $success =  $account->save();

        if ($success) {
            return StatusController::successfullMessage(201, 'Register successfull', true, $account->count(), ['citizens' => $account]);
        }
        return StatusController::successfullMessage(102, 'Register error', false, 0, ['error' => ['unknown error']]);
    }


        /**
     * delete user data base
     *
     * @param mixed $id
     *
     * @return array
     *
     */
    public static function setTaskdelete($id): array
    {

        $task = Tasks::where('id', $id);
        if($task->delete()){
            return StatusController::successfullMessage(201, 'Deleted task for id', true, 1, ['id' => $id, 'message'=>'delete' ]);
        }
        return StatusController::successfullMessage(201, 'Deleted not found, id  not exist', false, 0, ['error' => 'id_not_exist']);


    }

}
