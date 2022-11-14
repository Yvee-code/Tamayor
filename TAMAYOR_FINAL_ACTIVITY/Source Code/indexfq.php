<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM Country");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Countries</title>
</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="indexfq.php" class="nav-link px-2 text-white">countries</a></li>
                </ul>

                <a href="#" class="nav-link px-2 text-white text-end">Yve</a>

                <div class="text-end">
                    <button type="button" onclick="window.location.href='logout.php';"
                        class="btn btn-danger">Logout</button>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="card bg-light my-3 col-8 text-center mx-auto">
            <div class="card-body ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td scope="col">id</td>
                            <td scope="col">iso</td>
                            <td scope="col">name</td>
                            <td scope="col">nicename</td>
                            <td scope="col">iso3</td>
                            <td scope="col">numcode</td>
                            <td scope="col">phonecode</td>
                            <td scope="col">created_at</td>
                            <td scope="col"><a class="btn btn-primary" href="Add.html">Add Country</button></td>
                        </tr>
                    </thead>

                    <?php
                    while ($res = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $res['id'] . "</td>";
                        echo "<td>" . $res['iso'] . "</td>";
                        echo "<td>" . $res['name'] . "</td>";
                        echo "<td>" . $res['nicename'] . "</td>";
                        echo "<td>" . $res['iso3'] . "</td>";
                        echo "<td>" . $res['numcode'] . "</td>";
                        echo "<td>" . $res['phonecode'] . "</td>";
                        echo "<td>" . $res['created_at'] . "</td>";
                        echo "<td><a href=\"edit.php?id=$res[id]\" class=\"btn btn-primary\">Edit</a> <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this record?')\" class=\"btn btn-primary\">Delete</a></td>";
                        echo "</tr>";
                    }

                    ?>
                </table>

            </div>
        </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>