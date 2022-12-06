@extends('layoutclient.point')
@section('title')
    Trang quản lý
@endsection
@section('content')


<style type="text/css">
  th{
    text-align: center;
    background-color: #81919B;
    color: rgb(177, 4, 4);
    font-size: 14px;
  }
  
  td{
    font-family: "Times New Roman", Times, serif;
    font-size: 16px;
  }
  

</style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="http://localhost/Air_DN/public/css/leaflet-panel-layers.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    
    <style>
        #map {
          height: 87vh;    
        }

        .legend {
        	background: rgb(202, 184, 23);
          height: 210px;
          line-height: 30px;
          padding-top: 5px;
          font-size: 17px;
        }
    </style>
    
</head>
<body>
    <div id="map"></div>
</body>
</html>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" ></script>    
    
    
    <script src="http://localhost/Air_DN/public/data/xa1.js"></script>
    <script src="http://localhost/Air_DN/public/data/huyen.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

    
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.8.0/proj4.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.8.0/proj4-src.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.8.0/proj4-src.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.8.0/proj4.min.js"></script> --}}
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<script src="http://localhost/Air_DN/public/js/leaflet-panel-layers.js"></script>
<script src="http://localhost/Air_DN/public/js/proj4.js"></script>
<script src="http://localhost/Air_DN/public/js/geolet.js"></script>

    <script>
        var map = L.map('map').setView([16.054335, 108.123174], 11);


// Layer
var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> '
});
osm.addTo(map);


// Tile layer
var Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
    attribution: '',
    subdomains: 'abcd',
    minZoom: 1,
    maxZoom: 16,
    ext: 'jpg'
});
Stamen_Watercolor.addTo(map);

L.geolet({
				position: 'bottomright'
			}).addTo(map);




var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: ''
});
Esri_WorldImagery.addTo(map);

// GGmap street layer
googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
googleStreets.addTo(map);

// GGmap Satellite layer
googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});
googleSat.addTo(map);


var huyen = L.geoJSON(HuyenJSON, {
        onEachFeature: function (feature, layer) {
            const popupContent1 =
               
                "<tr><td> Vị trí: </td><td>" +
                feature.properties.NAME_2 +  ", Đà Nẵng" +
                "<br></td></tr>" +
                
                "</td></tr>";
            layer.bindPopup(popupContent1);
        },
        style:{
            fillColor: 'orange',
            fillOpacity:0.3,
            
        }
        
    });

    var xa = L.geoJSON(cityJSON,{
        onEachFeature: function (feature, layer) {
            const popupContent1 =
               
                "<tr><td> Vị trí: </td><td>" +
                feature.properties.NAME_3 + ", " + feature.properties.NAME_2 + ", Đà Nẵng" +
                "<br></td></tr>" +
                
                "</td></tr>";
            layer.bindPopup(popupContent1);
        },
        style:{
            fillColor: 'green',
            fillOpacity:0.5,
            
        }
        
    });



    proj4.defs("1","+proj=utm +zone=48 +ellps=WGS84 +towgs84=-192.873,-39.382,-111.202,-0.00205,-0.0005,0.00335,0.0188 +units=m +no_defs");

proj4.defs("2","+proj=tmerc +lat_0=0 +lon_0=106 +k=0.9999 +x_0=500000 +y_0=0 +ellps=WGS84 +towgs84=-191.90441429,-39.30318279,-111.45032835,0.00928836,-0.01975479,0.00427372,0.252906278 +units=m +no_defs");
proj4.defs("WGS84","+title=WGS 84 (long/lat) +proj=longlat +ellps=WGS84 +datum=WGS84 +units=degrees");




