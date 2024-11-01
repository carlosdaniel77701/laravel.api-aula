<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInterest;
use App\Http\Requests\StorePeopleRequest;
use App\Models\Interest;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function list(Request $request){
        return People::with('interests')->paginate(15); //pegar o padrao()
    }

    public function store(StorePeopleRequest $people) {
        $newPeople = People::create($people->all());

        if ($newPeople) {
            return response()->json([
                'message' => 'Nova pessoa criada com sucesso.',
                'people' => $newPeople,
            ]);
        } else {
            return response()->json([
                'message' => 'Deu ruim. Te vira aí pra descobrir o que aconteceu.'
            ], 422);
        }
    }

    public function storeInterest(StoreInterest $interest) {
        $newInterest = Interest::create($interest->all());

        if ($newInterest) {
            return response()->json([
                'message' => 'Novo interesse criado com sucesso.',
                'interest' => $newInterest,
            ]);
        } else {
            return response()->json([
                'message' => 'Deu ruim. Te vira aí pra descobrir o que aconteceu.'
            ], 422);
        }
    }
}

  
