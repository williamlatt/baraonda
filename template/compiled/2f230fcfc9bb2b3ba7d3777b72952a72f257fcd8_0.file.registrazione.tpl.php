<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-19 23:47:29
  from 'C:\Users\dimar\Documents\GitHub\allegriso\template\main\registrazione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8e0971e300b5_13456681',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f230fcfc9bb2b3ba7d3777b72952a72f257fcd8' => 
    array (
      0 => 'C:\\Users\\dimar\\Documents\\GitHub\\allegriso\\template\\main\\registrazione.tpl',
      1 => 1603144046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8e0971e300b5_13456681 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="js/dom2im.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/filesaver.js"><?php echo '</script'; ?>
>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontaws.css" type="text/css">
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.it.min.js" integrity="sha512-0MThRHKyDbl5nH553hVBJMo2Ma7c2c5jU2bENv92XM2SVQEcQ7vepANdKiU7DLiYH9RsqESRdDpCRVkIRGtKGQ==" crossorigin="anonymous"><?php echo '</script'; ?>
>

    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <style>
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

        .card-allegriso-back {
            background-image: url('img/cardback.png');
            background-position: left;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .logo {
            width: 30rem;
            height: auto;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        #covid,
        #registrazione,
        #intro {
            color: white;
        }

    </style>

    <?php echo '<script'; ?>
>
                
        var cookieName = "regAllegriso"
        function formatDate(date) {
            var d = new Date(date);
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return d.toLocaleDateString('it-IT', options);
        }
        
        function registraIngresso(id){
            $('#spinner-presenza').show();
            $.ajax({
                    method: 'post',
                    url: 'index.php?section=Registrazione&action=presenzaUtente&idUtente='+id,
                }).done(function(msg) {
                    msg = JSON.parse(msg);
                    var cookie = {
                        id: msg.id
                    }
                    var CookieDate = new Date;
                    CookieDate.setFullYear(CookieDate.getFullYear()+10);
                    document.cookie = cookieName + "="+msg.id+"; expires="+ CookieDate.toUTCString() +"; path=/";
                    $('#spinner-presenza').hide();
                    $('#presenza-confermata').show();
                    $('#btn-presenza').hide();
                })
        }

        function createImage() {
            domtoimage.toBlob(document.getElementById('tessera'))
                .then(function(blob) {
                    window.saveAs(blob, 'tesseraAllegriso.png');
                    $('#spinner').hide();
                    $('#tesseraContainer').hide();
                });
        }
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy/mm/dd',
                endDate: '-18y',
                language: 'it'
            });
            $('#regForm').submit(function(el) {
                el.preventDefault();
                var url = $(this).attr('action');
                var datas = $(this).serialize();
                $.ajax({
                    method: 'post',
                    url: url,
                    data: datas
                }).done(function(msg) {
                    msg = JSON.parse(msg);
                    var cookie = {
                        id: msg.id
                    }
                    var CookieDate = new Date;
                    CookieDate.setFullYear(CookieDate.getFullYear()+10);
                    document.cookie = cookieName + "="+msg.id+"; expires="+ CookieDate.toUTCString() +"; path=/";
                    if (msg) {
                        $('#idTessera').html('ID: ' + msg.id);
                        $('#cardName').val(msg.nome.toUpperCase());
                        $('#cardSurname').val(msg.cognome.toUpperCase());
                        $('#cardBirth').val(formatDate(msg.nascita));
                        $('#cardReg').val(formatDate(msg.registrazione));
                        $('#registrazione').fadeOut();
                        $('#grazie').fadeIn();
                        $('#tesseraContainer').show();
                        createImage();
                    } else alert('Impossibile procedere');
                })
            })
            
            
            $('#presenzaForm').submit(function(el) {
                el.preventDefault();
                var url = $(this).attr('action');
                var datas = $(this).serialize();
                $.ajax({
                    method: 'post',
                    url: url,
                    data: datas
                }).done(function(msg) {
                    msg = JSON.parse(msg);
                    
                    if(msg){
                        var cookie = {
                            id: msg.id
                        }
                        var CookieDate = new Date;
                        CookieDate.setFullYear(CookieDate.getFullYear()+10);
                        document.cookie = cookieName + "="+msg.id+"; expires="+ CookieDate.toUTCString() +"; path=/";


                        $('#modal-presenza').modal('hide');
                        $('#div-registrazione').hide();
                        $('#div-presenza-confermata').show();
                        $('#presenza-confermata').show();
                        $('#btn-presenza').hide();
                    } else {
                        $('#id-is-missing').show();
                    }
                })
            })
        })

    <?php echo '</script'; ?>
>
</head>

