

// function sendscore(score) {
//   let httpRequest = new XMLHttpRequest();
//   let name = document.getElementById("affichenom").innerHTML;
//   let url = "/Ajax.php?name=" + name + "&score=" + score;
//   httpRequest.open("GET", url, true);
//   httpRequest.send();
// }


//Ajax POST méthode
function sendscore(game_score, game_id, id_user) {


  let xhttp = new XMLHttpRequest();
  xhttp.open("POST","Ajax/ajaxfile.php",true);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("info_score").innerHTML = this.responseText;

    }
  }
  let data = new FormData();
  data.append("id_user",id_user);
  data.append("game_id",game_id);
  data.append("game_score",game_score);
  xhttp.send(data);
}
