var vinArr=[];
var userId;
$('.add_to_cart').each(function (index){
	//console.log( $($('.add_to_cart')[index]).attr("value"));
	$($('.add_to_cart')[index]).click(function (){
		//alert($($('.add_to_cart')[index]).attr("value"));
		vinArr.push($($('.add_to_cart')[index]).attr("value"));
		console.log(vinArr);
	});
});

$('.checkOut').click(function(e){
	e.preventDefault();

	 $.ajax({
        type: 'get',
        url: 'checkOut.php',
        dataType: "text",
        headers: {'vinNum':vinArr.toString()},
        contentType: 'application/json',
        data:vinArr,
        success: function(data, textStatus, jqXHR)
        {
            console.log("passing success!");
            window.location.href = 'checkOut.php?vinNum='+vinArr;
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('login error:'+errorThrown + textStatus);
        }
    });
});

