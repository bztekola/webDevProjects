<!DOCTYPE html>
<html>
<head>
	<title>Memory Game</title>
	<link href="styles.css" rel="stylesheet"/>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>		
	<div class="scoreboard">
	<div id="count"></div>
	<div id="timer"></div>
	</div>
	<main>

		<?php
			$cards = [
				'apple', 'banana', 'cherries', 'grapes', 'lemon', 'lime', 'orange', 'raspberry',
				'apple', 'banana', 'cherries', 'grapes', 'lemon', 'lime', 'orange', 'raspberry'
			];

			for($i = 0, $l = count($cards); $i < $l; $i++){
				$r = rand(0, count($cards) - 1);
				echo '<div class="card" data-fruit="' . $cards[$r] . '"><img src="images/' . $cards[$r] . '.png" /></div>';
				array_splice($cards, $r, 1);
			}


		?>
	</main>
	<script type="text/javascript">
		setTimeout(startGame, 1000);
		setInterval(updateScoreboard, 500);

		var cardsSelected = [];
		var count = 0;
		var timer;
		
		function startGame(){
			$('main .card').addClass('hidden');

			$('.card').on('click', clickCard);
			timer = new Date();

			setInterval(updateScoreboard, 500);
		}
		function clickCard(event){

			if(cardsSelected.length <= 1){
				if(cardsSelected[0] == event.currentTarget){

				}else if(!event.currentTarget.classList.contains('removed') ){
					$(event.currentTarget).removeClass('hidden');
				cardsSelected.push(event.currentTarget);
				count++;

				if (cardsSelected.length ==2){
					if(cardsSelected[0].dataset.fruit == cardsSelected[1].dataset.fruit){
						setTimeout(removeCards, 1000);
						}else{
							setTimeout(resetCards, 1000);
						}
					}
				}

				}
				updateScoreboard();

			}

			function updateScoreboard(){
				$('#count').text(count);

				let timeDifference = Math.round((new Date().getTime() - timer.getTime()) / 1000);
				$('#timer').text(timeDifference + "seconds");

			}

			function removeCards(){
				cardsSelected[0].classList.add('removed');
				cardsSelected[1].classList.add('removed');
				cardsSelected.length = 0;

			}
			function resetCards(){
				cardsSelected[0].classList.add('hidden');
				cardsSelected[1].classList.add('hidden');
				cardsSelected.length = 0;
			}	
	</script>

</body>
</html>
