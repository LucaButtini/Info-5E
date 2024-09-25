document.addEventListener('DOMContentLoaded', () => {
    // Riferimenti agli elementi del DOM
    const confermaButton = document.getElementById('conferma');
    const nomeInput = document.getElementById('nome');
    const cognomeInput = document.getElementById('cognome');
    // Aggiunge l'evento click al pulsante di conferma
    confermaButton.addEventListener('click', () => {
        const nome = nomeInput.value;
        const cognome = cognomeInput.value;
        if (nome && cognome) {
            // Salva i valori nel localStorage
            localStorage.setItem('nome', nome);
            localStorage.setItem('cognome', cognome);
            // Visualizza i dati nella console
            console.log(`Nome: ${nome}`);
            console.log(`Cognome: ${cognome}`);
        } else {
            console.log('Per favore, inserisci sia il nome che il cognome.');
        }
    });
});
