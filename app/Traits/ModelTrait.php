<?php
namespace App\Traits;

use Illuminate\Support\Facades\Validator;
use Log;

trait ModelTrait {
    public function getRules()
    {

    }

    public function getMessages()
    {
        return [];
    }

    public function validate($data)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        if (count($rules) == 0) {
            $rules['no-rule'] = 'required';
        }
        return Validator::make($data, $rules, $messages);
    }

    public function store($data)
    {
        try {
            if ($this->validate($data)->fails()) {
                return [
                    'status' => false,
                    'message' => $this->validate($data)->errors()
                ];
            } else {
                $obj = new self;
                if (array_get($data, 'id') && array_get($data, 'id') != 0) {
                    $this->beforeUpdate($data);
                    $obj = self::find($data['id']);
                    $message = 'updated';
                } else {
                    $this->beforeCreate($data);
                    $message = 'created';
                }
                $obj->fill($data);
                $obj->save();
                return [
                    'status' => true,
                    'message' => $message
                ];
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function remove($id)
    {

    }

    public function beforeCreate(&$data)
    {

    }

    public function beforeUpdate(&$data)
    {

    }

    public function beforeRemove(&$data)
    {
        
    }
    public function afterCreate(&$data)
    {

    }

    public function afterUpdate(&$data)
    {

    }

    public function afterRemove(&$data)
    {

    }
}