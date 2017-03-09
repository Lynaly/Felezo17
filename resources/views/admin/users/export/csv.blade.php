Név,E-mail cím,Rendelt jegyek száma,Regisztráció időpontja
@foreach($users as $user)
    {{
        $user->name . ',' .
        $user->email .',' .
        $user->orders()->count() .',' .
        $user->created_at->format('Y. m. d. H:i:s')
    }}
@endforeach