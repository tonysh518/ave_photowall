AveneAdminController

    .controller('WinnerPostCtrList', function($scope,$upload, $http, $modal,$location, $log, $routeParams, PhotoService, WinnerService, ROOT) {

        $scope.onFileSelect = function($files, type) {
            var file = $files[0];
            console.log(file);
            $scope.upload = $upload.upload({
                url: ROOT+'/winner/UploadImage',
                data: {type: type},
                file: file
            }).progress(function(evt) {
                    console.log('percent: ' + parseInt(100.0 * evt.loaded / evt.total));
                }).success(function(data, status, headers, config) {
                    $scope[type+"_preview"] = ROOT + data.data;
                    $scope[type] = data.data;
                });
        }

        $scope.submit = function() {
            var winner = {
                month : $scope.month,
                name : $scope.name,
                avatar : $scope.avatar,
                tel : $scope.tel,
                photo : $scope.photo,
                prize : $scope.prize,
                prize_image : $scope.prize_image
            }
            WinnerService.post(winner, function(res){
                if(res) {
                    $location.path( "/winner/list" );
                }
            });
        }


    })


    .controller('WinnerListCtrList', function($scope,$upload, $http, $modal, $log, $routeParams, PhotoService, WinnerService, ROOT) {

        WinnerService.list(function(res){
            $scope.winners = res.data;
        });


    })


