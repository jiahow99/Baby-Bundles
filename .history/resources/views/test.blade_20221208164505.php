{{-- @foreach ($products as $product)

<h5>Tittle : {{$product['title']}}</h5>
<h5>User : {{$product['user']['name']}}</h5>
    
@endforeach --}}

@foreach ($products as $product)

<h5>Tittle : {{$product->title}}</h5>
{{-- <h5>User : {{$product->user->name}}</h5> --}}
    
@endforeach

{{-- {{dd($products)}} --}}