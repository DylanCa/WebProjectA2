
        @foreach( $users = App\User::get() as $user)
        	<h1><a href='\user\{{$user->id}}'>{{ $user->name }}</h1> 
        @endforeach