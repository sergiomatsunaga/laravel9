@csrf 
   <!--input type="hidden"name="_method" value="PUT"-->
    <!--usa o input ou diretiva para mudar o metodo para put @ method('PUT')-->
    <input type=text name="name" placeholder="Nome:" value="{{$user->name ?? old('name')}}">
    <input type=email name="email" placeholder="E-mail:" value="{{$user->email ?? old('email')}}">
    <input type=password name="password" placeholder="password:" >
    <button type="submit">enviar</button>