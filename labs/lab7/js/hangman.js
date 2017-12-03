var alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
var selectedWord = "";
var selectedHint = "";
var board = "";
var remainingGuesses = 6;
var words = [{word: "snake", hint:"It's a reptile"},
             {word: "monkey", hint:"I'm  a mammal"},
             {word: "beetle", hint:"It's an insect"}];
var first = true;
            
window.onload = startGame();
            
function pickWord() {
    var randomIndex = Math.floor(Math.random() * words.length);
    selectedWord = words[randomIndex].word.toUpperCase();
    selectedHint = words[randomIndex].hint;
}
            
function initBoard() {
    for (var letter in selectedWord) {
        board += '_';  
    }
}
            
function updateBoard() {
    $("#word").empty();
    for (var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }  
    $("#word").append("<br />");
}

function startGame() {
    pickWord();
    initBoard();
    updateBoard();
    generateLetters();
}  

function generateLetters () {
    for(var letter of alpha) {
        $('#letters').append("<button class='letter-btn' id='" + letter + "'>" + letter + "</button>");
    }
}

function checkLetter(letter) {
    var positions = new Array();
    for (var i = 0; i < selectedWord.length; i++) {
        if(letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    if(positions.length > 0) {
        //show letters at these positions
        updateWord(positions, letter);
        if(!board.includes('_')) {
            alert("You Won!");
            endGame(true);
        }
    } else {
        remainingGuesses--;
        console.log("User guessed wrong. Remaining guesses is :" + remainingGuesses);
        updateMan();
    }
    if(remainingGuesses == 0) {
        alert('You Lost!');
        endGame(false);
    }
}

function updateWord(positions, letter) {
    for(var pos of positions) {
        board = replaceAt(board, pos, letter);
    }
    updateBoard();
}

function replaceAt(str, index, value) {
    return str.substr(0, index) + value + str.substr(index + value.length);
}

function updateMan() {
    $('#hangImg').attr('src', "img/stick_" + (6-remainingGuesses) + ".png");
}

function endGame(win) {
    $('#letters').hide(); 
    if (win) {
        $('#won').show(); 
    } else {
        $('#lost').show(); 
    }
}

function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("clsas", "btn btn-danger");
}

function hint() {
    if(first) {
        first = false;
        $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    }
}

$(".replayBtn").on("click", function() {
    location.reload();
});

$(".letter-btn").click(function() {
    checkLetter($(this).attr("id"));
    disableButton($(this));
});
