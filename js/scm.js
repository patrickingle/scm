// Use the following three variables to set up the message:
var msg = "This Software is Designed By Lalit Chandnani(Administrator & Frontend Designer), Deepak Agnihotri(Analysis & Connectivity), Rahul Sharma(Database Designer) Student of CSE VIsem,OIST Bpl"
var delay = 100
var startPos = 127

// Don't touch these variables:
var timerID = null
var timerRunning = false
var pos = 0

// Crank it up!
StartScrolling()

function StartScrolling(){
    // Make sure the clock is stopped
    StopTheClock()

    // Pad the message with spaces to get the "start" position
    for (var i = 0; i < startPos; i++) msg = " " + msg

    // Off we go...
    DoTheScroll()
}

function StopTheClock(){
    if(timerRunning)
        clearTimeout(timerID)
    timerRunning = false
}

function DoTheScroll(){
    if (pos < msg.length)
        self.status = msg.substring(pos, msg.length);
    else
        pos=-1;
    ++pos
    timerRunning = true
    timerID = self.setTimeout("DoTheScroll()", delay)
}

// jQuery Main ready function
jQuery(function ($){
	
	function ajaxCall(url, action, data) {
		$.ajax({
			url: url,
			method: 'POST',
			data: data
		}).done(function(results){
			route(action, results);
		});
	}
	
	function route(action, results) {
		switch (action) {
			case 'login':
				login(results);
				break;
			default:
		}
	}
	
	
	$('#login').submit(function(event){
		event.preventDefault();
		var data = {
				action: 'login',
				username: $('#username').val(),
				password: $('#password').val()
			};
			
		//ajaxCall('http://localhost/scm-server/server.php','login',data);
		$.ajax({
			url: 'http://localhost/scm-server/server.php',
			method: 'POST',
			data: data
		}).done(function(results){
			route(action, results);
		});
	});
	
	$('#itemid').change(function(){
		var m_names = new Array("Jan", "Feb", "Mar", 
		"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
		"Oct", "Nov", "Dec");

		var today = new Date();
		var curr_date = today.getDate();
		var curr_month = today.getMonth() + 1;
		var curr_year = today.getFullYear();
		
		$('#itemname').val($('#itemid option:selected').text());
		$('#odate').val(curr_year + "-" + curr_month + "-" + curr_date);
		$('#rdate').val(curr_year + "-" + curr_month + "-" + curr_date);
		
		var delivery = new Date();
		delivery.setDate(delivery.getDate() + 10); 
		var del_date = delivery.getDate();
		var del_month = delivery.getMonth() + 1;
		var del_year = delivery.getFullYear();
		$('#ddate').val(del_year + "-" + del_month + "-" + del_date);
				
		var data = {
				action: 'getitem',
				id: $(this).val()
			};
		$.ajax({
			url: 'http://localhost/scm-server/server.php',
			method: 'POST',
			data: data
		}).done(function(results){
			var item = $.parseJSON(results);
			$('#qoi').val(item.quantity);
			$('#ppu').val(item.sellingprice);
			console.log(item);
		});
	});
	
	$('#ordid').change(function(){
		var data = {
				action: 'getsalesbyid',
				id: $(this).val()
			};
		$.ajax({
			url: 'http://localhost/scm-server/server.php',
			method: 'POST',
			data: data
		}).done(function(results){
			var sales = $.parseJSON(results);
			console.log(sales);
			
			var today = Date.today();
			var retDate = new Date(sales.returningdate);
			
			
			var diff = Date.compare(today, retDate);
			if (diff == 1) {
				$('#returnable').hide();
				$('#noreturn').show();
			} else {
				$('#noreturn').hide();
				$('#returnable').show();
			}
			
		});
		
	});
	
	function login(results) {
		
		if (results == '1') {
			$('#nav').show();
			window.location = 'index.php';
		} else {
			window.location = 'index.php?username=&password=';
			$('#login-failed').show();
		}
	}
});
