var mymap = L.map('mapid').setView([35.095193, 393.241882], 9);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
 maxZoom: 18,
 attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
  'Imagery Β© <a href="https://www.mapbox.com/">Mapbox</a>',
 id: 'mapbox.streets'
}).addTo(mymap);

/*L.marker([35.025498, 393.151245]).addTo(mymap)
 .bindPopup("<b>Hello world!</b><br />I am a popup").openPopup();*/

var popup = L.popup();

function onMapClick(e) {
 /*
 popup
  .setLatLng(e.latlng)
  .setContent("You clicked the map at " + e.latlng.toString())
  .openOn(mymap);*/

  //add pv
  var f = document.createElement("form");

        var label_name=createLabelForm("Name");
        var textbox_name= createTextboxForm("Name","Enter name:");

        var label_address=createLabelForm("Address");
        var textbox_address= createTextboxForm("Address","Enter Address:");

        
        var s = document.createElement("input"); //input element, Submit button
        s.setAttribute('type',"submit");
        s.setAttribute('id','addButton');
        s.setAttribute('name', 'addButton');
        s.setAttribute('value','Add PV');
        //s.innerHTML = "Add PV";
                  
        f.appendChild(label_name);
        f.appendChild(textbox_name);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_address);
        f.appendChild(textbox_address);
        
       
        f.appendChild(s); 
        
        var lat = (e.latlng.lat);
        var lng = (e.latlng.lng);

        
        popup.setLatLng([lat, lng]).addTo(mymap)
             .bindPopup(f).openPopup();


}

mymap.on('click', onMapClick);

/*
$('#addButton').click(function(){
  
});*/


function createLabelForm(elementName){
  var label = document.createElement("LABEL");
  var t = document.createTextNode(elementName);
  label.appendChild(t);


  return label;
}

function createTextboxForm(elementName,elementData){
 
  var i = document.createElement("input"); //input element, text
  i.setAttribute('type',"text");
  i.setAttribute('name',elementName);
  i.setAttribute('value', elementData);

  return i;
}





var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        //var pets=myObj.pets;
        //document.getElementById("demo").innerHTML = pets[0].animal;

        
        for(i=0;i<myObj[0].length;i++){

          //get pvs

          //console.log(typeof myObj[0][i].latitude);

         // alert("name "+parseFloat(myObj[0][i].latitude)+", "+ myObj[0][i].longitude+" length:"+myObj[0].length);
       
       
       /*  var f = document.createElement("form");
        f.setAttribute('method',"post");
        f.setAttribute('action',"submit.php");

        var label_name=createLabelForm("Name");
        var textbox_name= createTextboxForm("Name",myObj[0][i].name);

        var label_address=createLabelForm("Address");
        var textbox_address= createTextboxForm("Address",myObj[0][i].address);

        var label_operator=createLabelForm("Operator");
        var textbox_operator= createTextboxForm("Operator",myObj[0][i].operator);
        
        var label_commissionDate=createLabelForm("Commission Date");
        var textbox_commissionDate= createTextboxForm("CommissionDate",myObj[0][i]["commission date"]);
        
        var label_description=createLabelForm("Description");
        var textbox_description= createTextboxForm("Description",myObj[0][i].description);
        
        var label_power=createLabelForm("System Power");
        var textbox_power= createTextboxForm("SystemPower",myObj[0][i]["system power"]);
        
        var label_annualProduction=createLabelForm("Annual Production");
        var textbox_annualProduction= createTextboxForm("AnnualProduction",myObj[0][i]["annual production"]);
        
        var label_C02avoided=createLabelForm("CO2 Avoided");
        var textbox_C02avoided= createTextboxForm("CO2Avoided",myObj[0][i]["C02 avoided"]);
        
        var label_reimbursement=createLabelForm("Reimbursement");
        var textbox_reimbursement= createTextboxForm("Reimbursement",myObj[0][i].reimbursement);
        
        var label_solarPanelModules=createLabelForm("Solar Panel Modules");
        var textbox_solarPanelModules= createTextboxForm("SolarPanelModules",myObj[0][i]['solar panel modules']);
        
        var label_azimuthAngle=createLabelForm("Azimuth Angle");
        var textbox_azimuthAngle= createTextboxForm("AzimuthAngle",myObj[0][i]['azimuth angle']);
        
        var label_inclinationAngle=createLabelForm("Inclination Angle");
        var textbox_inclinationAngle= createTextboxForm("InclinationAngle",myObj[0][i]['inclination angle']);
        
        var label_communication=createLabelForm("Communication");
        var textbox_communication= createTextboxForm("Communication",myObj[0][i]['communication']);
        
        var label_inverter=createLabelForm("Inverter");
        var textbox_inverter= createTextboxForm("Inverter",myObj[0][i]['inverter']);
        
        var label_sensors=createLabelForm("Sensors");
        var textbox_sensors= createTextboxForm("Sensors",myObj[0][i]['sensors']);
        
        var s = document.createElement("button"); //input element, Submit button
        s.setAttribute('type',"submit");
        s.innerHTML = "Save Changes";
                  
        f.appendChild(label_name);
        f.appendChild(textbox_name);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_address);
        f.appendChild(textbox_address);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_operator);
        f.appendChild(textbox_operator);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_commissionDate);
        f.appendChild(textbox_commissionDate);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_description);
        f.appendChild(textbox_description);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_power);
        f.appendChild(textbox_power);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_annualProduction);
        f.appendChild(textbox_annualProduction);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_C02avoided);
        f.appendChild(textbox_C02avoided);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_reimbursement);
        f.appendChild(textbox_reimbursement);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_solarPanelModules);
        f.appendChild(textbox_solarPanelModules);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_azimuthAngle);
        f.appendChild(textbox_azimuthAngle);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_inclinationAngle);
        f.appendChild(textbox_inclinationAngle);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_communication);
        f.appendChild(textbox_communication);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_inverter);
        f.appendChild(textbox_inverter);
        f.appendChild(document.createElement("br"));
        f.appendChild(label_sensors);
        f.appendChild(textbox_sensors);
       
        f.appendChild(s); 
        
        L.marker([myObj[0][i].latitude,myObj[0][i].longitude]).addTo(mymap)
             .bindPopup(f).openPopup();*/
    }
    }
};
xmlhttp.open("GET", "results.json", true);
xmlhttp.send();

/*var ajax = new XMLHttpRequest(); 
ajax.onreadystatechange = function() { 
  if (ajax.readyState == 4) { 
    var mytext =JSON.parse(ajax.responseText);
    window.alert(mytext.address[0]); 
  } 
}; 
ajax.open("GET", "results.json", true); 
ajax.send(null); */