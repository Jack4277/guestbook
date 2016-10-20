
@extends('layouts.layout')
@section('content')
    <div class="row" ng-app="authors"  ng-controller="authorsCtrl">
        <h3>Authors</h3>
            <div class="col-md-5">
                <form action="" name="newAuthorForm" class="form-group form-inline" novalidate>

                    <input type="text" id="newAuthor" class="form-control" ng-model="authorObj.name" required name="name">
                    <button type="button" class="btn btn-default addAuthor form-control" ng-click="addNewAuthor()" ng-disabled="newAuthorForm.name.$error.required">Add new Author</button>
                    <br>
                    <p class="alert alert-danger" ng-show="newAuthorForm.name.$error.required">Input name</p>
                </form>
            </div>

        <br><br>
        <br>
            <div class="page-header"></div>
        {{--<button class="btn btn-default getList">Get Authors</button>--}}
        {{--<br>--}}
        {{--<br>--}}
        {{--<ul class="authorsList">--}}

        {{--</ul>--}}

 {{----------------angular-------------------}}
        <input type="text" class="form-control" ng-model="search">
        <br>
        <div class="row">
            <ul>
                <li ng-repeat="author in authors | orderBy:'-name' | filter:search">
                    [[ author.name ]]
                </li>
            </ul>
        </div>


    </div>
@endsection