( function( api ) {

	// Extends our custom "gadget-store" section.
	api.sectionConstructor['gadget-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );