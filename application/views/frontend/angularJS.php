<!DOCTYPE html>
<html ng-app="testApp">
<head>
	 <title>TO DO List</title>
	 <link href="<?=base_url('assets/angular.js/css/bootstrap.css')?>" rel="stylesheet" />
	 <link href="<?=base_url('assets/angular.js/css/bootstrap-theme.css')?>" rel="stylesheet" />
	 <script src="<?=base_url('assets/angular.js/js/angular.js')?>"></script>
</head>

<body ng-controller="ToDoCtrl">
 <div class="page-header">
 <h1>
 {{todo.user}}'s To Do List
<span class="label label-default" ng-class="warningLevel()"
 ng-hide="incompleteCount() == 0">
 {{incompleteCount()}}
 </span>
 </h1>
 </div>
 <div class="panel">
 <div class="input-group">
 <input class="form-control" ng-model="actiontext"/>
 <span class="input-group-btn">
 <button class="btn btn-default" ng-click="addNew(actiontext)">Add</button>
 </span>
 </div>
 <table class="table table-striped">
 <thead>
 <tr>
 <th>Description</th>
 <th>Done</th>
 </tr>
 </thead>
 <tbody>
<tr ng-repeat="item in todo.items | checkedItems:showComplete | orderBy:'action'">
 <td>{{item.action}}</td>
 <td><input type="checkbox" ng-model="item.done" /></td>
 <td>{{item.done}}</td>

 </tr>
 </tbody>
 </table>
 <div class="checkbox-inline">
 <label><input type="checkbox" ng-model="showComplete"> Show Complete</label>
 </div>

 <p>{{todo}}</p>

 </div>
</body>

</html>

<script>
var model = {
	 user: "Jw",
};

var app = angular.module("testApp", []);


app.run(function ($http) {
 	$http.get("http://blog.local/cn/todoJson").then(function (data) {
 		//console.log(data);
 		model.items = data.data;
 	});

 	
});

app.filter("checkedItems", function () {
	 return function (items, showComplete) {
		 var resultArr = [];

		 angular.forEach(items, function (item) {
			 if (item.done == false || showComplete == true) {
			 	resultArr.push(item);
			 }
		 });

		 return resultArr;
	 }
 });

 app.controller("ToDoCtrl", function ($scope) {

 	$scope.actiontext = 'a';

 	$scope.todo = model;

 	$scope.addNew = function(actiontext){
 		var newData = { action: actiontext, done: false };
 		model.items.push(newData);
 	}

 	$scope.incompleteCount = function () {
	 var count = 0;
	 angular.forEach($scope.todo.items, function (item) {
	 if (!item.done) { count++ }
	 });
	 return count;
	 }

	 $scope.warningLevel = function () {
	 return $scope.incompleteCount() < 3 ? "label-success" : "label-warning";
	 }

 });
</script>