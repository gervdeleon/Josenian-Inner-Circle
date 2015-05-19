function confirmQuestion(){
	var question = document.forms['questionForm']['question'].value;
	if (question != null || question != "") {
		var confirm = window.confirm("Are you sure with your question?");
		if (confirm == true) {
			return true;
		} else {
			return false;
		}
	} 
}

function confirmEvent(){
	var deptEvent = document.forms['eventForm']['eventName'].value;
	if (deptEvent != null || deptEvent != "") {
		var confirm = window.confirm("Are you sure with your event?");
		if (confirm == true) {
			return true;
		} else {
			return false;
		};
	};
}

function confirmPostAnnouncement(){
	var announcement = document.forms['announcementForm']['announcementName'].value;
	if (announcement != null || announcement != "") {
		var confirm = window.confirm("Are you sure with your announcement?");
		if (confirm == true) {
			return true;
		} else {
			return false;
		};
	};
}



function confirmShareQuestion(){
	var share = document.forms['shareQuestionForm']['shareQuestionBtn'].value;
	if (share != null || share !="") {
		var confirm = window.confirm("Share it to your wall?");
		if (confirm == true) {
			return true;
		} else {
			return false;
		};
	};
}

function confirmShareEvent(){
	var share = document.forms['shareForm']['eventBtn'].value;
	if (share != null || share !="") {
		var confirm = window.confirm("Share it to your wall?");
		if (confirm == true) {
			return true;
		} else {
			return false;
		};
	};
}

function confirmAnnouncement(){
	var share = document.forms['shareAnnouncementForm']['announcementBtn'].value;
	if (share != null || share !="") {
		var confirm = window.confirm("Share it to your wall?");
		if (confirm == true) {
			return true;
		} else {
			return false;
		};
	};
}