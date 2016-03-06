(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


	$(document).ready(function(){


		/**
		 * Djeluje na promjenu statusa kod uredjivanja apartmana
		 * ukoliko status apartmana nije slobodan pokazuje polja za unos datuma
		 */
		$('#status').change(function() {

			var status =  $(this).val();

			if(status != 'slobodan') {
				$('#raspon').fadeIn('slow');
			} else {
				$('#raspon').fadeOut();
			}

		});

		/**
		 * Na klik otkriva skrivene detalje i postavke u dashboardu
		 */
		$('.apartman-link-dashboard').click(function(e) {

			$(this).closest('li').find('.details-section').slideToggle('slow');
			e.preventDefault();

		});


		/**
		 * Djeluje na promjenu statusa na dashboardu
		 * ukoliko status apartmana nije slobodan pokazuje polja za unos datuma
		 * mijenja boju ikonice zavisno od statusa apartmana
		 * automatski sacuva promjenu statusa u bazu
		 */
		$('.dashboard-status').change(function() {

			var statusSelect = $(this);
			var status =  statusSelect.val();
			var postId = statusSelect.closest('li').attr('id');
			var statusIcon = statusSelect.closest('li').find('.dashicons');

			if (!(statusIcon.hasClass(status))) {

				if(statusIcon.hasClass('slobodan')) {
					statusIcon.removeClass('slobodan');
					statusIcon.addClass(status);
				}

				if(statusIcon.hasClass('rezervisan')) {
					statusIcon.removeClass('rezervisan');
					statusIcon.addClass(status);
				}

				if(statusIcon.hasClass('iznajmljen')) {
					statusIcon.removeClass('iznajmljen');
					statusIcon.addClass(status);
				}

			}

			var data = {
				action: 'update_apartments',
				change_status: 'yes',
				apartman_id: postId,
				apartman_status: status
			};

			$.post(ajaxurl, data, function(response) {

				statusSelect.closest('li').find('.update-message').empty();
				statusSelect.closest('li').find('.update-message').append(response).show().delay(3000).fadeOut();

			 });

			if(status != 'slobodan') {
				statusSelect.closest('div').find('.od-do-dashboard').fadeIn();
			} else {
				statusSelect.closest('div').find('.od-do-dashboard').fadeOut();
			}

		});


		/**
		 * Djeluje na promjenu datuma na dashboardu
		 * automatski sacuva promjenu datuma u bazu
		 */
		$('.od').change(function() {

			var odInput = $(this);
			var od = odInput.val();
			var postId = odInput.closest('li').attr('id');
			var status = odInput.closest('li').find('.dashboard-status').val();

			var data = {
				action: 'update_apartments',
				change_od: 'yes',
				apartman_id: postId,
				apartman_status: status,
				apartman_od: od
			};

			$.post(ajaxurl, data, function(response) {

				odInput.closest('li').find('.update-message').empty();
				odInput.closest('li').find('.update-message').append(response).show().delay(3000).fadeOut();

			 });

		});

		$('.do').change(function() {

			var doInput = $(this);
			var doVal = doInput.val();
			var postId = doInput.closest('li').attr('id');
			var status = doInput.closest('li').find('.dashboard-status').val();

			var data = {
				action: 'update_apartments',
				change_do: 'yes',
				apartman_id: postId,
				apartman_status: status,
				apartman_do: doVal
			};

			$.post(ajaxurl, data, function(response) {

				doInput.closest('li').find('.update-message').empty();
				doInput.closest('li').find('.update-message').append(response).show().delay(3000).fadeOut();

			 });

		});

	});

})( jQuery );
