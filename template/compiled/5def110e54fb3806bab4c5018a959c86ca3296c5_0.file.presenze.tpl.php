<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-20 23:57:01
  from 'C:\xampp\htdocs\allegriso\template\main\presenze.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8f5d2d461585_64877171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5def110e54fb3806bab4c5018a959c86ca3296c5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\allegriso\\template\\main\\presenze.tpl',
      1 => 1603231018,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8f5d2d461585_64877171 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\allegriso\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!doctype html>
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
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/dom2im.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/filesaver.js"><?php echo '</script'; ?>
>
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <?php echo '<script'; ?>
 src="js/datetimepicker.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="css/datetimepicker.css" type="text/css">

    <link rel="stylesheet" href="css/fontaws.css" type="text/css">

    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <style>
        .logo-negative {
            -webkit-filter: invert(1);
            filter: invert(1);
        }

        .bg-light-allegriso {
            background-color: #545454;
        }

        .bg-black {
            background-color: black !important;
        }

        .poppins {
            font-family: 'Poppins', sans-serif;
        }

        .card-allegriso {
            background-image: url('img/card.png');
            background-position: right;
            background-size: contain;
            background-repeat: no-repeat;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

    </style>

    <?php echo '<script'; ?>
>
        function toTimestamp(strDate) {
            return Date.parse(strDate)/1000;
        }
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = toTimestamp($('#min').val());
                var max = toTimestamp($('#max').val());
                var age = data[3].substring(0, 10);

                if ((isNaN(min) && isNaN(max)) ||
                    (isNaN(min) && age <= max) ||
                    (min <= age && isNaN(max)) ||
                    (min <= age && age <= max)) {
                    return true;
                }
                return false;
            }
        );
        $(document).ready(function() {
            jQuery.datetimepicker.setLocale('it');

            $('.daterange').datetimepicker({
                format: "m.d.Y H:i"
            });
            var table = $('#table').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "Nessun ingresso",
                    "info": "_TOTAL_ ingressi in totale",
                    "infoEmpty": "0 ingressi in totale",
                    "infoFiltered": "(filtrati da un massimo di _MAX_ ingressi totali)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostra _MENU_ ingressi per volta",
                    "loadingRecords": "Loading...",
                    "processing": "Processing...",
                    "search": "Cerca:",
                    "zeroRecords": "Nessun ingresso trovato",
                    "paginate": {
                        "first": "Prima Pag.",
                        "last": "Ultima Pag.",
                        "next": "Prossima Pag.",
                        "previous": "Pag. Precedente"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            });
            $('#min, #max').change(function() {
                table.draw();
            });
        })

        function createImage() {
            domtoimage.toBlob(document.getElementById('tessera'))
                .then(function(blob) {
                    window.saveAs(blob, 'tesseraAllegriso.png');
                    $('#tesseraContainer').hide();
                });
        }

        function downloadImage(utente) {
            utente = JSON.parse(utente);
            $('#cardName').val(utente.nome.toUpperCase());
            $('#cardSurname').val(utente.cognome.toUpperCase());
            $('#cardBirth').val(utente.nascita);
            $('#cardReg').val(utente.registrazione);
            $('#tesseraContainer').show();
            createImage();
        }

    <?php echo '</script'; ?>
>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">ALLEGRISO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?section=Admin">Lista Soci</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?section=Presenze">Lista Ingressi</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid px-3">

        <div class="row justify-content-center">
            <div class="col-9 col-md-6 col-lg-4 text-center">
                <img src="assets/allegriso.jpg" class="logo-negative img-fluid">
            </div>
        </div>
        <p class="mb-0 font-weight-bold">Filtra per data:</p>
        <div class="row mb-2">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Da</span>
                    </div>
                    <input type="text" class="daterange form-control" id="min" name="min" autocomplete="off">
                </div>
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">A</span>
                    </div>
                    <input type="text" class="daterange form-control" id="max" name="max" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>IDUtente</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Data e ora ingresso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['presenze']->value, 'u');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['u']->value->getIdUtente();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['u']->value->getNomeUtente();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['u']->value->getCognomeUtente();?>
</td>
                            <td><span class="sr-only"><?php echo strtotime($_smarty_tpl->tpl_vars['u']->value->getDataIngresso());?>
</span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['u']->value->getDataIngresso(),"%a %e %B %Y alle %H:%M");?>
</td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container-fluid bg-light" style="display: none" id="tesseraContainer">
            <div class="row justify-content-center">
                <div class="col-12 text-center p-3">



                    <div class="card text-white bg-light-allegriso card-allegriso mb-3 border-0" id="tessera" style="width: 50rem">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 px-4">
                                    <div class="form-group px-4">
                                        <label class="poppins mb-0">Nome</label>
                                        <input type="text" id="cardName" readonly class="font-weight-bold text-center text-light form-control bg-black border-0" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group px-4">
                                        <label class="poppins mb-0">Cognome</label>
                                        <input type="text" id="cardSurname" readonly class="font-weight-bold text-center text-light form-control bg-black border-0" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group px-4">
                                        <label class="poppins mb-0">Data di nascita</label>
                                        <input type="text" id="cardBirth" readonly class="font-weight-bold text-center text-light form-control bg-black border-0" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group px-4">
                                        <label class="poppins mb-0">Data di registrazione</label>
                                        <input type="text" id="cardReg" readonly class="font-weight-bold text-center text-light form-control bg-black border-0" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
