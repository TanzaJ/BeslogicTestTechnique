var houseData = [];

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

function loadHouses(){
    houseData.forEach(function(house_data){
        console.log(house_data);
        var html_house = '<!DOCTYPE html><a style="text-decoration:none" href="http://localhost/BeslogicTestTechnique/app/index.php?resource=housepage&action=view&data='+ house_data.house_id +'"><div class="widHouse">    <div class="imagecontainer"><img src="'+ house_data.img_url +'" class="house_img"><h1 class="house_title">'+ house_data.name +'</h1></div><div class="house_desc"><h2 class="house_location">'+ house_data.location +'</h2>      <h2 class="house_likes">'+ house_data.total_likes +'</h2>      <h4 class="house_price">'+ house_data.price +'$ CAD Per Night</h4>    </div></div></a>';
        
        $( "#container" ).append(html_house);
    });
}


function fetchDbData() {
    var datas = ["housesFull"];
  
    datas.forEach(requestData);
  
    function requestData(dataToGet) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              if (dataToGet == "housesFull") {
                houseData = JSON.parse(this.responseText);
                loadHouses();
              }
            }
          };
        xhttp.open("GET", "http://localhost/BeslogicTestTechnique/app/index.php?resource=frontpage&action=getdata&data=" + dataToGet, true);
        xhttp.send();
    }
}