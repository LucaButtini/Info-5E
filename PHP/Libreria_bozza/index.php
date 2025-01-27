<?php
require 'header.php';

$title='Home';
?>
<div class="container mt-5 rounded-4 p-5 bg-white">
    <div class="text-center pt-3">
        <h1 class="text-danger"><strong>La Libreria Digitale</strong></h1>
        <p class="lead">Benvenuto nella gestione della libreria digitale.</p>
    </div>

    <div class="text-center my-4">
        <img src="Immagini/libreria2.jpg" alt="Libreria digitale" class="rounded-3 shadow-sm" id="img-home">
    </div>

    <div class="container my-5">
        <h3 class="text-center mb-4">Seleziona un opzione per eseguire un operazione CRUD:</h3>
        <div class="row text-center">
            <div class="col-12 mb-4">
                <div class="card shadow-sm bg-body-tertiary">
                    <div class="card-body">
                        <h5 class="card-title">Aggiungi Libro</h5>
                        <p class="card-text">Inserisci un nuovo libro nella libreria.</p>
                        <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card shadow-sm bg-body-tertiary">
                    <div class="card-body">
                        <h5 class="card-title">Visualizza Libri</h5>
                        <p class="card-text">Consulta l'elenco completo dei libri.</p>
                        <a href="read.php" class="btn btn-success"><i class="bi bi-table"></i> Visualizza</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card shadow-sm bg-body-tertiary">
                    <div class="card-body">
                        <h5 class="card-title">Aggiorna Prezzo</h5>
                        <p class="card-text">Modifica il prezzo di un libro esistente.</p>
                        <a href="update.php" class="btn btn-warning"><i class="bi bi-pencil"></i> Aggiorna</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card shadow-sm bg-body-tertiary">
                    <div class="card-body">
                        <h5 class="card-title">Elimina Libro</h5>
                        <p class="card-text">Rimuovi un libro dalla tua libreria.</p>
                        <a href="delete.php" class="btn btn-danger"><i class="bi bi-trash"></i> Elimina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
require 'footer.php';
?>

