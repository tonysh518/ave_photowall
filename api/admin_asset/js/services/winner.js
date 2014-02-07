AveneAdminServices.factory( 'WinnerService', function($http, ROOT) {
    return {
        post: function(param, success) {

            $http.post(ROOT+'/winner/post', param, {
                cache: false
            })
            .success(function(data) {
                success(data);
            })
            .error(function() {
            });
        },
        list: function( success) {

            $http.get(ROOT+'/winner/list', {
                cache: false
            })
            .success(function(data) {
                success(data);
            })
            .error(function() {
            });
        }


    };
});
