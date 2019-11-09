<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Mail\WelcomeMail;
use Mail;

class UserService {
    
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($data)
    {
        $data = $data;
        $password = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $user = $this->repository->store($data);
        Mail::to($data['email'])->queue(new WelcomeMail($data, $password));

        return $user;
    }

    public function update($data, $uuid)
    {
        $data = $data;
        if(!empty($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }

        $user = $this->repository->updateU($data, $uuid);

        return $user;
    }
}