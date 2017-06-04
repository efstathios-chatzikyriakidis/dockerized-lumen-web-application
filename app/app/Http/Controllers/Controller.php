<?php

// Change here.

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function json_response($data, $status_code) {
        return response()->json(['data' => $data], $status_code);
    }

    public function empty_response($status_code) {
        return response(null, $status_code);
    }
}

?>