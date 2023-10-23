var houseData = [];
var houseAmenities = [];
var price = 0;

$(function() {
    addNavFoot();
    fetchDbData();
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
    function requestData(data, dataId) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              if (data == "house") {
                houseData = JSON.parse(this.responseText);
                loadHousePage();
              }
              if (data == "houseAmenity") {
                houseAmenities = JSON.parse(this.responseText);
                loadAmenities();
              }
            }
          };
        xhttp.open("GET", "http://localhost/BeslogicTestTechnique/app/index.php?resource=housepage&action=getdata&data=" + data +"&dataId=" + dataId, true);
        xhttp.send();
    }
    var urlId = getUrlParams("data");
    requestData('house', urlId);
    requestData('houseAmenity', urlId);
}

function loadHousePage(){
    console.log(houseData);
    houseData.forEach(function(house_data){
        $( "#title" ).append(house_data.name);
        $( "#like" ).append(house_data.total_likes);
        $( "#location" ).append(house_data.location);
        $("#imgbnb").attr("src", house_data.img_url)
        $( "#ddTitle" ).append(house_data.description);
        $( "#guests" ).append(house_data.guests_num + " guests");
        $( "#bedrooms" ).append(house_data.bedrooms_num + " bedrooms");
        $( "#baths" ).append(house_data.bathrooms_num + " baths");
        $( "#price" ).append(house_data.price + "$ Per Night");
        price = house_data.price;
    });
}

function loadAmenities(){
    houseAmenities.forEach(function(house_Amenity){
        var html = '<li class="amenity">'+ house_Amenity.name +'</li>'
        $( "#amenities" ).append(html);
    });
}

function reserveHouse(){
    function requestData(dataId) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                 window.location.href = "/BeslogicTestTechnique/app/"
            }
          };
        xhttp.open("GET", "http://localhost/BeslogicTestTechnique/app/index.php?resource=housepage&action=reserve&price="+ price +"&dataId=" + dataId, true);
        xhttp.send();
    }
    var urlId = getUrlParams("data");
    requestData(urlId);

}


function getUrlParams(parameterName) {
    let parameters = new URLSearchParams(window.location.search);

    return parameters.get(parameterName);
}
  