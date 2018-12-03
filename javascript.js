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
 
 popup
  .setLatLng(e.latlng)
  .setContent("You clicked the map at " + e.latlng.toString())
  .openOn(mymap);
}

mymap.on('click', onMapClick);


function createLabelForm(elementName){
  var label = document.createElement("LABEL");
  var t = document.createTextNode(elementName);
  label.appendChild(t);


  return label;
}

function createTextboxForm(elementData){
 
  var i = document.createElement("input"); //input element, text
  i.setAttribute('type',"text");
  i.setAttribute('name',"name");
  i.setAttribute('value', elementData);

  return i;
}