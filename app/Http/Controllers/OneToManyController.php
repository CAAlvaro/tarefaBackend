<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Pessoa;

class OneToManyController extends Controller
{
	/**
     * Mostra o dono do animal
     *
     * @param  id do animal
     */
    public function showPessoa($id) {

		$Animal = Animal::find($id);

		if ($Animal) {

			$pessoa_id = $Animal->pessoa_id;
			$Pessoa = Pessoa::find($pessoa_id);
		
			return response()->success($Pessoa);
		
		} else {

			$data = "Animal não encontrada, verifique o id novamente.";
			return response()->error($data, 400);

		}
    }

	/**
     * Mostra todos os animais que a pessoa possui
     */
    public function showAnimals($pessoa_id) {

        $Animals = Animal::where('pessoa_id', '=', $pessoa_id)->get();

		if($Animals) {
			return response()->success($Animals);
		} else {
			$data = "Pessoa não encontrada, verifique o id novamente.";
			return response()->error($data, 400);
		}

    }
	
    public function insertPessoa(Request $request, $animal_id) {

        $Animal = Animal::find($animal_id);
        $Pessoa = Pessoa::find($request->pessoa_id);

		if($Animal && $Pessoa) {

			$Animal->pessoa_id = $request->pessoa_id;
		
			$Animal->save();
			return response()->success($Animal);

		} else {
			$data = "Verifique os ids novamente.";
			return response()->error($data, 400);
		}

	}
	
	public function removePessoa(Request $request, $animal_id) {

        $Animal = Animal::find($animal_id);

		if($Animal) {

			$Animal->pessoa_id = null;
		
			$Animal->save();
			return response()->success($Animal);

		} else {
			$data = "Verifique os ids novamente.";
			return response()->error($data, 400);
		}

    }
    
}
