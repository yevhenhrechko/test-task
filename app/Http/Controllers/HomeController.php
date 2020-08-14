<?php

namespace App\Http\Controllers;

use App\Http\Requests\NameValidationRequest;
use App\Http\Services\NameCompareService;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateNames(NameValidationRequest $request)
    {
        $firstName = $request->post('first-name');
        $secondName = $request->post('second-name');

        return response()->json(['message' => ['success' => (new NameCompareService($firstName, $secondName))->compare()]]);
    }
}
