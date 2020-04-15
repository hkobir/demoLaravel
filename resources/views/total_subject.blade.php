<html>
    <head>

    </head>
    <body>

        <form action="{{route('tot.subject')}}" method="post">
            @csrf
            <input type="number" placeholder="Total Subject" name="tot_subject" required/><br />
            <input  type="submit" value="Submit">
        </form>
        
        
    </body>
</html>