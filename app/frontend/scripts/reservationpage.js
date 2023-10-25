<<<<<<< Updated upstream
Date.parse(document.getElementById("deadline").value) < Date.parse(document.getElementById("order_date").value)
=======
//Date.parse(document.getElementById("deadline").value) < Date.parse(document.getElementById("order_date").value)

var reservationData = [];

$(function() {
    fetchDbData();
    addNavFoot();
});

function addNavFoot(){
    fetch('frontend/widgets/navbar.html')
    .then(response => response.text())
    .then(text => {       
        $( "#navbar" ).append(text);
    });

    fetch('frontend/widgets/footer.html')
    .then(response => response.text())
    .then(text => {       
        $( "#footer" ).append(text);
    });
}

function fetchDbData() {
    var datas = ["reservations"];
  
    datas.forEach(requestData);
  
    function requestData(dataToGet) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              if (dataToGet == "reservations") {
                reservationData = JSON.parse(this.responseText);
                loadReservations();
              }
            }
          };
        xhttp.open("GET", "http://localhost/BeslogicTestTechnique/app/index.php?resource=reservation&action=getdata&data=" + dataToGet, true);
        xhttp.send();
    }
}

function deleteReservation(id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
      };
    xhttp.open("POST", "http://localhost/BeslogicTestTechnique/app/index.php?resource=reservation&action=delete&dataId=" + id, true);
    xhttp.send();
}

function loadReservations(){
    var tables = "";
    var count = 0;
    reservationData.forEach(parseData);

    function parseData(reservation){
        count++;
        var html = `<tr><th scope="row">${count}</th>
        <td>${reservation.check_in}</td>
        <td>${reservation.final_cost}$ CAD</td>
        <td>${reservation.name}</td>
        <td><img class="imageClass" src="${reservation.img_url}"></td>
        <td><button onclick="deleteReservation(${reservation.reservation_id})" type="button" class="btn btn-danger">Delete</button>
        </td>
        </tr>`;

        tables += html;
    }
    $( "#reservationTable" ).append(tables);
}
>>>>>>> Stashed changes
