
<h5>Tarefas por fazer</h5>
	@if(count($listando) > 0)
		<table border="solid 1px black" style="text-align: center; vertical-align: middle;">
			<tr>
				<th>Tarefa</th>
				<th>Prazo</th>
				<th>Marcar como feito</th>
			</tr>
		@foreach($listando as $item)
			<tr>
				<td>{{$item->item}}</td>
				<td>
					{{$item->prazo}}
				</td>
				<td><a href="feito/{{$item->id}}">OK</a></td>
			</tr>	
		@endforeach
		</table>
	@else
		<h4>Nenhuma tarefa encontrada</h4>
	@endif

<hr/>
<h5>Adicionando tarefas</h5>
<form method="post">
	{{csrf_field()}}
	<label>Tarefa:</label>
	<input type="text" name="tarefa"/>
	<br/><br/>
	<label>Prazo:</label>
	<input type="date" name="prazo"/>
	<br/><br/>	
	<input type="submit" name="btsub" value="Adicionar" />
</form>

<hr/>
<a href="relatorio"><button>relatório</button></a>