<?php

class BD_Mctb {

	/**
	 * Enqueue Gutenberg block assets for both frontend + backend.
	 *
	 * Assets enqueued:
	 * 1. blocks.style.build.css - Frontend + Backend.
	 * 2. blocks.build.js - Backend.
	 * 3. blocks.editor.build.css - Backend.
	 *
	 * @uses {wp-blocks} for block type registration & related functions.
	 * @uses {wp-element} for WP Element abstraction — structure of blocks.
	 * @uses {wp-i18n} to internationalize the block's text.
	 * @uses {wp-editor} for WP editor styles.
	 * @since 1.0.0
	 */
	function gutenberg_block_register() {
		// Register blocks with WordPress.
		register_block_type(
			'multipurpose-compression-table/starter',
			[
				'editor_script' => 'wdsblocks-editor-script',
				'editor_style'  => 'wdsblocks-editor-style',
				'style'         => 'wdsblocks-style',
			]
		);

	}

	function register_gutenberg_block_category($categories, $post) {
		return array_merge(
			$categories,
			[
				[
					'slug'  => 'bdpct-blocks',
					'title' => esc_html__( 'BDPCT Blocks', 'bdpct' ),
				],
			]
		);
	}
}
