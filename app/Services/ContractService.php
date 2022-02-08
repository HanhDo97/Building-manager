<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Contract;
use Illuminate\Support\Facades\Validator;

class ContractService {

    public function deleteContract($contract)
    {
        return $contract->delete();
    }

    public function getContract($id)
    {
        return Contract::find($id);
    }

    public function validator($request)
    {
        return Validator::make($request->all(), [
            // validate
        ]);
    }

    public function storeContract($request)
    {
        $contract = Contract::create([
            'contractPeriod' => $request->contractPeriod,
            'outOfDate' => $request->outOfDate,
        ]);

        return $contract;
    }

    public function getAll()
    {
       return Contract::all();
    }

}