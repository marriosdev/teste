<?php

namespace App\Services\Auth;

use App\Dtos\Auth\LoginDto;
use App\Utils\JWTUtils;
use App\Repositories\UserRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class LoginService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;    
    }

    /**
     * @param \App\Dtos\Auth\LoginDto $credentials
     * @throws \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException
     * @return array{jwt: array{access_token: mixed, expires_in: int, token_type: string, user: \Illuminate\Database\Eloquent\Collection<int, \App\Models\User>}}
     */
    public function execute(LoginDto $credentialsDto)
    {
        $user = $this->repository->findByEmail($credentialsDto->email);
        
        if($user == null) {
            throw new UnauthorizedHttpException(challenge: true, message: 'Dados inválidos');
        }

        if (! $token = auth('api')->attempt($credentialsDto->toArray())) {
            throw new UnauthorizedHttpException(challenge: true, message: 'Dados inválidos');
        }
        
        return array(
            "user" => $user,
            "jwt" => JWTUtils::makeToken($token)
        );
    }
}
