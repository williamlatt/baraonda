<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-20 22:24:37
  from 'C:\xampp\htdocs\allegriso\template\main\passwordadmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8f4785dc7ef2_20512696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1be3d927003bf0910c5c72589490dd8d918f79e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\allegriso\\template\\main\\passwordadmin.tpl',
      1 => 1603146882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8f4785dc7ef2_20512696 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    <?php echo '</script'; ?>
>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <style>
        .logo {
            width: 30rem;
            height: auto;
        }

        body {
            background-color: black;
            font-family: 'Roboto', sans-serif;
            color: white;
        }

    </style>

    <?php echo '<script'; ?>
>
        $(document).ready(function() {

        })

    <?php echo '</script'; ?>
>
</head>

<body>
    <div class="container-fluid px-3">


        <div class="row justify-content-center">
            <div class="col-9 col-md-6 col-lg-4 text-center">
                <img src="assets/allegriso.jpg" class="img-fluid">
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <h3>Amministrazione</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <form action="index.php?section=Admin&action=login" method="post">
                    <label for="passwordAdmin">Password</label>
                    <input class="form-control" name="password" type="password">
                    <button type="submit" class="btn btn-secondary my-4">Entra</button>
                </form>
            </div>
        </div>



    </div>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
