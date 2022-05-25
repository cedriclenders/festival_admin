@foreach($festivals as $festival)
    <p>{{$festival->name}}</p>
    {!!$festival->description!!}
@endforeach