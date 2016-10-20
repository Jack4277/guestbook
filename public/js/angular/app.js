var guestBook = angular.module('authors',[
    'ngRoute'
]);

guestBook.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});