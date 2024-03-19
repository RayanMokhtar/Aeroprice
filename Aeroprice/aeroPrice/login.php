<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- my style -->
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form method="POST" action="#" role="form">
                        <div class="form-group">
                            <h2>Create account</h2>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="firstName">First name</label>
                            <input id="firstName" type="text" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="lastName">Last name</label>
                            <input id="lastName" type="text" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupName">Your name</label>
                            <input id="signupName" type="text" maxlength="50" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupEmail">Email</label>
                            <input id="signupEmail" type="email" maxlength="50" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="signupPassword">Password</label>
                            <input id="signupPassword" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="signupPasswordagain">Password again</label>
                            <input id="signupPasswordagain" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button id="signupSubmit" type="submit" class="btn btn-info btn-block">Create your account</button>
                        </div>
                        <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
                        <hr>
                        <p></p>Already have an account? <a href="#">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- script boot -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>

</html>