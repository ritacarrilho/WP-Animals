( function( api ) {

	// Extends our custom "petlife-lite" section.
	api.sectionConstructor['petlife-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );