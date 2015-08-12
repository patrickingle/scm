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