<body>
    <div class="container-fluid px-3 bg-black">
        
        <!-- Modal -->
        <div class="modal fade" id="modal-presenza" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ingresso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="presenzaForm" method="post" action="index.php?section=Registrazione&action=presenzaUtente">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="idutente">ID della tessera</label>
                    <input type="text" name="idUtente" class="form-control" id="idutente" required>
                    <small class="text-danger" id="id-is-missing" style="display: none">Questo ID non è associato a nessuna tessera</small>
                  </div>
              </div>
              
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Invia</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
        
        
        
        <!-- Modal -->
        <div class="modal fade text-dark" id="privacy-modal" tabindex="-1" role="dialog" aria-labelledby="privacy-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Informativa Privacy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Con la sottoscrizione della scheda di iscrizione, il Socio, ai sensi del Regolamento Europeo 679/2016 e del D.lgs. 101/2018, relativo alla protezione delle persone fisiche con riguardo al trattamento dei dati personali, nonché’ alla libera circolazione di tali dati, presta il suo consenso espresso ed informato a che i dati che lo riguardano saranno oggetto a tutte le operazioni di trattamento previste dalle vigenti normative.

                        Si rende noto che:

                        il Titolare del trattamento dei dati è l’associazione <b>[SOSTITUIRE]</b>;<br>
                        sarà cura del Titolare medesimo provvedere tempestivamente alla comunicazione di eventuali variazioni in merito, mediante apposito atto scritto pubblicato sul sito dell’associazione;<br>
                        i dati verranno trattati in modo lecito, corretto e trasparente;<br>
                        il trattamento riguarda i dati forniti nel presente documento;<br>
                        il conferimento dei dati è necessario per le seguenti finalità: iscrizione e partecipazione all’associazione,
                        censimento soci, adempimenti degli obblighi legali e contabili/fiscali, comunicazione e aggiornamento sulle attività culturali svolte dall’associazione;
                        i dati personali richiesti nel presente modulo sono obbligatorie e l’eventuale rifiuto comporta impossibilità di dare esecuzione all’iscrizione all’associazione;<br>
                        il trattamento dei dati personali è realizzato per mezzo delle operazioni o complesso di operazioni indicate all’art. 4 del Regolamento Europeo 679/2016: raccolta, registrazione, organizzazione, strutturazione, conservazione, consultazione, adattamento, elaborazione, modificazione, selezione, estrazione, raffronto, utilizzo, interconnessione, comunicazione mediante trasmissione, diffusione o qualsiasi altra forma di messa a disposizione, limitazione, cancellazione e distruzione dei dati;<br>
                        le operazioni possono essere svolte con l’ausilio di strumenti cartacei, informatici o telematici;<br>
                        per l’espletamento delle finalità indicate, i dati comunicati e dal Titolare raccolti, ivi compresa ogni eventuale variazione, potranno essere comunicati ai collaboratori autorizzati dall’associazione, al solo personale autorizzato dal Titolare del trattamento e ai Responsabili esterni del trattamento designati;<br>
                        i dati personali verranno conservati dal Titolare e saranno trattati secondo le previsioni di legge di cui all’art. 5 co. 1 del Regolamento, e comunque adoperando le più idonee misure di sicurezza volte a tutelarne la riservatezza – fino alla revoca della Sua iscrizione come Socio, e comunque per un tempo non superiore alle previsioni normative;<br>
                        i dati personali non saranno trasferiti verso Paesi terzi (extra UE) ma saranno comunicati esclusivamente all’interno dell’area riservata del sito al solo fine di permettere la conoscibilità dei soci iscritti e la realizzazione di un’economia di comunione attraverso l’interazione tra i medesimi soci.<br>
                        In relazione al trattamento dei propri dati personali, può esercitare i diritti di cui agli art.15 -22 del suddetto Regolamento: chiedere l’accesso ai dati personali, la rettifica e/o la cancellazione dei dati personali, la limitazione del trattamento, la portabilità dei dati; opporsi al trattamento dei dati personali raccolti ed eventualmente proporre reclamo all’Autorità di controllo.<br>
                        Tali diritti possono essere esercitati – qualora di competenza del Titolare – per tramite di raccomandata a/r da indirizzare presso la sede legale del Titolare -sopra meglio individuata- o a mezzo di comunicazione email/PEC agli indirizzi indicati.
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-9 col-md-6 col-lg-4 text-center">
                <img src="assets/allegriso.jpg" class="img-fluid">
            </div>
        </div>
        <div class="row" id="intro">
            <div class="col text-center">
                <p class="h5">
                    Benvenuto all'Allegriso Social Club! In questo locale l'accesso è riservato ai soli soci secondo le regole <strong>COVID-19</strong>
                </p>
            </div>
        </div>

        <div id="covid">

            <div class="row">
                <div class="col-6 col-md-3 text-center">
                    <img src="img/covid/1.png" class="img-fluid" width="80%" height="auto">
                    <p class="text-center m-1">L'ingresso al locale è consentito solo con la <strong>MASCHERINA</strong></p>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <img src="img/covid/4.png" class="img-fluid" width="80%" height="auto">
                    <p class="text-center m-1">Sono presenti all'interno del locale delle <strong>SOLUZIONI IDRO-ALCOLICHE</strong> per l'igenizzazione delle mani.</p>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <img src="img/covid/3.png" class="img-fluid" width="80%" height="auto">
                    <p class="text-center m-1">Devono essere, per quanto possibile, <strong>EVITATI GLI ASSEMBRAMENTI</strong> all' interno del locale</p>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <img src="img/covid/2.png" class="img-fluid" width="80%" height="auto">
                    <p class="text-center m-1">Deve essere rispettata la distanza interpersonale di <strong>ALMENO UN METRO</strong></p>
                </div>
            </div>


        </div>
        <hr class="border-secondary">

        <div id="div-registrazione" <?php if ($_smarty_tpl->tpl_vars['idUtente']->value) {?>style="display: none"<?php }?>>
        <div class="row justify-content-center px-2" id="registrazione">

            <div class="col-12 col-md-9 col-lg-6 text-center">
                <h5 class="text-center m-1">Registrati e ottieni la tua tessera Socio</h5>
                <form action="index.php?section=Registrazione&action=registra" method="post" id="regForm">

                    <div class="form-group">
                        <label for="nomeinput">Nome</label>
                        <input type="text" name="nome" required class="form-control" id="nomeinput" aria-describedby="nomeHelp" placeholder="Il tuo nome">
                    </div>

                    <div class="form-group">
                        <label for="cognomeinput">Cognome</label>
                        <input type="text" name="cognome" required class="form-control" id="cognomeinput" aria-describedby="cognomeHelp" placeholder="Il tuo cognome">
                    </div>

                    <div class="form-group">
                        <label for="datanascitainput">Data di nascita</label>
                        <input class="form-control datepicker" required name="nascita" type="text" id="datanascitainput" placeholder="aaaa/mm/gg">
                    </div>

                    <div class="form-check">
                        <input required class="form-check-input" name="privacy" type="checkbox" value="" id="privacy-check">
                        <label class="form-check-label" for="privacy-check">
                            Accetto i termini specificati nell' <a href="" data-toggle="modal" data-target="#privacy-modal">informativa della privacy e di trattamento dati</a>
                        </label>
                    </div>
                    
                    <div class="form-check">
                        <input required class="form-check-input" name="maggiorenne" type="checkbox" value="" id="maggiorenne-check">
                        <label class="form-check-label" for="privacy-check">
                            Dichiaro di essere maggiorenne
                        </label>
                    </div>


                    <button type="submit" class="btn btn-primary my-4">Diventa Socio</button>
                    <button data-toggle="modal" data-target="#modal-presenza" type="button" class="btn btn-secondary my-4">Ho già una tessera</button>
                </form>


            </div>
        </div>
        <div class="row justify-content-center px-2" style="display: none" id="grazie">

            <div class="col-12 text-center text-light" style="padding-bottom: 20rem">
                <h5>Grazie di esserti registrato!</h5>
                <h5>Sei ora nostro socio, la tua carta è stata scaricata automaticamente!</h5>
                <h5>Conservala perchè ti servirà ogni volta che verrai a trovarci</h5>
                <div class="spinner-border" role="status" id="spinner">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
        
    <div class="container-fluid bg-light" style="display: none" id="tesseraContainer">
        <div class="row justify-content-center">
            <div class="col-12 text-center p-3">



                <div class="card text-white bg-light-allegriso mb-3 border-0" id="tessera" style="width: 100rem">
                    <div class="card-body p-0">
                        <div class="row">

                            <div class="col-6 card-allegriso p-2">
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
                                        <div>
                                            <span id="idTessera" class="font-weight-bold text-light small"></span>
                                        </div>
                                    </div>
                                    <div class="col-3">

                                    </div>
                                </div>
                            </div>
                            <div class="col-6 card-allegriso-back p-2 border-left border-secondary">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
        <div id="div-presenza-confermata" <?php if (!$_smarty_tpl->tpl_vars['idUtente']->value) {?>style="display: none"<?php }?>>
        <div class="row justify-content-center px-2" id="grazie">
            <div class="col-12 text-center text-light" style="padding-bottom: 20rem">
                <h5>Grazie per averci visitato!</h5>
                <h5>Clicca quì sotto per registrare l'ingresso di oggi al nostro Club!</h5>
                <h5 class="font-weight-bold" id="presenza-confermata" style="display: none"><i class="fas fa-check mr-1"></i>Ingresso registrato con successo</h5>
                <button class="btn btn-primary" id="btn-presenza" onclick="registraIngresso(<?php echo $_smarty_tpl->tpl_vars['idUtente']->value;?>
)">Registra ingresso</button>
                <div class="spinner-border" role="status" id="spinner-presenza" style="display: none">
                    <span class="sr-only">Loading...</span>
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
