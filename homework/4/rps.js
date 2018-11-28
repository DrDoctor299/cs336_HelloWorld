var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;
var playerChoice;

function init(){
	imgPlayer = $("#imgPlayer")[0];
	btnRock = $("#btnRock")[0];
	btnPaper = $("#btnPaper")[0];
	btnScissors = $("#btnScissors")[0];
	btnGo = $('#btnGo')[0];
	deselectAll();
}

function deselectAll() {
	btnRock.style.backgroundColor = 'silver';
	btnPaper.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';
}	
	
function select(choice) {
	playerChoice = choice;
	imgPlayer.src = 'images/' + choice + '.png';
	deselectAll();
	if(choice == 'rock') btnRock.style.backgroundColor = '#888888';
	if(choice == 'paper') btnPaper.style.backgroundColor = '#888888';
	if(choice == 'scissors') btnScissors.style.backgroundColor = '#888888';
	btnGo.style.display = 'block';
}

function startGame() {
	$('#introScreen').hide();
}

function replay() {
	document.getElementById('endScreen').style.display = 'none';
	btnGo.style.display = 'none';
	
	deselectAll();
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	imgPlayer.src = 'images/question.png';
	document.getElementById('imgComputer').src = 'images/question.png';
}

function go() {
	var txtEndTitle = document.getElementById('txtEndTitle');
	var txtEndMessage = document.getElementById('txtEndMessage');
	
	var numChoice = Math.floor(Math.random()*3);
	
	if(numChoice==0) {
		computerChoice = 'rock';
		imgComputer.src = 'images/rock.png';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		if(playerChoice=='rock') {
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'TIE';
		}
		if(playerChoice=='paper') {
			txtEndTitle.innerHTML = 'Paper covers Rock';
			txtEndMessage.innerHTML = 'YOU WIN';
		}
		if(playerChoice=='scissors') {
			txtEndTitle.innerHTML = 'Rock smashes Scissors';
			txtEndMessage.innerHTML = 'YOU LOSE';
		}
	}
	else if(numChoice==1) {
		computerChoice = 'paper';
		imgComputer.src = 'images/paper.png';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		if(playerChoice=='rock') {
			txtEndTitle.innerHTML = 'Paper covers Rock';
			txtEndMessage.innerHTML = 'YOU WIN';
		}
		if(playerChoice=='paper') {
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'TIE';
		}
		if(playerChoice=='scissors') {
			txtEndTitle.innerHTML = 'Scissors cuts Paper';
			txtEndMessage.innerHTML = 'YOU LOSE';
		}
	}
	else if(numChoice==2) {
		computerChoice = 'scissors';
		imgComputer.src = 'images/scissors.png';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		if(playerChoice=='rock') {
			txtEndTitle.innerHTML = 'Rock smashes Scissors';
			txtEndMessage.innerHTML = 'YOU LOSE';
		}
		if(playerChoice=='paper') {
			txtEndTitle.innerHTML = 'Scissors cuts Paper';
			txtEndMessage.innerHTML = 'YOU WIN';
		}
		if(playerChoice=='scissors') {
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'TIE';
		}
	}
	
	$('#endScreen').show();
	
	// alert(playerChoice + ', ' + computerChoice);
}