<!doctype html>
<html lang="en">

<head>
<meta name="google-site-verification" content="YMCkikedhhHlMZPXF61oqu8i0JNdRMieMllpsOu9EhA" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    
    <link rel="stylesheet" href="css/fontaws.css" type="text/css">
    <link rel="stylesheet" href="css/font-locale.css" type="text/css">
    <title>{$pageTitle}</title>
   
{literal}
<style>
    body {
        background: url('assets/background.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%;
    }
    ul.leaders {
        max-width: 40em;
        padding: 0;
        overflow-x: hidden;
        list-style: none
    }
    ul.leaders li:before {
        float: left;
        width: 0;
        white-space: nowrap;
        content:
     ". . . . . . . . . . . . . . . . . . . . "
     ". . . . . . . . . . . . . . . . . . . . "
     ". . . . . . . . . . . . . . . . . . . . "
     ". . . . . . . . . . . . . . . . . . . . "
    }
    ul.leaders span:first-child {
        padding-right: 0.33em;
    }
    ul.leaders span + span {
        float: right;
        padding-left: 0.33em;
    }
</style>

{/literal}
</head>

<body class="text-white">
    <div class="container-fluid px-3">
        <div class="row">
            <div class="col text-center">
                <img src="assets/logo.png" class="img-fluid" width="50%" height="auto">
            </div>
        </div>
        
        
        <a class="nomesottotipo h1" data-toggle="collapse" href="#friggitoriacollapse" role="button" aria-expanded="false">Friggitoria</a>
        <hr class="border-white my-0">
        <div class="row collapse" id="friggitoriacollapse">
            <div class="col">
                <h1 class="nomesottotipo">Patate</h1>
                <ul class="leaders piatti-prezzi h5">
                    <li><span>Salmon Ravioli</span>
                     <span>7.95</span>
                    <li><span>Fried Calamari</span>
                     <span>8.95</span>
                    <li><span>Almond Prawn Cocktail</span>
                     <span>7.95</span>
                    <li><span>Bruschetta</span>
                     <span>5.25</span>
                    <li><span>Margherita Pizza</span>
                     <span>10.95</span>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
