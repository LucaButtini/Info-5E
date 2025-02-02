<?php
require 'header.php';
?>
<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center p-">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
        <p class="lead">Inserisci i dati riguardanti le case automobilistiche.</p>
    </div>

        <form method="post" action="act_page.php">
            <div class="mb-4">
                <label for="nome_casa" class="form-label">Nome casa:</label>
                <input type="text" class="form-control" id="nome_casa" placeholder="Nome" required>
            </div>
            <div class="mb-4">
                <label for="nome_casa" class="form-label">Seleziona Livrea:</label>
                <select class="form-select" aria-label="Default select example" required>
                    <option selected>Livrea</option>
                    <option value="1">Rosso</option>
                    <option value="2">Nero</option>
                    <option value="3">Blu</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi Casa</button>
        </form>

</div>

</div>
<?php
require 'footer.php';
?>
