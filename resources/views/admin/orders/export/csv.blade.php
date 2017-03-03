Név,E-mail cím,Jegytípus,Ár (Ft),Foglalás időpontja
@foreach($orders as $order)
    {{ $order->user->name }},{{ $order->user->email }},{{ $order->ticket->name }},{{ $order->ticket->price }},{{ $order->ticket->created_at->format('Y. m. d. H:i:s') }}
@endforeach