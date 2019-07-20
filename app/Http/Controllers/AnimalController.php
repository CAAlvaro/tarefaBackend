<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimalController extends Controller
{
    public function listAnimal() {
		return Animal::all();
	}

	public function showAnimal($id) {
		$Animal = Animal::find($id);

		if($Animal) {
			return response()->success($Animal);
		} else {
			$data = "Animal não encontrado, verifique o id novamente.";
			return response()->error($data, 400);
		}
    }

	public function createAnimal(Request $request) {

		$Animal = new Animal;

        $Animal->nome = $request->nome;
		$Animal->especie = $request->especie;
        $Animal->raca = $request->raca;
        $Animal->idade = $request->idade;
        $Animal->porte = $request->porte;
		$Animal->save();

		return response()->success($Animal);

	}
	
	public function updateAnimal(Request $request, $id) {

		$Animal = Animal::find($id);

		if($Animal) {

			if($request->nome) 
				$Animal->nome = $request->nome;
			if($request->especie) 
				$Animal->especie = $request->especie;
			if($request->raca) 
                $Animal->raca = $request->raca;
            if($request->idade) 
                $Animal->idade = $request->idade;
            if($request->porte) 
				$Animal->porte = $request->porte;
		
			$Animal->save();
			return response()->success($Animal);

		} else {
			$data = "Animal não encontrado, verifique o id novamente.";
			return response()->error($data, 400);
		}

	}

	public function deleteAnimal($id) {

		Animal::destroy($id);

		return response()->json(['Animal deletado']);

	}
}
