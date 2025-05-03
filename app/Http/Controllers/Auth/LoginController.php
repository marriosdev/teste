<?php

namespace App\Http\Controllers\Auth;

use App\Dtos\Auth\LoginDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\Request;
use App\Services\Auth\LoginService;

class LoginController extends Controller
{
    protected LoginService $service;

    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }
    
    public function index(AuthLoginRequest $request)
    {
        /**
         * @var Request $request
         */
        return Response()->json(
            $this->service->execute(new LoginDto(email: $request->email, password: $request->password)),
            200
        );
    }
}
