<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1>Maak je eigen pizza</h1>
    <br>

    <form action="create.php" method="post">


        <h4>Bodemformaat</h4>
        <select class="form-select" aria-label="Default select example" name="bodemformaat">
            <option selected>Maak je keuze</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="30">30</option>
            <option value="35">35</option>
            <option value="40">40</option>
        </select>
        <br>
        <br>

        <h4>Saus</h4>
        <select class="form-select" aria-label="Default select example" name="saus">
            <option selected>Maak je keuze</option>
            <option value="Tomatensaus">Tomatensaus</option>
            <option value="Extra tomatensaus">Extra tomatensaus</option>
            <option value="Spicy tomatensaus">Spicy tomatensaus</option>
            <option value="BBQ saus">BBQ saus</option>
            <option value="Crème fraiche">Crème fraiche</option>
        </select>
        <br>
        <br>

        <h4>Pizzatoppings</h4>
        <fieldset class="form-group">
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pizzatoppings" id="gridRadios1" value="20" checked>
                        <label class="form-check-label" for="gridRadios1">
                            Vegan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pizzatoppings" id="gridRadios2" value="25">
                        <label class="form-check-label" for="gridRadios2">
                            Vegetarisch
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pizzatoppings" id="gridRadios3" value="30">
                        <label class="form-check-label" for="gridRadios3">
                            Vlees
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>

        <h4>Kruiden</h4>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="kruiden[]" value="Peterselie">
            <label class="form-check-label" for="flexCheckDefault">
                Peterselie
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="kruiden[]" value="Oregano"> 
            <label class="form-check-label" for="flexCheckChecked">
                Oregano
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="kruiden[]" value="Chili Flakes">
            <label class="form-check-label" for="flexCheckChecked">
                Chili flakes
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="kruiden[]" value="Zwarte paper">
            <label class="form-check-label" for="flexCheckChecked">
                Zwarte paper
            </label>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>