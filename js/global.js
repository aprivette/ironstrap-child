(function() {
	// Sets cookie with device pixel ratio
	if (window.devicePixelRatio >= 2) {
		images = document.getElementsByClassName('retina-image');
		if(images.length > 0) {
			for (var i = 0; i < images.length; i++) {
			    images[i].style.backgroundImage = 'url(' + images[i].dataset.retinaImage + ')';
			}
		}
	}
})();
