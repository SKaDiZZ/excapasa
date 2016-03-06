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
class Exclusive_Apartments_Admin {

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

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Exclusive_Apartments_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Exclusive_Apartments_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/exclusive-apartments-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Exclusive_Apartments_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Exclusive_Apartments_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/exclusive-apartments-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register Apartmani CUSTOM_POST_TYPE
	 *
	 * @see https://codex.wordpress.org/Function_Reference/register_post_type
	 * @uses register_post_type( $post_type, $args );
	 *
	 * @method void apartmani_init()
	 * @access public
	 * @var $labels || array
	 * @var $args || array
	 */
	 public function apartmani_init() {

	    $labels = array(
	        'name'                  => _x( 'Apartmani', 'Post type general name', 'exclusive-apartments-post-type' ),
	        'singular_name'         => _x( 'Apartman', 'Post type singular name', 'exclusive-apartments-singular' ),
	        'menu_name'             => _x( 'Apartmani', 'Admin Menu text', 'exclusive-apartments-admin-menu' ),
	        'name_admin_bar'        => _x( 'Apartman', 'Add New on Toolbar', 'exclusive-apartments-toolbar-add' ),
	        'add_new'               => __( 'Dodaj novi', 'exclusive-apartments-dodaj-novi' ),
	        'add_new_item'          => __( 'Dodaj novi apartman', 'exclusive-apartments-dodaj-novi' ),
	        'new_item'              => __( 'Novi apartman', 'exclusive-apartments-novi' ),
	        'edit_item'             => __( 'Uredi apartman', 'exclusive-apartments-uredi' ),
	        'view_item'             => __( 'Prikazi apartman', 'exclusive-apartments-prikazi' ),
	        'all_items'             => __( 'Izlistaj apartmane', 'exclusive-apartments-izlistaj' ),
	        'search_items'          => __( 'Pretrazi apartmane', 'exclusive-apartments-pretrazi' ),
	        'parent_item_colon'     => __( 'Glavna apartman:', 'exclusive-apartments-glavni' ),
	        'not_found'             => __( 'Trenutno nema apartmana.', 'exclusive-apartments-nema' ),
	        'not_found_in_trash'    => __( 'Nema apartmana u kanti za smece.', 'exclusive-apartments-kanta-prazna' ),
	        'featured_image'        => _x( 'Slika apartmana', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'exclusive-apartments-slika-glavna' ),
	        'set_featured_image'    => _x( 'Postavi sliku apartmana', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'exclusive-apartments-postavi-sliku' ),
	        'remove_featured_image' => _x( 'Ukloni sliku apartmana', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'exclusive-apartments-ukloni-sliku' ),
	        'use_featured_image'    => _x( 'Koristi kao sliku apartmana', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'exclusive-apartments-koristi-kao-sliku' ),
	        'archives'              => _x( 'Arhiva apartmana', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'exclusive-apartments-arhiva' ),
	        'insert_into_item'      => _x( 'Dodaj u apartman', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'exclusive-apartments-dodaj-u' ),
	        'uploaded_to_this_item' => _x( 'Uploadovano u ovaj apartman', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'exclusive-apartments-dodano-u' ),
	        'filter_items_list'     => _x( 'Filtriraj listu apartmana', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'exclusive-apartments-filtriraj' ),
	        'items_list_navigation' => _x( 'Navigacija u listi apartmana', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'exclusive-apartments-lista-navigacija' ),
	        'items_list'            => _x( 'Lista apartmana', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'exclusive-apartments-nekretnina-lista' ),
	    );

	    $args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'taxonomies'			=> array('post_tag'),
			'publicly_queryable' 	=> true,
			'show_ui'            	=> true,
			'show_in_menu'       	=> true,
			'menu_icon'          	=> 'dashicons-admin-home',
			'query_var'          	=> true,
			'rewrite'            	=> array( 'slug' => 'apartman' ),
			'capability_type'    	=> 'post',
			'has_archive'        	=> true,
			'hierarchical'       	=> false,
			'menu_position'      	=> null,
			'show_in_rest'       	=> true,
			'rest_base'          	=> 'exclusive-apartments-api',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'           	=> array( 'title', 'editor', 'thumbnail'),
	    );

    	register_post_type( 'apartmani', $args );
	}

	/**
 * Dodaj dodatne detalje o apartmanu
 *
 * @see https://developer.wordpress.org/reference/functions/add_meta_box/
 * @uses add_meta_box ( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null );
 * @method void dodaj_podatke_o_apartmanu();
 * @access public
 */
