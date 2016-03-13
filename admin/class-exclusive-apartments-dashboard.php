<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://samir.kahvedzic.deviantart.com
 * @since      1.0.0
 *
 * @package    Exclusive_Apartments
 * @subpackage Exclusive_Apartments/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Exclusive_Apartments
 * @subpackage Exclusive_Apartments/admin
 * @author     Samir Kahvedzic <akirapowered@gmail.com>
 */
class Exclusive_Apartments_Dashboard {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	// Dodaj widget sa upustvima za koristenje u dashboard
	public function add_apartmani_dashboard_widget() {

		wp_add_dashboard_widget(
	                 'apartmani-dashboard-widget',      	// Widget slug.
	                 'Exclusive Apartments',         		// Title.
	                 array($this, 'apartmani_widget') 	 	// Display function.
	        );
	}

	// Dodaj sadrzaj u widget sa upustvima za koristenje
	public function apartmani_widget() {

			$query = new WP_Query( array( 'post_type' => 'apartmani', 'post_status' => 'publish') );

			if ( $query->have_posts() ): ?>
				<ul>
					<?php while ( $query->have_posts() ):
						$query->the_post();

						$custom = get_post_custom($post->ID);
						$status = $custom['status'][0];
						$od = $custom['od'][0];
						$do = $custom['do'][0];
					?>

					<li id="<?php the_ID(); ?>" class="page-count lista">
						<span class="dashicons dashicons-admin-home <?php echo $status; ?>"></span>
						<a href="" class="apartman-link-dashboard"><?php echo the_title(); ?></a>
						<span class="update-message">
						</span>
						<div class="details-section">
							<?php if ( has_post_thumbnail() ):
								the_post_thumbnail( 'thumbnail' );
						 	endif; ?>

							<div class="dashboard-opcije">

							<select name="status" class="ulaz dashboard-status">

		                        <option value="slobodan" <?php selected( $status, 'slobodan'); ?>>
		                        	<?php echo __('Slobodan','exclusive-apartments-status-slobodan'); ?>
		                        </option>

								<option value="rezervisan" <?php selected( $status, 'rezervisan'); ?>>
		                        	<?php echo __('Rezervisan','exclusive-apartments-status-rezervisan'); ?>
		                        </option>

								<option value="iznajmljen" <?php selected( $status, 'iznajmljen'); ?>>
		                        	<?php echo __('Iznajmljen','exclusive-apartments-status-iznajmljen'); ?>
		                        </option>

		                    </select>

							<br>

							<div class="od-do-dashboard" <?php if($status == 'slobodan'){ echo 'style="display:none;"'; } ?>>

								<label for="od">
									<?php echo __('Od:','exclusive-apartments-od'); ?>
								</label>

								<input class="od" type="date" name="od" value="<?php echo $od; ?>">

								<label for="do">
									<?php echo __('Do:','exclusive-apartments-do'); ?>
								</label>

								<input class="do" type="date" name="do" value="<?php echo $do; ?>">

							</div>
					</div>

							<div class="clear"></div>
						</div>
					</li>

				<?php endwhile; ?>
				</ul>
			<?php endif; ?>

			<div class="controls">
				<a class="button button-primary" href="<?php echo get_admin_url(); ?>edit.php?post_type=apartmani">Prikaži Apartmane</a>
				<a class="button button-primary" href="<?php echo get_admin_url(); ?>post-new.php?post_type=apartmani">Dodaj Apartman</a>
			</div>

		<?php

	}

	public function apartmani_widget_ajax() {

		global $wpdb; // this is how you get access to the database

		if ($_POST['change_status'] == 'yes'){

			update_post_meta($_POST['apartman_id'], 'status', $_POST['apartman_status']);

			echo 'Status promjenjen u '. $_POST['apartman_status'];

		}

		if ($_POST['change_od'] == 'yes'){

			update_post_meta($_POST['apartman_id'], 'od', $_POST['apartman_od']);

			echo 'Apartman je '. $_POST['apartman_status'] . ' od ' . $_POST['apartman_od'];

		}

		if ($_POST['change_do'] == 'yes'){

			update_post_meta($_POST['apartman_id'], 'do', $_POST['apartman_do']);

			echo 'Apartman je '. $_POST['apartman_status'] . ' do ' . $_POST['apartman_do'];

		}

		die();

	}

}
