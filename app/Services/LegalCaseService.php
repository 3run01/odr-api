<?php

namespace App\Services;

use App\Repositories\LegalCaseRepository;
use App\Repositories\DocumentRepository;

class LegalCaseService {

    protected $legalCaseRepository;
    protected $documentRepository;

    public function __construct(legalCaseRepository $legalCaseRepository, DocumentRepository $documentRepository)
    {
        $this->legalCaseRepository = $legalCaseRepository;
        $this->documentRepository = $documentRepository;
    }

    public function store($data)
    {
        $data['user_id'] = auth()->user()->id;
        $data['status_id'] = 1;
        return $this->legalCaseRepository->store($data);
    }
}