<?php

namespace App\Repositories;
use App\Models\Document;

class DocumentRepository extends Repository{

    public function __construct(Document $model)
    {
        parent::__construct($model);
    }
}