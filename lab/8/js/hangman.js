//Variables
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{ word: "snake", hint: "It's a reptile"}, {word: "monkey", hint: "It's a mammal"}, {word: "beetle", hint: "It's an insect"}];
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

//Listeners
window.onload = startGame();



$(".letter").click(function(){
    console.log($(this).attr("id"));
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".replayBtn").click(function(){
    window.location.reload();
});

//Functions
function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button class='letter btn btn-success' id='" + letter + "'>" + letter + "</button>");
    }
}

function startGame() {
    console.log("We started the game");
    $('#lost').hide();
    $('#won').hide();
    $('#letters').show();
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
    updateMan();
}

function initBoard() {
    //"in" keyword assigns the index
    //"of" would assign the value
    for (var letter in selectedWord) {
        board.push("_");
    }
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function updateBoard() {
    $("#word").empty();
    
    for (var i = 0; i < board.length; i++) {
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br />")
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
}

function checkLetter(letter) {
    var positions = new Array();
    //Put all positions the leter exists in an array
    for (var i = 0; i < selectedWord.length; i++) {
        // console.log(selectedWord);
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
        if (!board.includes('_')) {
            console.log("we boutta won");
            endGame(true);
        }
    } else {
        remainingGuesses -= 1;
        updateMan();
    }
    
    if(remainingGuesses <= 0) {
        endGame(false);
    }
}

function updateWord(positions, letter) {
    for (var pos of positions) {
        board[pos] = letter;
    }
    updateBoard();
}

function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win) {
    $('#letters').hide();
    
    if(win) {
        $('#won').show();
    } else {
        $('#lost').show();
    }
}

function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}