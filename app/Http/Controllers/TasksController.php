<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\StatusController;
use Illuminate\Support\Facades\Log;
use App\Citizens;
use App\Tasks;

use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function register(Request $resquest)
    {

        try {

            return response()->json(tasks::setRegisterTask($resquest));

        } catch (\Exception $e) {

            Log::info("Error exception register./" . $e->getMessage());
            return response()->json(StatusController::eMessageError([$e->getMessage()], 'Error exception register.'));

        }

    }

    public function searchTask(Request $request)
    {

        try {

            $task = Tasks::where('day', '=', $request->searchTask)->orderBy('task', 'ASC')->get()->toArray();

            for ($i = 0; $i < sizeof($task); $i++) {
                $citizen = citizens::where('id', '=', $task[$i]['citizen_id'])->get();
                foreach ($citizen as $citize) {
                    $task[$i]['email'] = $citize->email;
                    $task[$i]['name']  = $citize->name;
                    $task[$i]['phone'] = $citize->phone;
                }
            }
            if (count($task) > 0) {
                return response()->json($task);
            }
            return response()->json("null");

        } catch (\Exception $e) {

            Log::info("Error exception searchTask./" . $e->getMessage());
            return response()->json(StatusController::eMessageError([$e->getMessage()], 'Error exception searchTask.'));

        }

    }
    /**
     * delete task for vitizen_id
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function deleteTask(Request $request){
        try {
            return response()->json(tasks::setTaskdelete($request->id));
        } catch (\Exception $e) {
            Log::info('Error exception deleteUser/' . $e->getMessage());
            return response()->json(StatusController::eMessageError([$e->getMessage()], 'Error exception deleteUser.'));

        }
    }
}
