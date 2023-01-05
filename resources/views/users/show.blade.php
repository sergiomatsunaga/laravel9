<h1>Dados do usuario {{$user->name}}</h1>
<ul>    
    <li>
        {{$user->name}} - {{$user->email}}         
    </li>            
</ul>
<form action="{{ route('users.delete', $user->id)}}" method="post">
    @csrf
    @method('DELETE')
<button type="submit">Deletar</button>
</form>