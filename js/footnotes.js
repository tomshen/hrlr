/**
 * File footnotes.js.
 *
 * Makes footnotes on articles injested using the Mammoth document importer functional, and adds a preview to the right column
 */
( function() {

	setTimeout(function(){
		var count = 1;
		var articleID = document.querySelectorAll('article')[0].id
		var footnoteContainer = document.querySelectorAll('ol:last-of-type')[0]

		while(true) {
			var footnoteBackToTop = document.querySelectorAll("#" + articleID + '-footnote-ref-' + count);
			if(footnoteBackToTop.length === 0) {
				break;
			}
			var footnote = document.querySelectorAll('ol:last-of-type li:nth-of-type(' + count + ')')[0]
			footnote.id = articleID + '-footnote-' + count;
			count++
		}

	}, 1000);

} )();
