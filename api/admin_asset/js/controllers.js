'use strict';

/* Controllers */

var AveneAdminController = angular.module('AveneAdmin.controllers', []);

AveneAdminController
    .controller('MainCtrl', function($scope, $http, $modal, $log,$location, $routeParams, PhotoService) {

        PhotoService.getStatistics(function(res){
            $scope.counts = res;
        });

        $scope.refreshPage = function(){
            window.location.reload();
        }


        $scope.logout = function(){
            PhotoService.logout(function(){
                window.location.reload();
            });
        }

        $scope.logout = function(){
            PhotoService.logout(function(){
                window.location.reload();
            });
        }

//        $scope.search = function(){
//            if($scope.keyword == '') {
//                $location.path( "/scarf/unapproved" );
//            }
//            else {
//                $location.path( "/scarf/search/" + $scope.keyword );
//            }
//        }

    });