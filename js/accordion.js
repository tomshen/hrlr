/**
 * File accordion.js.
 *
 * Allows certain divs to be transformed into accordions
 */
( function() {

	setTimeout(function(){
		const buttons = document.querySelectorAll('.is-accordion');

		[].forEach.call(buttons, function(button) {
		  button.addEventListener('click', function() {

		    button.classList.toggle('is-closed');
		  });
		});
	}, 1000);

} )();
