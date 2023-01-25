<?php

namespace App\Http\Controllers\Api;

use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            "name" => "required",
            "email" => "required|email",
            "message" => "required|min:10"
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to("BennyBonaccorso@outlook.it")->send(new NewContact($newLead));

        return response()->json([
            "success" => true
        ]);
    }
}
