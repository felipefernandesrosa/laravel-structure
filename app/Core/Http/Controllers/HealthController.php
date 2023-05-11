<?php

namespace App\Core\Http\Controllers;

use Illuminate\Support\Facades\Request;

class HealthController extends Controller
{
    public function __construct() { }

    /**
     * Method to check health of application
     *
     * @param Request $request
     * @return array
     */
    public function check(Request $request): array
    {
        return ['ok'];
    }
}
