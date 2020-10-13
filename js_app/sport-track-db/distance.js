

var CalculDistance = function(){

    this.calculDistance2PointsGPS = function(lat1, long1, lat2, long2){

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

    this.deg2rad = function(degrees) {
        var pi = Math.PI;
        return degrees * (pi/180);
    }

    this.calculDistanceTrajet = function(activite){

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


var calcul = new CalculDistance();
module.exports = calcul;
