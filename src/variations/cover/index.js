import { __ } from '@wordpress/i18n';
import icons from '../utils/icons';

/**
 * Register block variation.
 *
 * @author BoomDevs
 * @since  2.0.0
 * @see    https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
wp.blocks.registerBlockVariation( 'core/cover', {
	name: __( 'cta-cover', 'mctb' ),
	title: __( 'CTA Cover', 'mctb' ),
	attributes: {
		align: 'full',
		backgroundType: 'image',
		className: 'cta-cover',
		contentAlign: 'center',
		url: 'https://via.placeholder.com/1280x720.png/000/fff',
	},
	icon: icons.cta,
	innerBlocks: [
		[
			'core/heading',
			{
				className: 'hero-title has-text-align-center',
				placeholder: __( 'Add CTA Heading', 'mctb' ),
				level: 1,
			},
		],
		[
			'core/paragraph',
			{
				align: 'center',
				className: 'hero-content',
				placeholder: __( 'Add Optional Content', 'mctb' ),
			},
		],
		[
			'core/buttons',
			{
				align: 'center',
				className: 'is-content-justification-center',
			},
			[
				[
					'core/button',
					{
						className: 'hero-button is-style-outline',
						placeholder: __( 'Add Button label', 'mctb' ),
						textColor: 'white',
						url: '#',
						width: 75,
					},
				],
			],
		],
	],
} );
