'use strict';

/* Filters */

angular.module('AveneAdmin.filters', [])
    .filter('interpolate', ['version', function(version) {
    return function(text) {
        return String(text).replace(/\%VERSION\%/mg, version);
    }
    }])
    .filter('status', function() {
        return function(input) {
            var output;
            switch(input) {
                case '0':
                    output = 'Unapproved';
                    break;
                case '1':
                    output = 'Approved';
                    break;
                case '2':
                    output = 'Producing';
                    break;
                case '3':
                    output = 'Produced';
                    break;
            }
            return output;
        }
    })
    .filter('thumbnail', function() {
        return function(input) {
            var output = input.replace('.jpg','_thumb.jpg');
            return output;
        }
    });
