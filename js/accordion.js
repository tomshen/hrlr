/**
 * File accordion.js.
 *
 * Allows certain divs to be transformed into accordions
 */
( function() {

	setTimeout(function(){
		console.log("hello world");
		const buttons = document.querySelectorAll('.is-accordion');

		console.log(buttons);
		[].forEach.call(buttons, function(button) {
			console.log(button);
		  button.addEventListener('click', function() {

				console.log(button);
				console.log("button clicked");
		    button.classList.toggle('is-closed');
		  });
		});
	}, 1000);

} )();
