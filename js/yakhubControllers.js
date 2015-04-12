var yakhubControllers = angular.module('yakhubControllers',[])

yakhubControllers.controller('authCtrl',['$scope','$sessionStorage','$location','$http',function(scope,session,location,http){
	scope.login = function(){
		http({
			method: 'POST',
			url: 'endpoints/login.php',
			data: {username: scope.username, password: scope.password},
			cache: true
		}).success(function(data){
			console.log(data);
			if(data.username != -1){
				session.username = data.username;
				session.clientname = data.clientname;
				location.path('/profile');
			}else{
				alert("Wrong username/password");
				scope.username = "";
				scope.password = "";
			}
		});
	};
}]);

yakhubControllers.controller('profileCtrl',['$scope','$sessionStorage','$location','phoneFactory',function(scope,session,location,phone){

	scope.log='Setting up...';

	var phoneSetup = function(){
		phone.twilioSetup({
			username:session.username
		}, function(data){
			console.log("Hello2");
			if(data.token){
				scope.setup = true;
				scope.outgoingNumber = data.outgoingNumber;
				Twilio.Device.setup(data.token);

				phone.getNextNumber({
					username: session.username,
					clientname: "Dobeo",
					number: -1
				}, function(numbers){
					console.log("Hello3");
					console.log(numbers);
			        scope.numbers = numbers;
			    });
			}else{
				scope.setup = false;
			}
		})
	};

	scope.init = function(){
		console.log("Hello");
		phoneSetup();
	};

	scope.init();

	scope.logout = function(){
		session.username = null;
		session.clientname = null;
		scope.hangup();
		location.path('login');
	}

	scope.called = false;

	//initializing the viewed 
	scope.showScript = true;

	//initializing the phone number
	scope.phoneNumber = "Click a phone number below!";

	//initializing the radio buttons
	scope.picked = "no";
	scope.interested = "no";
	scope.appointment = "no";
	scope.lead = "no";

	//Twilio javascript
    Twilio.Device.ready(function (device) {
        scope.log = "Ready";
        console.log(scope.log);
        scope.$apply();
    });
 
    Twilio.Device.error(function (error) {
    	scope.log = "Error: " + error.message;
        scope.$apply();
    });
 
    Twilio.Device.connect(function (conn) {
    	scope.log = "Successfully established call";
    	scope.$apply();
    });
 
    Twilio.Device.disconnect(function (conn) {
        scope.log = "Call ended";
        scope.$apply();
    });
 
    Twilio.Device.incoming(function (conn) {
    	scope.log("Incoming connection from " + conn.parameters.From);
    	scope.$apply();
        // accept the incoming connection and start two-way audio
        conn.accept();
    });
 
 	//making the phone call
    scope.call = function(){
        // get the phone number to connect the call to
        params = {"PhoneNumber": scope.phoneNumber,
                "OutgoingNumber": scope.outgoingNumber,
                "Agent": session.username,
                "Client": session.clientname};
        Twilio.Device.connect(params);

        scope.called = true;
		scope.canSubmit = true;
    }
 	
 	//hanging up that phone call
    scope.hangup = function() {
        Twilio.Device.disconnectAll();
    }


    //seetting up the screen functions
    scope.clearScreenFunc = function(){
		scope.showScript = false;
		scope.showScriptNotes = false;
		scope.showStats = false;
		scope.showAppointments = false;
	}

    scope.showStatsFunc = function(){
		scope.clearScreenFunc();
		scope.showStats = true;
		console.log("Stats" + scope.showStats);
	};

	scope.showScriptNotesFunc = function(){
		scope.clearScreenFunc();
		scope.showScriptNotes = true;
		console.log("Notes");
	};

	scope.showScriptFunc = function(){
		scope.clearScreenFunc();
		scope.showScript = true;
		console.log("Script");
	};

	scope.showAppointmentsFunc = function(){
		scope.clearScreenFunc();
		scope.showAppointments = true;
		console.log("Appointment");
	};

	//new business input
	scope.inputNumber = function(phoneNumber,businessname,address){
		scope.phoneNumber = phoneNumber;
		scope.businessname = businessname;
		scope.address = address;
    };

    //function for saving the script notes
    scope.saveScriptNotes = function(){
    	var params = {
    		scriptNotes: scope.scriptNotes,
    		agentname: session.username,
    		clientname: session.clientname
    	};

    	http({
	            method :'POST',
	            url:'endpoints/saveScriptNotes.php',
	            data: params,
	            headers: {'Content-Type': 'application/json'}
	        }).success(function (data, status, headers, config) {
	            console.log('status',status);
	            console.log('data',status);
	            console.log('headers',status);
	        });
    }

    scope.completeCall = function(){
    	if(scope.called == true){
    		var params = {
    			number: scope.phone,
    			businessname: scope.businessname,
    			agentname: session.username,
    			clientname: session.clientname,
    			pickedup: scope.picked,
    			interested: scope.interested,
    			appointment: scope.appointment,
    			lead: scope.lead,
    			notes: scope.notes,
    			address: scope.address
    		};

    		phone.getNextNumber(params,function(numbers){
    			scope.numbers = numbers;
    			console.log(numbers);
    		});


    		//here i want to make a http request
    		//to get the agent data
    		//agentData.getAgentData(function(data){
    			//scope.agentData = data;
    		//})

	       	scope.picked = "no";
	       	scope.interested = "no";
			scope.appointment = "no";
			scope.lead = "no";
	       	scope.called = false;
	       	scope.notes = "";
	   	}else{
	   		alert("You haven't called this number");
	   	}
    };

}]);