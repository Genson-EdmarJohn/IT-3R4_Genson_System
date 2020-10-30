<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    </head>

    <body>
        <form action="verifyUser" method="post">
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="username" required>
            
            </div>
            
            <div class="form-group" >
                <label for="Password">Password</label>
                <input type="password"name="password" class="form-control" placeholder="password" required>
            </div>
        
            <button type="submit" class="btn btn-primary" name="login">Submit</button>
        </form>
                
    </body>

</html>