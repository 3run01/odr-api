<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Attachment;

class FileCaseController extends Controller
{
    public function storeInitialPetition(Request $request, $case_id)
    {
        if($request->hasFile('attachment')){
            Attachment::where([['attachment', 'PETIÇÃO INICIAL'], ['legal_case_id', $case_id]])->delete();
            $link = uniqid(date('HisYmd')) . '.' .$request->attachment->getClientOriginalExtension();
            $request->attachment->storeAs('/public/attachments_cases', $link);
            Attachment::create([
                    "attachment" => 'PETIÇÃO INICIAL',
                    "link" => env('API_URL')."/storage/attachments_cases/".$link,
                    "legal_case_id" => $case_id,
            ]);
        } 
    }   
    
    public function storeAttachment(Request $request, $case_id)
    {
        if($request->hasFile('attachment')){
            foreach($request->attachment as $i){
                $link = uniqid(date('HisYmd')) . '.' .$i->getClientOriginalExtension();
                $name = $i->getClientOriginalName();
                $i->storeAs('/public/attachments_cases', $link);
                Attachment::create([
                        "attachment" => $name,
                        "link" => env('API_URL')."/storage/attachments_cases/".$link,
                        "legal_case_id" => $case_id,
                ]);
             }
        }
    }

    public function getInitialPetition($case_id)
    {
        return Attachment::where([['legal_case_id', $case_id], ['attachment', 'PETIÇÃO INICIAL']])->first();
    }

    public function getAttachments($case_id)
    {
        return Attachment::where([['legal_case_id', $case_id], ['attachment', '!=', 'PETIÇÃO INICIAL']])->get();
    }

    public function deleteAttachment($id)
    {
        return Attachment::destroy($id);
    }
}
