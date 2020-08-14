<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <script src="{{asset('js/app.js')}}"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
            .indention {
                margin:20px;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="text-center indention">
                <h3>Test</h3>
            </div>
            <form id="validation-form" method="POST" action="<?= route('name-validation') ?>" class="indention">
                @csrf

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="first-name">1 Name: </label>
                        <input id="first-name" class="form-control" type="text" name="first-name"
                               placeholder="Enter name ...">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="second-name">2 Name: </label>
                        <input id="second-name" class="form-control" type="text" name="second-name"
                               placeholder="Enter name ...">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary float-right">Validate</button>
                    </div>
                </div>

            </form>
        </div>
    </body>
</html>
