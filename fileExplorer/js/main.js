var N_fileExpApp = {};
N_fileExpApp.app = angular.module('FileExp', []);
N_fileExpApp.app.directive("fileExplorerStructure", function (){
	return {
		restrict : "A",
		templateUrl: "./templates/fileExplorerHtml.html"
	};
});
N_fileExpApp.app.service('getDataFromServer', ['$http', function ($http) {
	var serviceObj = {};
	serviceObj.getData = function () {
		var path = '', filterNCredentialObj = {username:'', password: '', filter: 'm2ts,m2t,ts,m2ps,ps,mpeg,VOB,mpg,avi,mxf,asf,wmv,dv,dvcpro,mov,mp4,avc,3gpp,3gp,3g2,3gpp2,ismv,isma,qt,aiff,flv,lxf,gxf,m2v,264,h264,dpx,m3u8,mpd,ism'}, lastIndexNumberOfResult = 0;
		var data = "callFrom=browse&path="+path+"&userName="+filterNCredentialObj.username+"&password="+filterNCredentialObj.password+"&filter="+filterNCredentialObj.filter+"&lastIndexNumberOfResult="+lastIndexNumberOfResult;
		//return $http.post("http://localhost:80/Pulsar/getDirectoriesFromDll.php", data, {
		return $http.post("data.php", data, {
		/*headers : {
		        'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
		    }*/
		}).then(function (response) {
/*			if(response	!=	3 && response	!=	6){
				erroCodeAndData	=	response.split('|*|*|*|*|');
				lastIndexNumberOfResult	=	erroCodeAndData[2];
			}
*/			return response.data;
		}, function (error) {
			$window.console.log(error);
		});
	}
	return serviceObj;
}]);
N_fileExpApp.app.controller('MainController', ['$scope', '$window', 'getDataFromServer', function ($scope, $window, getDataFromServer) {
	$scope.drives = [];
	getDataFromServer.getData().then(function (response) {
		$scope.drives  = response;
		console.log($scope.drives);
	}, function () {});
}]);