async function diem1() {
  fetch('http://localhost/Air_DN/public/data/tramkt.php')

      .then(response => response.text())
      .then((data) => {
         console.log(data);
        var myobj = JSON.parse(data);
        //console.log(myobj);
         var data1 = myobj.records;
         //console.log(data1);
       const icon_xt = L.icon({
         iconUrl: 'http://localhost/Air_DN/public/img/circle1.png',
         iconSize: [20, 20],
       });
       console.log(typeof(myobj[0].x));
        for (var i = 0; i < myobj.length; i++) {
                   // if (coordinates[i].x && coordinates[i].y) {
                       
               var te = proj4("WGS84",[parseFloat(myobj[i].x),parseFloat(myobj[i].y)]);
               var xt1 = L.marker([String(te[1]),String(te[0])],{icon: icon_xt})
               .bindPopup("<table class='table m-0' width='100%'><thead ><tr><th width='50%'>Thuộc tính</th><th width='50%'>Giá trị</th></tr></thead><tbody><tr><td width='50%'>Tên Trạm khí tượng</td> <td width='50%'>" + myobj[i].ten + "</td></tr>" 
                  
                + "<td width='50%'>Hàm lượng NO2</td><td width='50%'>" +  myobj[i].no2 +  "</td></tr>"
                
                + "<td width='50%'>Hàm lượng CO</td><td width='50%'>" +  myobj[i].co +  "</td></tr>"

                + "<td width='50%'>Hàm lượng PM2.5/24h</td><td width='50%'>" +  myobj[i].pm25 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng PM10/24h</td><td width='50%'>" +  myobj[i].pm10 +  "</td></tr>"
                
                + "<td width='50%'>Vị trí</td><td width='50%'>" +  myobj[i].xa + ", " + myobj[i].huyen + ", " + myobj[i].tinh + "</td></tr>"
                 
                 + "<td width='50%'>Xem chi tiết</td><td><a target='blank' href='chi-tiet-diem-kt/"+myobj[i].id+"'> Chi tiết</a></td></tr></tbody></table>").addTo(map);

             
             //console.log(te);
                        
                    //}
                }
    
     });
   }
   diem1();


   async function diem2() {
  fetch('http://localhost/Air_DN/public/data/tramkt1.php')

      .then(response => response.text())
      .then((data) => {
         console.log(data);
        var myobj = JSON.parse(data);
        //console.log(myobj);
         var data1 = myobj.records;
         //console.log(data1);
       const icon_xt = L.icon({
         iconUrl: 'http://localhost/Air_DN/public/img/circle2.png',
         iconSize: [20, 20],
       });
       console.log(typeof(myobj[0].x));
        for (var i = 0; i < myobj.length; i++) {
                   // if (coordinates[i].x && coordinates[i].y) {
                       
               var te = proj4("WGS84",[parseFloat(myobj[i].x),parseFloat(myobj[i].y)]);
               var xt1 = L.marker([String(te[1]),String(te[0])],{icon: icon_xt})
               .bindPopup("<table class='table m-0' width='100%'><thead ><tr><th width='50%'>Thuộc tính</th><th width='50%'>Giá trị</th></tr></thead><tbody><tr><td width='50%'>Tên Trạm khí tượng</td> <td width='50%'>" + myobj[i].ten + "</td></tr>" 
                + "<td width='50%'>Hàm lượng NO2</td><td width='50%'>" +  myobj[i].no2 +  "</td></tr>" 

                + "<td width='50%'>Hàm lượng CO</td><td width='50%'>" +  myobj[i].co +  "</td></tr>"
                + "<td width='50%'>Hàm lượng PM2.5/24h</td><td width='50%'>" +  myobj[i].pm25 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng PM10/24h</td><td width='50%'>" +  myobj[i].pm10 +  "</td></tr>"
                
                + "<td width='50%'>Vị trí</td><td width='50%'>" +  myobj[i].xa + ", " + myobj[i].huyen + ", " + myobj[i].tinh + "</td></tr>"
                 
                 + "<td width='50%'>Xem chi tiết</td><td><a target='blank' href='chi-tiet-diem-kt/"+myobj[i].id+"'> Chi tiết</a></td></tr></tbody></table>").addTo(map);

             
             //console.log(te);
                        
                    //}
                }
    
     });
   }
   diem2();

   async function diem3() {
  fetch('http://localhost/Air_DN/public/data/tramkt2.php')

      .then(response => response.text())
      .then((data) => {
         console.log(data);
        var myobj = JSON.parse(data);
        //console.log(myobj);
         var data1 = myobj.records;
         //console.log(data1);
       const icon_xt = L.icon({
         iconUrl: 'http://localhost/Air_DN/public/img/circle3.png',
         iconSize: [20, 20],
       });
       console.log(typeof(myobj[0].x));
        for (var i = 0; i < myobj.length; i++) {
                   // if (coordinates[i].x && coordinates[i].y) {
                       
               var te = proj4("WGS84",[parseFloat(myobj[i].x),parseFloat(myobj[i].y)]);
               var xt1 = L.marker([String(te[1]),String(te[0])],{icon: icon_xt})
               .bindPopup("<table class='table m-0' width='100%'><thead ><tr><th width='50%'>Thuộc tính</th><th width='50%'>Giá trị</th></tr></thead><tbody><tr><td width='50%'>Tên Trạm khí tượng</td> <td width='50%'>" + myobj[i].ten + "</td></tr>" 
                
                + "<td width='50%'>Hàm lượng NO2</td><td width='50%'>" +  myobj[i].no2 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng CO</td><td width='50%'>" +  myobj[i].co +  "</td></tr>"
                + "<td width='50%'>Hàm lượng PM2.5/24h</td><td width='50%'>" +  myobj[i].pm25 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng PM10/24h</td><td width='50%'>" +  myobj[i].pm10 +  "</td></tr>"

                + "<td width='50%'>Vị trí</td><td width='50%'>" +  myobj[i].xa + ", " + myobj[i].huyen + ", " + myobj[i].tinh + "</td></tr>"
                 
                 + "<td width='50%'>Xem chi tiết</td><td><a target='blank' href='chi-tiet-diem-kt/"+myobj[i].id+"'> Chi tiết</a></td></tr></tbody></table>").addTo(map);

             
             //console.log(te);
                        
                    //}
                }
    
     });
   }
   diem3();


   async function diem4() {
  fetch('http://localhost/Air_DN/public/data/tramkt4.php')

      .then(response => response.text())
      .then((data) => {
         console.log(data);
        var myobj = JSON.parse(data);
        //console.log(myobj);
         var data1 = myobj.records;
         //console.log(data1);
       const icon_xt = L.icon({
         iconUrl: 'http://localhost/Air_DN/public/img/circle4.png',
         iconSize: [20, 20],
       });
       console.log(typeof(myobj[0].x));
        for (var i = 0; i < myobj.length; i++) {
                   // if (coordinates[i].x && coordinates[i].y) {
                       
               var te = proj4("WGS84",[parseFloat(myobj[i].x),parseFloat(myobj[i].y)]);
               var xt1 = L.marker([String(te[1]),String(te[0])],{icon: icon_xt})
               .bindPopup("<table class='table m-0' width='100%'><thead ><tr><th width='50%'>Thuộc tính</th><th width='50%'>Giá trị</th></tr></thead><tbody><tr><td width='50%'>Tên Trạm khí tượng</td> <td width='50%'>" + myobj[i].ten + "</td></tr>" 
                
                + "<td width='50%'>Hàm lượng NO2</td><td width='50%'>" +  myobj[i].no2 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng CO</td><td width='50%'>" +  myobj[i].co +  "</td></tr>"
                + "<td width='50%'>Hàm lượng PM2.5/24h</td><td width='50%'>" +  myobj[i].pm25 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng PM10/24h</td><td width='50%'>" +  myobj[i].pm10 +  "</td></tr>"

                + "<td width='50%'>Vị trí</td><td width='50%'>" +  myobj[i].xa + ", " + myobj[i].huyen + ", " + myobj[i].tinh + "</td></tr>"
                 
                 + "<td width='50%'>Xem chi tiết</td><td><a target='blank' href='chi-tiet-diem-kt/"+myobj[i].id+"'> Chi tiết</a></td></tr></tbody></table>").addTo(map);

             
             //console.log(te);
                        
                    //}
                }
    
     });
   }
   diem4();


   async function diem5() {
  fetch('http://localhost/Air_DN/public/data/tramkt5.php')

      .then(response => response.text())
      .then((data) => {
         console.log(data);
        var myobj = JSON.parse(data);
        //console.log(myobj);
         var data1 = myobj.records;
         //console.log(data1);
       const icon_xt = L.icon({
         iconUrl: 'http://localhost/Air_DN/public/img/circle5.png',
         iconSize: [20, 20],
       });
       console.log(typeof(myobj[0].x));
        for (var i = 0; i < myobj.length; i++) {
                   // if (coordinates[i].x && coordinates[i].y) {
                       
               var te = proj4("WGS84",[parseFloat(myobj[i].x),parseFloat(myobj[i].y)]);
               var xt1 = L.marker([String(te[1]),String(te[0])],{icon: icon_xt})
               .bindPopup("<table class='table m-0' width='100%'><thead ><tr><th width='50%'>Thuộc tính</th><th width='50%'>Giá trị</th></tr></thead><tbody><tr><td width='50%'>Tên Trạm khí tượng</td> <td width='50%'>" + myobj[i].ten + "</td></tr>" 
                
                + "<td width='50%'>Hàm lượng NO2</td><td width='50%'>" +  myobj[i].no2 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng CO</td><td width='50%'>" +  myobj[i].co +  "</td></tr>"
                + "<td width='50%'>Hàm lượng PM2.5/24h</td><td width='50%'>" +  myobj[i].pm25 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng PM10/24h</td><td width='50%'>" +  myobj[i].pm10 +  "</td></tr>"

                + "<td width='50%'>Vị trí</td><td width='50%'>" +  myobj[i].xa + ", " + myobj[i].huyen + ", " + myobj[i].tinh + "</td></tr>"
                 
                 + "<td width='50%'>Xem chi tiết</td><td><a target='blank' href='chi-tiet-diem-kt/"+myobj[i].id+"'> Chi tiết</a></td></tr></tbody></table>").addTo(map);

             
             //console.log(te);
                        
                    //}
                }
    
     });
   }
   diem5();


   async function diem6() {
  fetch('http://localhost/Air_DN/public/data/tramkt6.php')

      .then(response => response.text())
      .then((data) => {
         console.log(data);
        var myobj = JSON.parse(data);
        //console.log(myobj);
         var data1 = myobj.records;
         //console.log(data1);
       const icon_xt = L.icon({
         iconUrl: 'http://localhost/Air_DN/public/img/circle6.png',
         iconSize: [20, 20],
       });
       console.log(typeof(myobj[0].x));
        for (var i = 0; i < myobj.length; i++) {
                   // if (coordinates[i].x && coordinates[i].y) {
                       
               var te = proj4("WGS84",[parseFloat(myobj[i].x),parseFloat(myobj[i].y)]);
               var xt1 = L.marker([String(te[1]),String(te[0])],{icon: icon_xt})
               .bindPopup("<table class='table m-0' width='100%'><thead ><tr><th width='50%'>Thuộc tính</th><th width='50%'>Giá trị</th></tr></thead><tbody><tr><td width='50%'>Tên Trạm khí tượng</td> <td width='50%'>" + myobj[i].ten + "</td></tr>" 
                
                + "<td width='50%'>Hàm lượng NO2</td><td width='50%'>" +  myobj[i].no2 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng CO</td><td width='50%'>" +  myobj[i].co +  "</td></tr>"

                + "<td width='50%'>Hàm lượng PM2.5/24h</td><td width='50%'>" +  myobj[i].pm25 +  "</td></tr>"

                + "<td width='50%'>Hàm lượng PM10/24h</td><td width='50%'>" +  myobj[i].pm10 +  "</td></tr>"

                + "<td width='50%'>Vị trí</td><td width='50%'>" +  myobj[i].xa + ", " + myobj[i].huyen + ", " + myobj[i].tinh + "</td></tr>"
                 
                 + "<td width='50%'>Xem chi tiết</td><td><a target='blank' href='chi-tiet-diem-kt/"+myobj[i].id+"'> Chi tiết</a></td></tr></tbody></table>").addTo(map);

             
             //console.log(te);
                        
                    //}
                }
    
     });
   }
   diem6();





    var baseLayers = [
  {
    name: "Street map",
    layer: L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3']}),
    active: true
  },

  {
    name: " Satellite",
    layer: L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }),
    active: false
  },


  
  ]
  

