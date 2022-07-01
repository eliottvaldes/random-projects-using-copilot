<!-- html file that calls the function getTime() in file clock.js -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clock</title>

    <!-- import link for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- import the clock.js file -->
    <script type="text/javascript" src="clock.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="container p-5">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="card-header">
                                <h1>
                                    Current Date / Time
                                </h1>
                            </div>
                            <div class="card-text py-3">
                                <h1 id="date">
                                    dd/mm/yyyy
                                </h1>
                                <br>
                                <h2 id="time">
                                    00:00:00
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        // call the function getTime() every second
        setInterval(getTime, 1000);
    </script>

</body>

</html>