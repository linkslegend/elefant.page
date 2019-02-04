/* global google */
import GoogleMapsLoader from 'google-maps';

// https://developers.google.com/maps/documentation/javascript/get-api-key
GoogleMapsLoader.KEY = 'AIzaSyDVLSmdnszVnSFqJspfkf8bcp5icSNmzjo';

// map
let map;
let zoom = 12;

// https://snazzymaps.com
let styles = [ { 'elementType': 'geometry', 'stylers': [ { 'color': '#f5f5f5' } ] }, { 'elementType': 'labels.icon', 'stylers': [ { 'visibility': 'off' } ] }, { 'elementType': 'labels.text.fill', 'stylers': [ { 'color': '#616161' } ] }, { 'elementType': 'labels.text.stroke', 'stylers': [ { 'color': '#f5f5f5' } ] }, { 'featureType': 'administrative', 'elementType': 'geometry', 'stylers': [ { 'visibility': 'off' } ] }, { 'featureType': 'administrative.land_parcel', 'stylers': [ { 'visibility': 'off' } ] }, { 'featureType': 'administrative.land_parcel', 'elementType': 'labels.text.fill', 'stylers': [ { 'color': '#bdbdbd' } ] }, { 'featureType': 'administrative.neighborhood', 'stylers': [ { 'visibility': 'off' } ] }, { 'featureType': 'poi', 'stylers': [ { 'visibility': 'off' } ] }, { 'featureType': 'poi', 'elementType': 'geometry', 'stylers': [ { 'color': '#eeeeee' } ] }, { 'featureType': 'poi', 'elementType': 'labels.text.fill', 'stylers': [ { 'color': '#757575' } ] }, { 'featureType': 'poi.park', 'elementType': 'geometry', 'stylers': [ { 'color': '#e5e5e5' } ] }, { 'featureType': 'poi.park', 'elementType': 'labels.text.fill', 'stylers': [ { 'color': '#9e9e9e' } ] }, { 'featureType': 'road', 'elementType': 'geometry', 'stylers': [ { 'color': '#ffffff' } ] }, { 'featureType': 'road', 'elementType': 'labels', 'stylers': [ { 'visibility': 'off' } ] }, { 'featureType': 'road', 'elementType': 'labels.icon', 'stylers': [ { 'visibility': 'off' } ] }, { 'featureType': 'road.arterial', 'elementType': 'labels.text.fill', 'stylers': [ { 'color': '#757575' } ] }, { 'featureType': 'road.highway', 'elementType': 'geometry', 'stylers': [ { 'color': '#dadada' } ] }, { 'featureType': 'road.highway', 'elementType': 'labels.text.fill', 'stylers': [ { 'color': '#616161' } ] }, { 'featureType': 'road.local', 'elementType': 'labels.text.fill', 'stylers': [ { 'color': '#9e9e9e' } ] }, { 'featureType': 'transit', 'stylers': [ { 'visibility': 'off' } ] }, { 'featureType': 'transit.line', 'elementType': 'geometry', 'stylers': [ { 'color': '#e5e5e5' } ] }, { 'featureType': 'transit.station', 'elementType': 'geometry', 'stylers': [ { 'color': '#eeeeee' } ] }, { 'featureType': 'water', 'elementType': 'geometry', 'stylers': [ { 'color': '#c9c9c9' } ] }, { 'featureType': 'water', 'elementType': 'geometry.fill', 'stylers': [ { 'color': '#3fb7ff' } ] }, { 'featureType': 'water', 'elementType': 'labels.text.fill', 'stylers': [ { 'color': '#9e9e9e' } ] } ]

// google maps callback
function addMap(el) {
  // config
  let config = {
    zoom,
    center: new google.maps.LatLng(0, 0),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    scrollwheel: false,
    disableDefaultUI: true,
    styles,
  };

  // markers
  let markers = el.querySelectorAll('.js-google-map-marker');

  // init
  map = new google.maps.Map(el, config);

  // funcs
  addMapMarkers(markers);
  centerMap();

  // return map
  return map;
}

function addMapMarkers(markers) {
  // assign markers to map
  map.markers = [];

  // add marker
  markers.forEach((marker) => {
    // data from data- attributes
    let data = {
      lat: marker.getAttribute('data-lat'),
      lng: marker.getAttribute('data-lng'),
      icon: marker.getAttribute('data-icon'),
    };

    // position
    let position = new google.maps.LatLng(data.lat, data.lng);

    let icon = {
      url: data.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(32, 32),
    };

    // create instance
    let instance = new google.maps.Marker({
      position,
      map,
      icon,
    });

    // add to map.markers array
    map.markers.push(instance);
  });
}

function centerMap() {
    // bounds
    let bounds = new google.maps.LatLngBounds();

    // get bounds for each marker
    map.markers.forEach((marker) => {
      let latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
      bounds.extend(latlng);
    });

    // determine if single or multiple
    if (map.markers.length === 1) {
      // set center and zoom
      map.setCenter(bounds.getCenter());
      map.setZoom(zoom);
    } else {
      // fit markers into map
      map.fitBounds(bounds);
    }
}

function init() {
  GoogleMapsLoader.load(google => {
      let els = document.querySelectorAll('.js-google-map');

      if (!els) {
        return;
      }

      Array.from(els).map(el => google.map = addMap(el));
  });
}

export default {
  init,
}
