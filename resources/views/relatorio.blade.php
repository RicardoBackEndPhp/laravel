
<h5>Todas as tarefas</h5>
	@if(count($listando) > 0)
		<table border="solid 1px black" style="text-align: center; vertical-align: middle;">
			<tr>
				<th>Tarefa</th>
				<th>Prazo</th>
				<th>Feito</th>
				<th>Desfazer</th>
				<th>Excluir</th>
			</tr>
		@foreach($listando as $item)
			<tr>
				<td>{{$item->item}}</td>
				<td>
					{{$item->prazo}}
				</td>
				<td>
					@if($item->feito == 1)
						sim
					@else
						não
					@endif
				</td>
				<td><a href="desfeito/{{$item->id}}">OK</a></td>
				<td><a href="delete/{{$item->id}}">X</a></td>
			</tr>	
		@endforeach
		</table>
	@else
		<h4>Nenhuma tarefa encontrada</h4>
	@endif

<hr/>