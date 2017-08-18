angular.module('neo-httpManager', [])

.factory('httpManager', function($http) {
   return { 
   		postRequester: function (requestMethod,parameters,successCallback) {
    		$http({method: 'POST',url: 'http://localhost/gentella/'+requestMethod,data: $.param(parameters),headers: {'Content-Type': 'application/x-www-form-urlencoded'}}).then(
			successCallback
			, function errorCallback(response) {alert('Couldn\'t Connect');});
		},
		jsonParser: function (response) {
    		var x2js = new X2JS();
    		return x2js.xml_str2json(response.data);
		},
		jsonCleaner: function (response) {
			return response.string.__text.replace(/\r?\n|\r/g,'');
		}
   };
});
