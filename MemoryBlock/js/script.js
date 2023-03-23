let lv = 3;  //mi dirà a che livello sono 
let estratte = []; // le celle che sono uscite nel quale mettere il fiore
let find; //mi dirà quanti fiori l'utente ha trovato finora

function create_table(size) { //self explain
    let btn = document.querySelector(".start");
    btn.disabled = true;
    let table = document.querySelector("tbody");
    for (let i = 0; i < size; i++) {
        table.appendChild(document.createElement('tr'));
        let row = document.querySelectorAll("tr")[i];
        for (let j = 0; j < size; j++) {
            row.appendChild(document.createElement('td'));
        }
    }
    game(size);
}


function seleziona_random(size) { //sceglie quali sono le celle che avranno il fiore
    let cells = document.querySelectorAll("td");
    for (let i = 0; i < size; i++) {
        while (1) {
            let number = Math.floor(Math.random() * cells.length);
            if (!estratte.includes(number)) {
                estratte.push(number);
                break;
            }
        }
    }
}

function game(size) { //funzione che inizializza il gioco
    seleziona_random(size);
    find = 0; //inizializziamo find 
    let cells = document.querySelectorAll("td");
    for (let i = 0; i < size; i++) {
        cella = estratte[i];

        cells[cella].innerText = "🌻";
        cells[cella].classList.add("flower")
    }
    setTimeout(hide, 3000);
}

function hide() { //nascondo i segni e attivo gli evenlistener
    let cells = document.querySelectorAll("td");
    for (let i = 0; i < cells.length; i++) {
        cells[i].addEventListener('click', click);
        cells[i].innerText = "";
    }
}

function click() {
    if (this.classList.contains("clicked")) {
        return;
    }

    if (this.classList.contains("flower")) {
        find++;
        this.classList.add("clicked");
        if (find == lv) {
            setTimeout(nextlevel, 250);
        }
    } else {
        this.classList.add("wrong");
        setTimeout(gameover, 250);
    }
}

function nextlevel() {
    alert("Livello superato! Aumento la difficoltà");
    clean();
    lv++;
    estratte = [];
    create_table(lv);

}
function gameover() {
    clean();
    let score = lv - 2;
    alert("Complimenti! Hai raggiunto il livello " + score);
    lv = 3;
    let btn = document.querySelector(".start");
    btn.disabled = false;
    estratte = [];
    var user = prompt("Dammi l'username");
    //devo mandare i dati 
    manda(score, user);
}

function manda(score, user) {
    var xhr = new XMLHttpRequest();
    var queryString = "?score=" + score + "&username=" + user;
    var url = "../php/addScore.php" + queryString;
    xhr.open("GET", url);
    xhr.send();
    console.log("sono qui"); 
}

function clean() {
    let cells = document.querySelectorAll("td");
    for (let i = 0; i < cells.length; i++) {
        cells[i].remove();
    }
}

