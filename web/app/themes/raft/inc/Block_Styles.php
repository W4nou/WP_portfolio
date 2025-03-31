<?php
/**
 * Block Styles Handler.
 *
 * @author Themeisle
 * @package raft
 * @since 1.0.0
 */

namespace Raft;

/**
 * Class Block_Styles
 *
 * @package raft
 */
class Block_Styles {
	/**
	 * Block styles.
	 *
	 * @var \array[][] | void
	 */
	private $styles;

	/**
	 * Block Styles constructor.
	 */
	public function __construct() {
		// Initialisez $this->styles comme un tableau vide pour éviter les erreurs
		$this->styles = array();
		
		// Notez les priorités différentes (9 et 10)
		add_action('init', array($this, 'setup_styles'), 9); // Exécuter en premier
		add_action('init', array($this, 'add_block_styles'), 10); // Exécuter ensuite
	}
	
	public function setup_styles() {
		$this->styles = array(
			'core/categories' => array(
				array(
					'name'  => 'raft-pills',
					'label' => esc_html__('Pills', 'raft'),
				),
			),
		);
	}
	/**
	 * Add the block styles.
	 *
	 * @return void
	 */
	public function add_block_styles() {
		foreach ( $this->styles as $block => $styles ) {
			foreach ( $styles as $block_style ) {
				register_block_style( $block, $block_style );
			}
		}
	}
}
