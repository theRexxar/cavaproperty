// It may already be defined in _script.php partial
if (typeof(admin) == 'undefined') {
	var admin = {};
}

jQuery(function($) {

	// Used by Pages and Navigation.
	// Module must load jquery/jquery.ui.nestedSortable.js and jquery/jquery.cooki.js
	admin.sort_tree = function($item_list, $url, $cookie, data_callback, post_sort_callback)
	{
		// collapse all ordered lists but the top level
		$item_list.find('ul').children().hide();

		// this gets ran again after drop
		var refresh_tree = function() {

			// add the minus icon to all parent items that now have visible children
			$item_list.parent().find('ul li:has(li:visible)').removeClass().addClass('minus');

			// add the plus icon to all parent items with hidden children
			$item_list.parent().find('ul li:has(li:hidden)').removeClass().addClass('plus');

			// remove the class if the child was removed
			$item_list.parent().find('ul li:not(:has(ul))').removeClass();

			// call the post sort callback
			post_sort_callback && post_sort_callback();
		}
		refresh_tree();

		// set the icons properly on parents restored from cookie
		$($.cookie($cookie)).has('ul').toggleClass('minus plus');

		// show the parents that were open on last visit
		$($.cookie($cookie)).children('ul').children().show();

		// show/hide the children when clicking on an <li>
		$item_list.find('li').live('click', function()
		{
			$(this).children('ul').children().slideToggle('fast');

			$(this).has('ul').toggleClass('minus plus');

			var items = [];

			// get all of the open parents
			$item_list.find('li.minus:visible').each(function(){ items.push('#' + this.id) });

			// save open parents in the cookie
			$.cookie($cookie, items.join(', '), { expires: 1 });

			 return false;
		});

		$item_list.nestedSortable({
			delay: 100,
			disableNesting: 'no-nest',
			forcePlaceholderSize: true,
			handle: 'div',
			helper:	'clone',
			items: 'li',
			opacity: .4,
			placeholder: 'placeholder',
			tabSize: 25,
			listType: 'ul',
			tolerance: 'pointer',
			toleranceElement: '> div',
			stop: function(event, ui) {

				post = {};
				// create the array using the toHierarchy method
				post.order = $item_list.nestedSortable('toHierarchy');

				// pass to third-party devs and let them return data to send along
				if (data_callback) {
					post.data = data_callback(event, ui);
				}

				// refresh the tree icons - needs a timeout to allow nestedSort
				// to remove unused elements before we check for their existence
				setTimeout(refresh_tree, 5);

				$.post($url, post );
			}
		});
	}
	// --- end admin.sort_tree
		
	admin.chosen = function()
	{
		// Chosen
		$('select').livequery(function(){
			$(this).addClass('chzn');
			$(".chzn").chosen();

			// This is a workaround for Chosen's visibility bug. In short if a select
			// is inside a hidden element Chosen sets the width to 0. This iterates through
			// the 0 width selects and sets a fixed width.
			$('.chzn-container').each(function(i, ele){
				if ($(ele).width() == 0) {
					$(ele).css('width', '236px');
					$(ele).find('.chzn-drop').css('width', '234px');
					$(ele).find('.chzn-search input').css('width', '200px');
					$(ele).find('.search-field input').css('width', '225px');
				}
			});
		});
	}
	// --- end admin.chosen
	
	// Create a clean slug from whatever garbage is in the title field
	admin.generate_slug = function(input_form, output_form)
	{
		var slug, value;

		$(input_form).live('keyup', function(){
			value = $(input_form).val();

			if ( ! value.length ) return;

			var rx = /[a-z]|[A-Z]|[0-9]|[áàâa?cc??ddéèêëee???íîï???l??ñnnóôó?úùûuršst??ý?žzz?äæœ?öøü??ßå???]/,
				value = value.toLowerCase(),
				chars = admin.foreign_characters,
				search, replace;

			// If already a slug then no need to process any further
				if (!rx.test(value)) {
						slug = value;
				} else {
						value = $.trim(value);

						for (var i = chars.length - 1; i >= 0; i--) {
							// Remove backslash from string
							search = chars[i].search.replace(new RegExp('/', 'g'), '');
							replace = chars[i].replace;

							// create regex from string and replace with normal string
							value = value.replace(new RegExp(search, 'g'), replace);
						};

						slug = value.replace(/[^-a-z0-9~\s\.:;+=\-]/g, '-')
									.replace(/[\s\.:;=+]+/g, '-')
									.replace(/[-]+/g, '-');
				}

			$(output_form).val(slug);
		});
	}
	// --- end admin.generate_slug
	
	// admin.insertFile
	admin.insertFile = function(image, attr, target, callback)
	{
		callback(image, attr, target);
	}
	// --- end admin.insertFile
	
});