var overLayers = [
  {
    group: "Ranh giới hành chính",
    layers: [
    {
        active: false,
        name: "Xã, Phường",
        
        layer: xa
      },

      {
        active: true,
        name: "Quận, Huyện",
        
        layer: huyen
      },

      

      
    ]
  },
  

 

];

var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
  //compact: true,
  //collapsed: true,
  collapsibleGroups: true
});

map.addControl(panelLayers);

L.Control.geocoder().addTo(map);


var legend = L.control({position: 'bottomleft'});

                    legend.onAdd = function (map) {
                        var div = L.DomUtil.create('div', 'legend');
                        div.innerHTML += '<b >Chất lượng không khí</b><br>'
                        div.innerHTML +=  '<img width="20px" src="http://localhost/Air_DN/public/img/circle1.png"> Tốt<br>'
                        div.innerHTML +=  '<img width="20px" src="http://localhost/Air_DN/public/img/circle2.png"> Đạt yêu cầu <br>'
                        div.innerHTML +=  '<img width="20px" src="http://localhost/Air_DN/public/img/circle3.png"> Ô nhiễm vừa phải<br>'
                        div.innerHTML +=  '<img width="20px" src="http://localhost/Air_DN/public/img/circle4.png"> Kém<br>'
                        div.innerHTML +=  '<img width="20px" src="http://localhost/Air_DN/public/img/circle5.png"> Rất kém <br>'
                        div.innerHTML +=  '<img width="20px" src="http://localhost/Air_DN/public/img/circle6.png"> Ô nhiễm nặng<br>'
                       
                        
        
                        return div;
                    };
                    
                    legend.addTo(map);


                    
                    

    </script>

    


@endsection