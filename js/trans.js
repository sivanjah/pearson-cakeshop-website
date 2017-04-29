var imageCount = 1;
var total = 5;

window.setInterval(function photoA() {
	
	var image = document.getElementById('image');
	
	if(imageCount > total){
		imageCount = 1;
	}
		image.src = "/pearson/images/transition_image/image"+ imageCount +".jpg";
	
		imageCount = imageCount + 1;
	
	},3000);