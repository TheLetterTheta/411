var ApiService = function ($http, $location) {
    var url = location.host;

    this.GetApiCall = function (controllerName, method, obj) {
        result = $http.get('http://' + url + '/phalcon/api/' + controllerName + '/' + method, obj)
            .success(
                function (data, status) {
                    var event = {
                        result: data,
                        hasErrors: false
                    };
                })
            .error(
                function (data, status) {
                    var event = {
                        result: "",
                        hasErrors: true,
                        error: status
                    };
                }
            );
    }
}
