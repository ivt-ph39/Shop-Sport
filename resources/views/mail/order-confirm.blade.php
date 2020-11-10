Thank for your Order.

{{$name}}
{{$email}}
{{$address}}
{{$phone}}





@foreach ($order as $or)
    @foreach($or->products as $pro)
    {{1}}
    {{$pro['name']}}
    {{$pro->pivot->price}}
    {{$pro->pivot->quantity}}
    @endforeach
@endforeach