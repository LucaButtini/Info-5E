<?php
$title= 'Home Page';
require './Template/header.php';

?>

<h1 class="text-danger mt-3 mb-4"><strong>Benvenuti nel nostro Negozio di Elettronica</strong></h1>
    <!-- Immagine di presentazione: assicurati di avere il file immagine nella cartella corretta -->
    <img src="Template/es_prod.webp" alt="Negozio di Elettronica" style="height: 50%; width: 50%;border: 3px solid #000;" class="mb-4">
    <p class="lead">
        Scopri la nostra ampia gamma di prodotti di elettronica di ultima generazione.<br>
        Dalle soluzioni per la casa agli accessori per il tempo libero, offriamo qualità e convenienza.
    </p>

    <div class="mb-4">
        <a href="prodotti.php" class="btn btn-dark btn-lg mt-3">Visualizza Prodotti</a>
    </div>


<?php
require './Template/footer.php';
?>
