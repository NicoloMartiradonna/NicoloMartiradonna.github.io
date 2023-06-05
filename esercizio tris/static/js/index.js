let celleOccupate=0
let fine=false
 
let links = document.querySelectorAll(".gridBtn"),
			currentPlayer = 1,
    cellIsOccupied = true

	let td = document.querySelector(".risultato")
	let d = document.querySelector(".pulsante")

	let board=[
		[null, null, null],
		[null, null, null],
		[null, null, null]
	]

		d.addEventListener("click", function(e){
			e.preventDefault()
			td.innerHTML=``
			for(let i=0; i<links.length; i++){
				links[i].classList.remove("player1", "player2")
			}
			celleOccupate=0
			currentPlayer = 1
    		cellIsOccupied = false
			fine=false
		})

		
		

		for(let i = 0; i < links.length; i++){
			let link = links[i]
			link.addEventListener("click", function(e){
				e.preventDefault()
        cellIsOccupied = e.currentTarget.classList.contains("player2") || e.currentTarget.classList.contains("player1")	;			
        
        console.log(cellIsOccupied)

		if(!cellIsOccupied && !fine){
		celleOccupate++;
		
        e.currentTarget.classList.toggle(`player${currentPlayer}`)
		checkWinner();
		
	
		
	

		let ai = getBestMove(board, "X")

		function getBestMove(board, player){
			if(player==="O"){
				bestScore=-Infinity
			}
			else if(player==="X"){
				bestScore=+Infinity
			}
			bestMove=null
			empty=getEmptyCells(board)
			let i
			let j

			empty.forEach(function (element, index) {
				i=element[0]
				j=element[1]
				board[i][j]=player
				let currentMoveScore=minimax(board, player)
				board[i][j]=null
				if(player==="O"){
					if(currentMoveScore>bestScore){
						bestScore=currentMoveScore
						bestMove=[i,j]
					}
				}
				else if(player==="X"){
					if(currentMoveScore<bestScore){
						bestScore=currentMoveScore
						bestMove=[i,j]
					}
				}
				
			});
			return bestMove
		}


		function minimax(board, player){
			let bestScore
			if(player==="O"){
				bestScore=-Infinity
			}
			else if(player==="X"){
				bestScore=+Infinity
			}
			emptyCells=getEmptyCells(board)

			if(fine){
				if(checkWinner()==="X"){
					return -1
				}
				else if(checkWinner()==="O"){
					return 1
				}
				else{
					return 0
				}
			}else{
				if(player==="O"){
					emptyCells.forEach(function(element, index){
						let i=element[0]
						let j=element[1]
						board[i][j]=player
						score=minimax(board,"X")
						board[i,j]
						bestScore=Math.max(bestScore,score)
					});
				}else if(player==="X"){
					emptyCells.forEach(function(element, index){
						let i=element[0]
						let j=element[1]
						board[i][j]=player
						score=minimax(board,"O")
						board[j,i]
						bestScore=Math.min(bestScore,score)
					});
				}
			}
			return bestScore
		}
		

		function getEmptyCells(board){
			let d=new Array()
			let p=0
			for(i=0; i<board.length; i++){
				for(j=0; j<board[i].length; j++){
					if(board[i][j]===null){
						d[p]=[i,j]
						p++
					}
					
				}
			}
			return d
		}


		console.log(ai)

		function checkWinner(){
			if((links[0].classList.contains(`player${currentPlayer}`) && links[1].classList.contains(`player${currentPlayer}`) && links[2].classList.contains(`player${currentPlayer}`))||
		(links[3].classList.contains(`player${currentPlayer}`) && links[4].classList.contains(`player${currentPlayer}`) && links[5].classList.contains(`player${currentPlayer}`))||
		(links[6].classList.contains(`player${currentPlayer}`) && links[7].classList.contains(`player${currentPlayer}`) && links[8].classList.contains(`player${currentPlayer}`))||
		(links[0].classList.contains(`player${currentPlayer}`) && links[3].classList.contains(`player${currentPlayer}`) && links[6].classList.contains(`player${currentPlayer}`))||
		(links[1].classList.contains(`player${currentPlayer}`) && links[4].classList.contains(`player${currentPlayer}`) && links[7].classList.contains(`player${currentPlayer}`))||
		(links[2].classList.contains(`player${currentPlayer}`) && links[5].classList.contains(`player${currentPlayer}`) && links[8].classList.contains(`player${currentPlayer}`))||
		(links[0].classList.contains(`player${currentPlayer}`) && links[4].classList.contains(`player${currentPlayer}`) && links[8].classList.contains(`player${currentPlayer}`))||
		(links[2].classList.contains(`player${currentPlayer}`) && links[4].classList.contains(`player${currentPlayer}`) && links[6].classList.contains(`player${currentPlayer}`))){
			console.log(`player${currentPlayer} Ha vinto`);
			if(currentPlayer==1){
			td.style.color="blue"
			}else{
				td.style.color="red"
			}
			
			td.innerHTML=`player${currentPlayer} Ha vinto`
			fine=true
		}
		else {
			if(celleOccupate==9){
				td.style.color="brown"
				console.log("Nessuno ha vinto");
				td.innerHTML="Nessuno ha vinto"
				fine=true
			}
		}
		currentPlayer = currentPlayer === 1 ? 2 : 1

	}
			}
		
		});
	}

	
		