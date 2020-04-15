@extends('common')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            <hr />
            <br />




            <h3>{{$post->title}}</h3><br />
            <img src="{{URL::to($post->image)}}" height="340px"/><br />
            <p style="font-style: italic;font-weight: bolder">Category : {{$post->name}}</p>
            <p>{{$post->details}}</p>



        </div>
    </div>
</div>
@endsection