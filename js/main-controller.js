app.controller("MainController",["$scope",function($scope){

	$scope.test = 'hello';
	$scope.search = "";

	$scope.numbers = ["1234","2357","4321"];	

	function ViewController(){

		this.showScript = true;
		this.showReview = false;

		this.call = function(){
	        params = {"PhoneNumber": $("#number").val(),
	                "OutgoingNumber": OutgoingNumber,
	                "Agent": Agent};
	        Twilio.Device.connect(params);

			this.showScript = true;
			this.showReview = false;
		};

		this.hangUp = function(){
			Twilio.Device.disconnectAll();
			alert("hang up");
			
			this.showScript = false;
			this.showReview = true;
		};

		this.showFormFunc = function(){
			this.showScript = false;
			this.showReview = true;
		};

		this.showScriptFunc = function(){
			this.showScript = true;
			this.showReview = false;
		};
	}

	function AdminController(){
		this.makeAgent = true;
		this.allocateAgent = false
		this.deleteAgent = false;
		this.setUpTwilio = false;
		this.makeClient = false;
		this.deleteClient = false;

		this.makeAgentFunc = function(){
			this.setToFalse();
			this.makeAgent = true;
		};

		this.allocateAgentFunc = function(){
			this.setToFalse();	
			this.allocateAgent = true;		
		};

		this.deleteAgentFunc = function(){
			this.setToFalse();		
			this.deleteAgent = true;	
		};

		this.setUpTwilioFunc = function(){
			this.setToFalse();		
			this.setUpTwilio = true;	
		};

		this.makeClientFunc = function(){
			this.setToFalse();		
			this.makeClient = true;	
		};

		this.deleteClientFunc = function(){
			this.setToFalse();		
			this.deleteClient = true;	
		};


		this.setToFalse = function(){
			this.makeAgent = false;
			this.allocateAgent = false
			this.deleteAgent = false;
			this.setUpTwilio = false;
			this.makeClient = false;
			this.deleteClient = false;
		};

	}

	$scope.viewController = new ViewController();
	$scope.adminController = new AdminController();

}]);