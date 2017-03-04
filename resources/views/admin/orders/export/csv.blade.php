Név,E-mail cím,Jegytípus,Ár (Ft),Kér korsót?,Korsó felirat,Megjegyzés,Foglalás időpontja
@foreach($orders as $order)
    {{
        $order->user->name . ',' .
        $order->user->email .',' .
        $order->ticket->name .',' .
        $order->ticket->price .',' .
        ($order->ticket->jug ? 'Igen' : 'Nem') .',' .
        $order->jug_name .',' .
        str_replace(',', '', $order->comment) .',' .
        $order->ticket->created_at->format('Y. m. d. H:i:s')
    }}
@endforeach