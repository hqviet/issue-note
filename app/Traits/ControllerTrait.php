<?php
namespace App\Traits;
use Illuminate\Http\Request;

trait ControllerTrait {

    public function beforeAction($data)
    {

    }

    public function afterAction($data)
    {

    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->beforeAction($data);
        $message = $this->model->store($data);
        $this->afterAction($data);
        return $this->responseWithMessage($message, $request);
        
    }

    public function remove(Request $request)
    {

    }

    public function responseWithMessage($data = [], $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'data' => $data
            ]);
        } 
    }
}