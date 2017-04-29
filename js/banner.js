var bannerCount = 1;
var total = 3;

window.setInterval(function banner() {
	
	var image = document.getElementById('banner');
	
	if(bannerCount > total){
		bannerCount = 1;
		}
			
	image.src = "banner"+ bannerCount +".jpg";
	
	bannerCount = bannerCount + 1;
	
	},3000);