const scores = [1, 2, 1];
let fLen = scores.length;
var player1_total = 0;
var player2_total = 0;

for (let i = 0; i < fLen; i++) {
  document.write(scores[i])
  
  if (scores[i] == 1)
     player1_total = player1_total + 1
  else
     player2_total = player2_total + 1
}

if (player1_total >= player2_total)
	document.write(player1_total)
else
	document.write(player2_total)