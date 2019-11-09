<?php

namespace App\Repositories;
use App\Models\LegalCase;

class LegalCaseRepository extends Repository{

    public function __construct(LegalCase $model)
    {
        parent::__construct($model);
    }

    public function opened(){
        return $this->byStatus(1);
    }

    public function updateU($data, $uuid)
    {
        LegalCase::where('uuid', $uuid)->update($data);
    }
    
    public function findU($uuid)
    {
        return $this->model
        ->with('user')
        ->with('city')
        ->with('status')
        ->with('documents')
        ->with('attachments')
        ->where('uuid', $uuid)
        ->first();
    }

    public function underReview()
    {
        return $this->byStatus(1);
    }

    public function inNegotiation()
    {
        return $this->byStatus(2);
    }

    public function inFinalization()
    {
        return $this->byStatus(3);
    }

    public function filed()
    {
        return $this->byStatus(4);
    }

    public function allByUser()
    {
        return [
            "all" => $this->model
                    ->with('status')
                    ->with('user')
                    ->with('city')
                    ->where('user_id', auth()->user()->id)
                    ->get(),
            "underReview" => $this->byStatus(1),
            "inNegotiation" => $this->byStatus(2),
            "inFinalization" => $this->byStatus(3),
            "filed" => $this->byStatus(4),
        ];
    }
    
    public function byStatus($status_id)
    {
        return $this->model
        ->with('status')
        ->with('user')
        ->with('city')
        ->where([['status_id', $status_id], ['user_id', auth()->user()->id]])
        ->get();
    }
}