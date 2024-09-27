let regLink = document.querySelector('#account');
regLink.addEventListener("click", function () {
    const widht = screen.width / 4; //25%
    const heihgt = screen.height / 2; //50%
    const left = (screen.width - widht) / 2;
    const top = (screen.height - heihgt) / 2;
    //apro la finestra del form
    let finestra = window.open("", "", `width=${widht},height=${heihgt},left=${left},top=${top}`);
    // Creazione del collegamento al foglio di stile
    let formCss = finestra.document.createElement("link");
    formCss.rel = "stylesheet";
    formCss.href = "styleForm.css";
    finestra.document.head.appendChild(formCss);
    // Creazione del form
    let form = finestra.document.createElement("form");
    form.classList = "container";
    // Creazione del campo Username
    let userName = finestra.document.createElement("input");
    userName.type = "text";
    userName.placeholder = "NAME";
    userName.required = true;
    // Creazione del campo Password
    let pass = finestra.document.createElement("input");
    pass.type = "password";
    pass.placeholder = "PASSWORD";
    pass.required = true;
    // Creazione del pulsante di invio
    let submit = finestra.document.createElement("input");
    submit.type = "submit";
    submit.value = "INVIA DATI";
    submit.classList = "login";
    // Aggiunta del form alla finestra e dei campi al form
    finestra.document.body.appendChild(form);
    form.appendChild(userName);
    form.appendChild(pass);
    form.appendChild(finestra.document.createElement("br"));
    form.appendChild(submit);
    let script2 = finestra.document.createElement("script");
    script2.src = "script2.js";
    finestra.document.body.appendChild(script2);
});
document.querySelector("#p-login").textContent = localStorage.getItem("username") + "---" + localStorage.getItem("password");
