'use strict';

/* Services */


// Demonstrate how to register services
// In this case it is a simple value service.
var AveneAdminServices = angular.module('AveneAdmin.services', [])
    .value('ROOT', '/ave_photowall/api/')
    .value('ROOT_FOLDER', '');