public function dodaj_podatke_o_apartmanu() {

	add_meta_box(
		'podaci_o_nekretnini',
		__('Podaci o apartmanu','exclusive-apartments-podaci-o-apartmanu-title'),
		array($this, 'podaci_o_apartmanu'),
					'apartmani',
					'normal',
					'high'
				);

}

/**
 * Dodaj dodatna polja za unos podataka o nekretnini
 *
 * @see https://codex.wordpress.org/Function_Reference/get_post_custom
 * @uses get_post_custom();
 *
 * @method void podaci_o_apartmanu()
 * @access public
 * @global $post
 * @var $slajder || boolean [true, false] Prikazi nekretninu u slajderu default=false
 * @var $status  || string [slobodan, rezervisan, iznajmljen]
 * @var $od		|| date
 * @var $do		|| date
 * @var $cijena  || number Cijena nekretnine default 0.00 (ako je cijena 0.00 onda je tumaci kao po dogovoru)
 * @var $grad    || string Lokacija nekretnine grad
 * @var $adresa  || string Adresa nekretnine
 * @var $spavace_sobe || number Broj spavacih soba
 * @var $kupatila || number Broj kupatila
 * @var $velicina || number Velicina nekretnine u m2
 * @var $sprat || number Broj spratova ukoliko je rijec o kuci ili sprat na kojem je smjesten stan, apartman, soba isl.
 * @var $godina_gradnje || number Godina izgradnje nekretnine
 * @var $garazna_mjesta || number Broj garaznih ili parking mjesta
 */
