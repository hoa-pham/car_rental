//use to validation
var cardNumPassed = false; //use for cardNum
var passed =false; //use for all form
//showing the payment form
function formShow(){
	console.log($('.payment'));
	$('.addPayment').css('display','none');
	$('.payment').show(700);
}

$('#cardNum').change(function(){
	var cardNum = $('#cardNum').val();
	//get the first digit
	var firstDigit = cardNum.charAt(0);
	//get the first two digit
	var firstTwoDigit = cardNum.slice(0,2);
	if(firstDigit=='4' && cardNum.length ==16){
		//visa
		//do something here
		//console.log("visa");
		$('#visa').css('height','100%');
		$('#visa').css('width','100%');
		$('#master').css('height','40%');
		$('#master').css('width','40%');
		$('#am').css('height','40%');
		$('#am').css('width','40%');
		$('#cardNum').removeClass('is-invalid');
		$('#inputMessage').html("Valid Visa Card Number!");
		$('#inputMessage').css('color','green');
		cardNumPassed = true;
	} 
	else if(parseInt(firstTwoDigit)<56 && parseInt(firstTwoDigit) > 50 && cardNum.length ==16){
		//master card
		//do something here
		//console.log("Master Card");
		$('#visa').css('height','40%');
		$('#visa').css('width','40%');
		$('#master').css('height','100%');
		$('#master').css('width','100%');
		$('#am').css('height','40%');
		$('#am').css('width','40%');
		$('#cardNum').removeClass('is-invalid');
		$('#inputMessage').html("Valid Master Card Number!");
		$('#inputMessage').css('color','green');
		cardNumPassed = true;
	}
	else if(firstTwoDigit=='34'||firstTwoDigit=='37' ){
		//American Expression
		//do something here
		if(cardNum.length ==16){
			//console.log("American Expression");
			$('#visa').css('height','40%');
			$('#visa').css('width','40%');
			$('#master').css('height','40%');
			$('#master').css('width','40%');
			$('#am').css('height','100%');
			$('#am').css('width','100%');
			$('#cardNum').removeClass('is-invalid');
			$('#inputMessage').html("Valid American Expression Card Number!");
			$('#inputMessage').css('color','green');
			cardNumPassed = true;
		}
		else{
			//console.log("card is not valid!");
			$('#cardNum').addClass('is-invalid');
			$('#inputMessage').html("Invalid Card Number!");
			$('#inputMessage').css('color','red');
			cardNumPassed = false;
		}
		
	}
	else {
		//card is not valid
		//do something here
		console.log("card is not valid!");
		$('#cardNum').addClass('is-invalid');
		$('#inputMessage').html("Invalid Card Number!");
		$('#inputMessage').css('color','red');
		cardNumPassed = true;
	}


});

$('#form').change(function(){
	var name = $('#name').val();
	var exDate = $('#exDate').val();
	var sNum = $('#sNum').val();


	//checking validation form
	if(name.length>0){
		if(exDate!=null){
			if(sNum.length===4){
				passed=true;
			}	
			else {
				passed = false;
				console.log("sNum is not passed!");
			}
		}
		else{
			passed =false;
			console.log("exDate is not passed!");
		}
	}
	else{
		passed = false;
		console.log("name is not passed!");
	}

	//if form passed validation
	//then enable button
	if(passed===true){
		console.log("passed!")
		$('#checkCard').removeAttr("disabled");
	}
	
});

function verifyCard(){
	var cardNum = $('#cardNum').val();
	console.log(cardNum);

	var name = $('#name').val();
	console.log(name);

	var exDate = $('#exDate').val();
	console.log(exDate);

	var sNum = $('#sNum').val();
	console.log(sNum);
}

 // MasterCard  51-55 
 // Visa  4 
 // American Expression  34 or 37