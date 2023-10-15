var houseData = "";

$(function() {
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
    houseData.forEach(inserthouseDataToWidget);

    function inserthouseDataToWidget(house) {
      if (house.id == id) {
        div.querySelector('#housename').innerHTML = `${house.fname} ${house.lname} <span style="font-size: 22px;">from</span> ${house.company_name} <span style="float: right; font-size: 24;">Last update: x days</span>`;
        div.querySelector('#body').innerHTML = "<p>Email: " + house.email + "</p><p>Phone: " + house.phone + "</p>";
        div.querySelector('#buttonContainer').innerHTML = '<button class="crudButton" onclick="edithouseWidget(' + house.id + ')">Edit</button>'//<button class="crudButtonDelete" onclick="deleteConfirmation('+house.id+')">Delete</button>'
        let found = false;
        projectData.forEach(insertProjectDataToWidget);
        function insertProjectDataToWidget(project) {
          if (project.house_id == id) {
            div.querySelector('#projects').innerHTML += `<p>${project.service_name} - ${project.status_name} - ${project.project_description} - ${project.order_date} - ${project.deadline} - ${project.budget}</p>`;
            found = true;
          }
        }
        if (!found) {
          div.querySelector('#projects').innerHTML = "<p>No projects found</p>";
        }
        return;
      }
    }
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
                searchFunction('clientSearchInput', clientData);
            }
        }
      };
      xhttp.open("GET", "http://localhost/archipel/dashboard/getdata/" + dataToGet, true);
      xhttp.send();
    }
}

function searchFunction(elementId) {
    var inputValue = document.getElementById(elementId).value;
    console.log(inputValue);
  
    var result = "";
  
    if (elementId == 'clientSearchInput') {
      result = clientData;
      var resultElement = document.getElementById("clientsTable");
      resultElement.innerHTML = "<thead><tr><th onclick=\"sortTable('clientsTable', 0)\">Name</th><th onclick=\"sortTable('clientsTable', 1)\">Company Name</th><th onclick=\"sortTable('clientsTable', 2)\">Email</th><th onclick=\"sortTable('clientsTable', 3)\">Phone</th><th>&nbsp;</th></tr></thead>";
  
      for (var i = 0; i < result.length; i++) {
        if (`${result[i].fname} ${result[i].lname} ${result[i].company_name} ${result[i].email} ${result[i].phone}`.toLowerCase().includes(inputValue.toLowerCase())) {
  
          var tr = document.createElement("tr");
          tr.innerHTML = `<tr><td>${result[i].fname} ${result[i].lname}</td><td>${result[i].company_name}</td><td><a href="https://mail.google.com/mail/?view=cm&fs=1&to=${result[i].email}">${result[i].email}</a></td><td>${result[i].phone}</td><td><a onclick="openWidget('client', ${result[i].id})\" class=\"fa-solid fa-up-right-from-square icon\"></a></td></tr>`;
          resultElement.appendChild(tr);
        }
      }
    } else if (elementId == 'projectSearchInput') {
      result = projectData;
      var resultElement = document.getElementById("projectsTable");
  
      resultElement.innerHTML = "<thead><tr><th onclick=\"sortTable('projectsTable', 0)\">Client</th><th onclick=\"sortTable('projectsTable', 1)\">Service Type</th><th onclick=\"sortTable('projectsTable', 2)\">Status</th><th onclick=\"sortTable('projectsTable', 3)\">Description</th><th onclick=\"sortTable('projectsTable', 4)\">Order date</th><th onclick=\"sortTable('projectsTable', 5)\">Deadline</th><th onclick=\"sortTable('projectsTable', 6)\">Budget</th><th>&nbsp;</th></tr></thead>";
  
      for (var i = 0; i < result.length; i++) {
        if (`${result[i].fname} ${result[i].lname} ${result[i].company_name} ${result[i].service_name}`.toLowerCase().includes(inputValue.toLowerCase())) {
  
          var tr = document.createElement("tr");
          tr.innerHTML = `<tr><td>${result[i].fname} ${result[i].lname}(${result[i].company_name.trim()})</td><td>${result[i].service_name}</td><td>${result[i].status_name}</td><td>${result[i].project_description}</td><td>${result[i].order_date}</td><td>${result[i].deadline}</td><td>${result[i].budget}</td><td><a onclick="openWidget('project', ${result[i].project_id})\" class=\"fa-solid fa-up-right-from-square icon\"></a></td></tr>`;
  
          resultElement.appendChild(tr);
        }
      }
    }
    else if (elementId == 'adminSearchInput') {
      console.log(adminData);
      result = adminData;
      var resultElement = document.getElementById("adminstable");
  
  
      resultElement.innerHTML = "<thead><tr><th>Admin Id</th><th>Username</th><th>Email</th><th>Enabled 2FA</th><th>&nbsp;</th></tr></thead>";
  
      for (var i = 0; i < result.length; i++) {
  
        if (`${result[i].id} ${result[i].username} ${result[i].email}`.toLowerCase().includes(inputValue.toLowerCase())) {
  
          var tr = document.createElement("tr");
          let enable = "Not enabled"
          if (result[i].enabled2fa === 1) {
            enable = "Enabled"
          }
          tr.innerHTML = `<tr><td>${result[i].id}</td><td>${result[i].username}</td><td><a href="https://mail.google.com/mail/?view=cm&fs=1&to=${result[i].email}">${result[i].email}</a></td><td>${enable}</td><td><a onclick="editAdminWidget('${result[i].id}')" class=\"fa-solid fa-up-right-from-square icon\"></a></td></tr>`;
          resultElement.appendChild(tr);
        }
  
  
      }
  
    }
  
}