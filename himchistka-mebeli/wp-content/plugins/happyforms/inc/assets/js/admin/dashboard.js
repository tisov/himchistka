( function( $ ) {

	var happyForms = window.happyForms || {};
	window.happyForms = happyForms;

	happyForms.freeDashboard = {
		init: function() {
			$( document ).on( 'click', '#adminmenu #toplevel_page_happyforms li:last-child a', this.handleUpgradeClick.bind(this) );
		},

		handleUpgradeClick: function( e ) {
			e.preventDefault();

			var $link = $(e.target);

			window.open( $link.attr('href') );
		}
	};

	$( document ).ready( function() {
		happyForms.freeDashboard.init();
	} );

} )( jQuery );