var app = angular.module("yakhub",[]);

app.factory("recordingsFactory", function($http){
	var params = {
	    Agent: agentname

	}
	return {
		getRecordings: function(data) {
			$http.post('getRecordings.php',params).success(data);
		}
	}
});

app.factory("numberFactory", function($http){
    return {
        getNumbers: function(data) {
            $http.post('endpoints/getNextNumber.php',{
				id: -1,
				number: -1,
				businessname: -1,
				agentname: agentname,
				clientname: clientname,
				pickedup: -1,
				interested: -1,
				appointment: -1,
				lead: -1,
				notes: -1
			}).success(data);
        }
    }
});


app.controller("RecordingsController", function($scope, $http, recordingsFactory){

	recordingsFactory.getRecordings(function(data){
        $scope.calls = data;
    });

});

app.controller("MainController", function($scope, $http, numberFactory, recordingsFactory){
	// $scope.showScript = true;
	// $scope.showReview = false;

	$scope.phone = "Click a phone number below!";
	$scope.numberid = -1;

	$scope.showPicked = true;
	$scope.showAppoint = false;
	$scope.showInter = false;
	$scope.showLead = false;

	$scope.businessname = "none";

	$scope.picked = "no";
	$scope.interested = "no";
	$scope.appointment = "no";
	$scope.lead = "no";
	$scope.notes = "";


	$scope.called = false;

	recordingsFactory.getRecordings(function(data){
        $scope.calls = data;
    });
	
    numberFactory.getNumbers(function(data){
        $scope.places = data;
    });

    $scope.inputNumber = function(phone,id,businessname){
		$scope.phone = phone;
		$scope.numberid = id;
		$scope.businessname = businessname;
		console.log($scope.numberid);
    };
    
    $scope.check = function(){
        console.log($scope.records);
    };


    //all the variables of the post data

    $scope.completeCall = function(){
    	if($scope.called == true){
    		var params = {
    			id:  $scope.numberid, 
    			number: $scope.phone,
    			businessname: $scope.businessname,
    			agentname: agentname,
    			clientname: clientname,
    			pickedup: $scope.picked,
    			interested: $scope.interested,
    			appointment: $scope.appointment,
    			lead: $scope.lead,
    			notes: $scope.notes
    		};
	    	$http({
	            method :'POST',
	            url:'endpoints/getNextNumber.php',
	            data: params,
	            headers: {'Content-Type': 'application/json'}
	        }).success(function (data, status, headers, config) {
	            console.log('status',status);
	            console.log('data',status);
	            console.log('headers',status);
	            $scope.places = data;
	        });
	       	console.log($scope.picked);
	       	$scope.picked = "no";
	       	$scope.interested = "no";
			$scope.appointment = "no";
			$scope.lead = "no";
	       	$scope.called = false;
	       	$scope.notes = "";
	   	}else{
	   		alert("You haven't called this number");
	   	}
    };

	$scope.call = function(){
	    params = {"PhoneNumber": $("#number").val(),
	                "OutgoingNumber": OutgoingNumber,
	                "Agent": Agent};
	    Twilio.Device.connect(params);

		// $scope.showScript = true;
		// $scope.showReview = false;
		$scope.called = true;
		$scope.canSubmit = true;
	};

	$scope.hangUp = function(){
		Twilio.Device.disconnectAll();
			
 //    	$scope.showScript = false;
	// 	$scope.showReview = true;
	};

	$scope.allPicked = function(){
		$scope.allNone();
		$scope.showPicked = true;
	};
	$scope.allInter = function(){
		$scope.allNone();
		$scope.showInter = true;
		console.log("Hello");
	};
	$scope.allAppoint = function(){
		$scope.allNone();
		$scope.showAppoint = true;
	};
	$scope.allLead = function(){
		$scope.allNone();
		$scope.showLead = true;
	};
	$scope.allNone = function(){
		$scope.showPicked = false;
		$scope.showAppoint = false;
		$scope.showInter = false;
		$scope.showLead = false;
	};

});

app.controller("AdminController", function($scope){ 

	$scope.makeAgent = true;
	$scope.allocateAgent = false
	$scope.deleteAgent = false;
	$scope.setUpTwilio = false;
	$scope.makeClient = false;
	$scope.deleteClient = false;

	$scope.makeAgentFunc = function(){
		$scope.setToFalse();
		$scope.makeAgent = true;
	};

	$scope.allocateAgentFunc = function(){
		$scope.setToFalse();	
		$scope.allocateAgent = true;	
	};

	$scope.deleteAgentFunc = function(){
		$scope.setToFalse();	
		$scope.deleteAgent = true;	
	};

	$scope.setUpTwilioFunc = function(){
		$scope.setToFalse();	
		$scope.setUpTwilio = true;	
	};

	$scope.makeClientFunc = function(){
		$scope.setToFalse();	
		$scope.makeClient = true;	
	};

	$scope.deleteClientFunc = function(){
		$scope.setToFalse();	
		$scope.deleteClient = true;	
	};


	$scope.setToFalse = function(){
		$scope.makeAgent = false;
		$scope.allocateAgent = false
		$scope.deleteAgent = false;
		$scope.setUpTwilio = false;
		$scope.makeClient = false;
		$scope.deleteClient = false;
	};

});