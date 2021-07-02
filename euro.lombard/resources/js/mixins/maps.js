const departmentsLocationInMap = () => {
        
  function CreateMap(mapID) {
    this.map = null;
    this.mapDiv = document.getElementById(mapID);
    this.mapData = this.mapDiv.dataset;
    this.center = { lat: Number(this.mapData.lat), lng: Number(this.mapData.lng) };  
  
    this.initMap = function(zoom) {
      zoom = zoom || 8;
      this.map = new google.maps.Map(this.mapDiv, {
        center: this.center,
        zoom: zoom,
        styles:  [
          {"elementType": "geometry", "stylers": [{ "color": "#2f3a83"}]},/* * */
          {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]},
          {"elementType": "labels.text.fill", "stylers": [{"color": "#80b2ab"}]},/* * */
          {"elementType": "labels.text.stroke", "stylers": [{"color": "#212121"}]}, /* * */
          {"featureType": "administrative", "elementType": "geometry", "stylers": [{"color": "#80b2ab"}]},/* * */
          {"featureType": "administrative.country", "elementType": "labels.text.fill", "stylers": [{"color": "#9e9e9e"}]},
          {"featureType": "administrative.land_parcel", "stylers": [{"visibility": "off"}]},
          {"featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [{"color": "#80b2ab"}]}, /*  */
          {"featureType": "poi", "elementType": "labels.text.fill", "stylers": [{"color": "#80b2ab"}]},/* * */
          {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#2f3e83"}]}, /*  */
          {"featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [{"color": "#80b2ab"}]}, /*  */
          {"featureType": "road", "elementType": "geometry.fill", "stylers": [{"color": "#2f4b83"}]}, /*  */
          {"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"color": "#8a8a8a"}]},
          {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#2f5783"}]}, /* * */
          {"featureType": "road.highway", "elementType": "geometry", "stylers": [{"color": "#2f4b83"}]}, /*  */
          {"featureType": "road.highway.controlled_access", "elementType": "geometry", "stylers": [{"color": "#4e4e4e"}]},
          {"featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{"color": "#80b2ab"}]}, /*  */
          {"featureType": "transit", "elementType": "labels.text.fill", "stylers": [{"color": "#80b2ab" }]},/* * */
          {"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#2f2483"}]},
          {"featureType": "water", "elementType": "labels.text.fill", "stylers": [{"color": "#3d3d3d"}]}
        ],
      });
    
    }
  }

  function CreateMapDepartments(mapID, locations) {
    CreateMap.apply(this, arguments);
  
    locations = locations || [
      { lat: 47.857599, lng: 35.104645, title: 'hey', descriptionPhone: 'Контакти', city_ru: 'м. Запорiжжя', street: 'пр. Соборний, 181', phone: '067 100 00 00', descriptionTime: 'Режим роботи', time: 'Цiлодобово', more: 'Подробнее...', image: 'img/zp_sobor181.png', number: '№55' },
      { lat: 47.858599, lng: 35.124645, title: 'fifafo', descriptionPhone: 'Контакти', city_ru: 'м. Запорiжжя', street: 'пр. Соборний, 181', phone: '067 100 00 00', descriptionTime: 'Режим роботи', time: 'Цiлодобово', more: 'Подробнее...', image: 'img/zp_sobor181.png', number: '№143' },
      { lat: 48.857599, lng: 34.104645, title: 'elo', descriptionPhone: 'Контакти', city_ru: 'м. Запорiжжя', street: 'пр. Соборний, 181', phone: '067 100 00 00', descriptionTime: 'Режим роботи', time: 'Цiлодобово', more: 'Подробнее...', image: 'img/zp_sobor181.png', number: '№245' },
      { lat: 49.857599, lng: 36.104645, title: 'raz', descriptionPhone: 'Контакти', city_ru: 'м. Запорiжжя', street: 'пр. Соборний, 181', phone: '067 100 00 00', descriptionTime: 'Режим роботи', time: 'Цiлодобово', more: 'Подробнее...', image: 'img/zp_sobor181.png', number: '№3' },
    ];
    let infoWindows = [];
    let currentMark = null;
  
    this.panZoom = function() {
      this.map.panTo({lat: -25.363882, lng: 131.044922});
    }
    // start setCluster
    this.setCluster = function() {
      // Start markers array 
      let markers = locations.map(function(item, i) {

        let marker =  new google.maps.Marker({
          position: {lat: item.lat, lng: item.lng},
          icon: 'img/marker.png'
        });
      // console.log(marker);
        // Start info Windows
        let infoWindow = new google.maps.InfoWindow({
          content: `
          <div class="lombard-map__city">${item.city_ru}</div>
          <div class="lombard-map__street">${item.street}</div>
          <div class="lombard-map__image-wrapper">
            <img class="lombard-map__image" src="${item.image}">
          </div>
          <div class="lombard-map__description-time">${item.descriptionTime}</div>
          <div class="lombard-map__work-time">${item.time}</div>
          <div class="lombard-map__description-phone">${item.descriptionPhone}</div>
          <div class="lombard-map__phone">
            <a href="tel:${item.phone}">${item.phone}</a>
          </div>

          
          `,
          width: 350
        });
        infoWindows.push(infoWindow);
        let hoverInfoWindow = new google.maps.InfoWindow({
          content: `<div>${item.number}</div>`
        });
        // End info Windows
      
        // Start Event listeners
        google.maps.event.addListener(marker, 'click', function() {
          // console.log("click");
          for (let i=0; i < infoWindows.length; i++) {
            infoWindows[i].close();
          }
          hoverInfoWindow.close();
          infoWindow.open(this.map, marker);
          // start style image if noload
          // let $lombardMapImage = $('.lombard-map__image');
          // if( $lombardMapImage.outerWidth() < 50) {
          //   $lombardMapImage.hide();
          // }
          // end style image if noload
          currentMark = infoWindow;   
          // start show close btn
          $('.lombard-map__image-wrapper').closest('.gm-style-iw').next().show();
          // end show close btn
        });
      
/*         google.maps.event.addListener(marker, 'mouseover', function() {
          if (currentMark) return;
          hoverInfoWindow.open(this.map, marker);
        }); */
      
  /*       google.maps.event.addListener(marker, 'mouseout', function() {
          hoverInfoWindow.close();
        }); */
      
        google.maps.event.addListener(infoWindow, 'closeclick', function() {
          currentMark = null;
        });
        // End Event listeners
      
        return marker;
      });
      // End markers array
            
      let markerCluster = new MarkerClusterer(this.map, markers, {
        // imagePath: 'img/cluster-image',
        styles: [{
          url: 'img/cluster-image.png',
          width: 50,
          height: 50,
          textColor: '#2F2483',
          textSize: 12
        }],
      });
    }
    // end setCluster
  }

  function CreateMapDepartment(mapID) {
    CreateMap.apply(this, arguments);
  
    this.setMarker = function() {
      let marker =  new google.maps.Marker({
        position: this.center,
        map: this.map,
        icon: 'img/marker.png'
      });
    }
  }

  let departmentsMap;

  function initMap(locations) {
    // console.log('initMap()');
    // departments
    (function() {
      if ( ! $('#departmentsMap').length ) return;
      departmentsMap = new CreateMapDepartments('departmentsMap', locations);
      departmentsMap.initMap();
      departmentsMap.setCluster();    
    }());
    // end departments

    // department
    (function() {
      if ( ! $('#departmentMap').length ) return;
      let departmentMap = new CreateMapDepartment('departmentMap');
      departmentMap.initMap();
      departmentMap.setMarker();
    }());
    // end department
  };

  function locationZoom(location) {
    departmentsMap.panZoom(location);
  }
  
  // XMLHttpRequest for map's json template
  function loadLocations() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/departments/get-departments/', true);
    xhr.send();
    xhr.onreadystatechange = function() {
      console.log( 'appa')
      if (this.readyState != 4) return;
      if (this.status != 200) {
        console.log( 'ошибка: ' + (this.status ? this.statusText : 'запрос не удался') );
        return;
      } else {
        console.log( xhr.responseText ); // responseText -- текст ответа.
      
        try {
          var locations = JSON.parse(xhr.responseText);
          console.log(locations);
        } catch (e) {
          console.log( "Некорректный ответ " + e.message );
        }
      
        initMap(locations);
      }
    }
  };
  // End XMLHttpRequest for map's json template

  let $cityItems = $('.chosen-results'); 

  $cityItems.on('click', function(e) {
    // loadLocations(); 
    // console.log(e.target);
    initMap();
    locationZoom({lat: 47.857599, lng: 35.104645});
  });

  // loadLocations(); 

  // delete
  let locations = [
    { lat: 47.857599, lng: 35.104645, title: 'hey', descriptionPhone: 'Контакти', city_ru: 'м. Запорiжжя', street: 'пр. Соборний, 181', phone: '067 100 00 00', descriptionTime: 'Режим роботи', time: 'Цiлодобово', more: 'Подробнее...', image: 'img/zp_sobor181.png', number: '№55' },
    { lat: 47.858599, lng: 35.124645, title: 'fifafo', descriptionPhone: 'Контакти', city_ru: 'м. Запорiжжя', street: 'пр. Соборний, 181', phone: '067 100 00 00', descriptionTime: 'Режим роботи', time: 'Цiлодобово', more: 'Подробнее...', image: 'img/zp_sobor181.png', number: '№143' },
    { lat: 48.857599, lng: 34.104645, title: 'elo', descriptionPhone: 'Контакти', city_ru: 'м. Запорiжжя', street: 'пр. Соборний, 181', phone: '067 100 00 00', descriptionTime: 'Режим роботи', time: 'Цiлодобово', more: 'Подробнее...', image: 'img/zp_sobor181.png', number: '№245' },
    { lat: 49.857599, lng: 36.104645, title: 'raz', descriptionPhone: 'Контакти', city_ru: 'м. Запорiжжя', street: 'пр. Соборний, 181', phone: '067 100 00 00', descriptionTime: 'Режим роботи', time: 'Цiлодобово', more: 'Подробнее...', image: 'img/zp_sobor181.png', number: '№3' },
  ];
  initMap(locations);
  // end delete
}

export default departmentsLocationInMap;