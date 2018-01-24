<?php 
//diretório desse arquivo
namespace App\Http\Controllers;

//puxando classe Controller para extender
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//puxando model
use App\Lista;

class HomeController extends Controller
{
	public function home()
	{
		//Array de envio de dados para a view
		$dados = array(
			'nome' => 'Ricardo', 
			'sobrenome' => 'Oliveira',
			'profissao' => 'programador'
		);

		//pegando todos valores da tabela
		$dados['listando'] = Lista::where('feito','0')->get();

		return view('home',$dados); //Call a view
	}

/////////////////////////////////////////////////////////////////////
////////////////////// Meus testes no Laravel  //////////////////////
/////////////////////////////////////////////////////////////////////

	public function add(Request $req) //Class that get data
	{
		//Checks if the fields not empty
		if ($req->has('tarefa') && $req->has('prazo')) 
		{
			//get data
			$item = $req->input('tarefa');
			$praz = $req->input('prazo');

			//test
			echo "<h1>item: $item e prazo: $praz</h1>";

			//new object
			$lista = new Lista;

			$lista->item = $item;
			$lista->prazo = $praz;

			//Save data in database
			$lista->save();
		}
			
		return redirect('/');
	}


	//Pull all the data
	public function todas()
	{
		//Array of send of data to "view"
		$dados = array(
			'nome' => 'Ricardo', 
			'sobrenome' => 'Oliveira',
			'profissao' => 'programador'
		);

		//Getting all values of the table "lista" in database
		$dados['listando'] = Lista::all();

		return view('relatorio',$dados); //Call a view
	}

	//Pull only data where field "feito" is equal the 1
	public function home2()
	{
		//In atribute "where" is necessery use the command ->get()

		//Getting all values of the table "lista" in database
		$dados['listTasks'] = Lista::where('feito','1');

		//exemple
		//Case i want pull all data where the "id" is smaller than 10
		//$dados['listIdSmaller'] = Lista::where('id','<','10')->get();
		//$dados['listIdSmaller'] = Lista::where('id','<','10')->limit(10)->get();
		//$dados['listIdSmaller'] = Lista::where('id','<','10')->order(id)->get();



		return view('home',$dados); //Call a view
	}

	//Delete tasks in database
	public function delete($idDel)
	{
		Lista::where('id',$idDel)->delete();
		return redirect('/relatorio');
	}


	//Mark like "faito"
	public function feito($id)
	{

			//find "id" in table "lista"
			$lista = Lista::find($id);

			$lista->feito = 1;

			//Save data in database
			$lista->save();

		return redirect('/');
	}

	//Update tasks in database
	public function update(Request $dados)
	{
		//Checks if the fields not empty
		if ($dados->has('tarefa') && $dados->has('prazo')) 
		{
			//get data
			$item = $dados->input('terefa');
			$praz = $dados->input('prazo');

			//find "id" in table "lista"
			$lista = Lista::find(2);

			$lista->item = $item;
			$lista->prazo = $praz;

			//Save data in database
			$lista->save();
		}
			
		return redirect('/home');
	}

	public function teste()
	{
		echo "testando uma nova action no laravel";
	}
}