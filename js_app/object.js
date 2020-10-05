class CalculDistance{

    constructor(){}

    calculDistance2PointsGPS(lat1, long1, lat2, long2){

        // convert from degrees to radians
        let latFrom = this.deg2rad(lat1);
        let lonFrom = this.deg2rad(long1);
        let latTo = this.deg2rad(lat2);
        let lonTo = this.deg2rad(long2);

        let earthRadius = 6378137;

        let latDelta = latTo - latFrom;
        let lonDelta = lonTo - lonFrom;

        let angle = 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(latDelta / 2), 2) + Math.cos(latFrom) * Math.cos(latTo) * Math.pow(Math.sin(lonDelta / 2), 2)));
            
        return angle * earthRadius;
    }

    deg2rad(degrees) {
        var pi = Math.PI;
        return degrees * (pi/180);
    }

    calculDIstanceTrajet(activite){

        let distance = 0;
        let totalDistance = 0;
    
        for (let i = 0; i < activite.data.length-1; i=i+1) {

            let lat1 = activite.data[i].latitude;
            let long1 = activite.data[i].longitude;
            let lat2 = activite.data[i+1].latitude;
            let long2 = activite.data[i+1].longitude;

            distance = this.calculDistance2PointsGPS(lat1, long1, lat2, long2);

            totalDistance = totalDistance + distance;
        }

        return totalDistance;
    }

}


calcul = new CalculDistance()
console.log(calcul.calculDIstanceTrajet({
    "activity":{
      "date":"01/09/2018",
      "description": "IUT -> RU"
    },
    "data":[
      {"time":"13:00:00","cardio_frequency":99,"latitude":47.644795,"longitude":-2.776605,"altitude":18},
      {"time":"13:00:05","cardio_frequency":100,"latitude":47.646870,"longitude":-2.778911,"altitude":18},
      {"time":"13:00:10","cardio_frequency":102,"latitude":47.646197,"longitude":-2.780220,"altitude":18},
      {"time":"13:00:15","cardio_frequency":100,"latitude":47.646992,"longitude":-2.781068,"altitude":17},
      {"time":"13:00:20","cardio_frequency":98,"latitude":47.647867,"longitude":-2.781744,"altitude":16},
      {"time":"13:00:25","cardio_frequency":103,"latitude":47.648510,"longitude":-2.780145,"altitude":16}
    ]
  }));
