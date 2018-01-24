<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Lista extends Model
{
	/*por padrão o Laravel entende que o model está ligado a uma tabela
		se o nome do model for o plural do nome da tabela*/

	//Como no nosso caso meu model tem o mesmo nome da tabela, no singular mesmo
	//Tenho que  específicar
	protected $table = 'lista';

	//Quando eu não tiver os campos: created_at ou updated_at (campos para log)
	// em minha tabela tenho que executar o comando abaixo
	public $timestamps = false;

	
}