public function podaci_o_apartmanu($post_id) {

	$custom = get_post_custom($post_id);
	$slajder = $custom['slajder'][0];
	$status = $custom['status'][0];
	$od = $custom['od'][0];
	$do = $custom['do'][0];
	$cijena = $custom['cijena'][0];
	$grad = $custom['grad'][0];
	$adresa = $custom['adresa'][0];
	$spavace_sobe = $custom['spavace_sobe'][0];
	$kupatila = $custom['kupatila'][0];
	$velicina = $custom['velicina'][0];
	$sprat = $custom['sprat'][0];
	$garazna_mjesta = $custom['garazna_mjesta'][0];

	// Ukoliko vrijednost za status nije postavljena tretiraj kao slobodan
	if (!$status) { $status = 'slobodan'; }

	// Ukoliko je vrijednost za slajder nije postavljena tretiraj kao false
	if (!$slajder) { $slajder = 'false'; }

	 ?>
	<table class="form-table">
		<tbody>
			<colgroup>
				<col span="1" style="width: 20%;">
				<col span="1" style="width: 40%;">
				<col span="1" style="width: 40%;">
			</colgroup>
			<tr>
				<th scope="row">
					<label for="status">
						<?php echo __('Status:','exclusive-apartments-status'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Koji je trenutni status apartmana ?','exclusive-apartments-status-info'); ?>
				</td>
				<td>

					<select name="status" id="status" class="ulaz">

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

				</td>
			</tr>
			<tr id="raspon" style="<?php if($status == 'slobodan'): echo 'display: none'; endif; ?>">
			<th scope="row">
				<label for="izdano-od-do">
					<?php echo __('Iznajmljeno ili rezervisano:','exclusive-apartments-od-do'); ?>
				</label>
			</th>
			<td>
				<?php echo __('Ukoliko je apartman iznajmljen ili rezervisan unijeti datum od kada do kada.','exclusive-apartments-od-do-info'); ?>
			</td>
			<td>
				<label for="od">
					<?php echo __('Od:','exclusive-apartments-od'); ?>
				</label>
				<input type="date" name="od" value="<?php echo $od; ?>" class="ulaz">
				<label for="do">
					<?php echo __('Do:','exclusive-apartments-do'); ?>
				</label>
				<input type="date" name="do" value="<?php echo $do; ?>" class="ulaz">
			</td>
		</tr>
		</tr>
			<tr>
				<th scope="row">
					<label for="slajder">
						<?php echo __('Slajder:','exclusive-apartments-slajder'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Postavite nekretninu u slajder ?','exclusive-apartments-slajder-info'); ?>
				</td>
				<td>
					<input type="radio" name="slajder" value="true" <?php checked( $slajder, 'true' ); ?>/>
					<?php echo __('Da','exclusive-apartments-slajder-da'); ?>

					&nbsp;&nbsp;&nbsp;&nbsp;

					<input type="radio" name="slajder" value="false" <?php checked( $slajder, 'false' ); ?>/>
					<?php echo __('Ne','exclusive-apartments-slajder-ne'); ?>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="cijena">
						<?php echo __('Cijena:','exclusive-apartments-cijena'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Unesite cijenu apartmana, ako ostavite prazno polje onda ce cijena biti po dogovoru.','exclusive-apartments-cijena-info'); ?>
				</td>
				<td>
					<input type="number" name="cijena" value="<?php echo $cijena; ?>" class="ulaz">
				</td>
			</tr>
			<tr>
				<th class="naslov-sekcije" colspan="3">Lokacija</th>
			</tr>
			<tr>
				<th scope="row">
					<label for="grad">
						<?php echo __('Grad:','exclusive-apartments-grad'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Grad u kojem se nalazi nekretnina.','exclusive-apartments-grad-info'); ?>
				</td>
				<td>
					<input type="text" name="grad" value="<?php echo $grad; ?>" class="ulaz">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="adresa">
						<?php echo __('Adresa:','exclusive-apartments-adresa'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Tačna adresa apartmana.','exclusive-apartments-adresa-info'); ?>
				</td>
				<td>
					<input type="text" name="adresa" value="<?php echo $adresa; ?>" class="ulaz">
				</td>
			</tr>
			<tr>
				<th class="naslov-sekcije" colspan="3">Dodatne Informacije</th>
			</tr>
			<tr>
				<th scope="row">
					<label for="velicina">
						<?php echo __('Velicina:','exclusive-apartments-velicina'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Koja je tačna kvadratura apartmana ?','exclusive-apartments-velicina-info'); ?>
				</td>
				<td>
					<input type="number" name="velicina" value="<?php echo $velicina; ?>" class="ulaz">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="spavace_sobe">
						<?php echo __('Spavace Sobe:','exclusive-apartments-sobe'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Broj spavaćih soba.','exclusive-apartments-sobe-info'); ?>
				</td>
				<td>
					<input type="number" name="spavace_sobe" value="<?php echo $spavace_sobe; ?>" class="ulaz">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="kupatila">
						<?php echo __('Kupatila:','exclusive-apartments-kupatila'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Broj kupatila.','exclusive-apartments-kupatila-info'); ?>
				</td>
				<td>
					<input type="number" name="kupatila" value="<?php echo $kupatila; ?>" class="ulaz">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="sprat">
						<?php echo __('Sprat:','exclusive-apartments-sprat'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Sprat na kojem je smješten apartman.','exclusive-apartments-sprat-info'); ?>
				</td>
				<td>
					<input type="number" name="sprat" value="<?php echo $sprat; ?>" class="ulaz">
				</td>
			</tr>
				<tr>
				<th scope="row">
					<label for="garazna_mjesta">
						<?php echo __('Garazna Mjesta:','exclusive-apartments-garazna'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Broj garažnih ili parking mjesta.','exclusive-apartments-garazna-info'); ?>
				</td>
				<td>
					<input type="number" name="garazna_mjesta" value="<?php echo $garazna_mjesta; ?>" class="ulaz">
				</td>
			</tr>
		</tbody>
	</table>

	<?php

 }

/**
 * Spremi podatke o apartmanu u bazu podataka
 *
 * @see https://codex.wordpress.org/Function_Reference/update_post_meta
 * @see https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 * @uses update_post_meta($post_id, $meta_key, $meta_value, $prev_value);
 * @method void spremi_podatke_o_apartmanu()
 * @param int $post_id The post ID.
 * @access public

 */
 public function spremi_podatke_o_apartmanu($post_id) {

	 // Check user access
	 if ( !current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

	// - Update the post's metadata.

	update_post_meta($post_id, 'slajder', $_POST['slajder']);
	update_post_meta($post_id, 'status', $_POST['status']);

	if ($_POST['status'] != 'slobodan') {

		update_post_meta($post_id, 'od', $_POST['od']);
		update_post_meta($post_id, 'do', $_POST['do']);

	} else {

		update_post_meta($post_id, 'od', '');
		update_post_meta($post_id, 'do', '');

	}

	update_post_meta($post_id, 'cijena', $_POST['cijena']);
	update_post_meta($post_id, 'grad', $_POST['grad']);
	update_post_meta($post_id, 'adresa', $_POST['adresa']);
	update_post_meta($post_id, 'spavace_sobe', $_POST['spavace_sobe']);
	update_post_meta($post_id, 'kupatila', $_POST['kupatila']);
	update_post_meta($post_id, 'velicina', $_POST['velicina']);
	update_post_meta($post_id, 'sprat', $_POST['sprat']);
	update_post_meta($post_id, 'godina_gradnje', $_POST['godina_gradnje']);
	update_post_meta($post_id, 'garazna_mjesta', $_POST['garazna_mjesta']);

 }


}
