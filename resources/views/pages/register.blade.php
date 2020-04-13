<html>
    <head>
        <title>User Sign Up</title>
    </head>
    <body>
        <form action="{{url('/profile')}}" method="post">
            {{csrf_field()}}

            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"/> </td>
                </tr>

                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="username"/> </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password"/> </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="register"/> 
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>