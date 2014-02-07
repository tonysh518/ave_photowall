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
                    $scope.winner[type+"_preview"] = ROOT + data.data;
                    $scope.winner[type] = data.data;
                });
        }

        $scope.submit = function() {
            var winner = {
                month : $scope.winner.month,
                name : $scope.winner.name,
                avatar : $scope.winner.avatar,
                tel : $scope.winner.tel,
                photo : $scope.winner.photo,
                prize : $scope.winner.prize,
                prize_img : $scope.winner.prize_img
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

    .controller('WinnerEditCtrList', function($scope,$upload, $http, $modal, $log, $routeParams, PhotoService, WinnerService, ROOT) {
        WinnerService.get($routeParams.wid,function(res){
            $scope.winner = res.data;
            $scope.winner.photo_preview = ROOT + $scope.winner.photo;
            $scope.winner.prize_image_preview = ROOT + $scope.winner.prize_img;
            console.log($scope.winner);
        });

        $scope.submit = function() {
            var winner = {
                wid : $scope.winner.wid,
                month : $scope.winner.month,
                name : $scope.winner.name,
                avatar : $scope.winner.avatar,
                tel : $scope.winner.tel,
                photo : $scope.winner.photo,
                prize : $scope.winner.prize,
                prize_img : $scope.winner.prize_img
            }
            WinnerService.put(winner, function(res){
                if(res) {
                    $location.path( "/winner/list" );
                }
            });
        }
    })

