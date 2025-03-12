<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>SMART PPE</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('img/smartppebg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            z-index: -1;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm p-3 mb-5 bg-white rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">SMART PPE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav
                                ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                        <li class="nav-item">
                            <select name="showForms" id="showForms" class="form-select">
                                <option value="host" selected>Host</option>
                                <option value="worker">Worker</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <br>
    <div class="container mt-5">
        <div class="row" id="hostRow">
            <div class="col-md-6">
                <h1 class="text-center">SMART PPE</h1>
                <div class="card">
                    <div class="card-header">
                        <h3>Login as Host</h3>
                    </div>
                    <div class="card-body">
                        <form action="action.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group
                                mb-3">
                                <label for="password">password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group
                                mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" required maxlength="11">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" name="signin_host" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="text-center">SMART PPE</h1>
                <div class="card">
                    <div class="card-header">
                        <h3>Sign up as Host</h3>
                    </div>
                    <div class="card-body">
                        <form action="action.php" method="POST">
                            <div class="form-group
                                mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group
                                mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group
                                mb-3">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" id="phone" class="form-control" required maxlength="11">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" name="signup_host" class="btn btn-primary">Sign up</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="workerRow">
            <div class="col-md-6">
                <h1 class="text-center">SMART PPE</h1>
                <div class="card">
                    <div class="card-header">
                        <h3>Sign in as Worker</h3>
                    </div>
                    <div class="card-body">
                        <form action="action.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group
                                mb-3">
                                <label for="password">password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group
                                mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" required maxlength="11">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" name="signin_worker" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="text-center">SMART PPE</h1>
                <div class="card">
                    <div class="card-header">
                        <h3>Sign up as Worker</h3>
                    </div>
                    <div class="card-body">
                        <form action="action.php" method="POST">
                            <div class="form-group
                                mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group
                                mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group
                                mb-3">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" id="phone" class="form-control" required maxlength="11">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" name="signup_worker" class="btn btn-primary">Sign up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $("#hostRow").hide();
            $("#workerRow").hide();
            $("showForms").val("host");
            $("#hostRow").show();
            $("#showForms").change(function() {
                if ($(this).val() == "host") {
                    $("#hostRow").show();
                    $("#workerRow").hide();
                } else if ($(this).val() == "worker") {
                    $("#hostRow").hide();
                    $("#workerRow").show();
                }
            });
        });
    </script>
</body>

</html>