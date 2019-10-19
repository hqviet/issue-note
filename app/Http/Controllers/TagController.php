<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ControllerTrait;
use App\Models\Tag;
class TagController extends Controller
{
    use ControllerTrait;
    public function __construct()
    {
        $this->model = new Tag;
    }    

    public function getAll(Request $request)
    {
        try {
            $tags = Tag::all();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $tags = [];
        }
        return $this->responseWithMessage($tags, $request);
    }
}
