'use strict';

/* Controllers */

angular.module('myApp.controllers', [])
  .controller('MyCtrl1', ["$scope", "College", "DeleteCollege", "AddCollege", function($scope, College, DeleteCollege, AddCollege) {
	$scope.name = "Vaishali";
	$scope.collegedata = [];
	
	$scope.getCollegeData = function() {
		$scope.collegedata = [];
		College.query(function(data) {
			//alert(data);
			console.log(data);
			for(var i =0; i< data.length; i++) {
				$scope.collegedata.push(data[i]);
			}
		});
	};
	$scope.getCollegeData();
	
	$scope.updateCollegeInfo = function($id) {
		alert($id);
		alert("User updated successfully");
	}
	$scope.deleteCollegeInfo = function(id) {
		var data = {};
		data.id = id;
		
		DeleteCollege(data, $scope.getCollegeData);
		//$scope.getCollegeData();		
	}
	$scope.pushCollegeInfo = function(college) {
		var name = $scope.college.name;
//		alert(name);
		var address = $scope.college.address;
//		alert(address);
		AddCollege(college, $scope.getCollegeData);
	}
	$scope.getCollegeInfo = function() {
		alert($scope.collegeId);
	}
	
}
	
  ])
  .controller('MyCtrl2', [function() {
		
  }]);

  