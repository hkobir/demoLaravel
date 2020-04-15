<html>
    <head>

    </head>
    <body>

        <h3>Total Subject : {{$totalSubject}}</h3>

        <form action="{{url('store/subject/'.$totalSubject)}}" method="post">
            @csrf

            @for ($i=1; $i<=$totalSubject; $i++)
            Name of subject {{$i}} : 
        <input type="text"  name="sub{{$i}}" required/>
             Score: <input type="text" name="score{{$i}}" required/>
            <br /><br />
            @endfor
            <button type="submit">Submit</button>
        </form>


    </body>
</html>