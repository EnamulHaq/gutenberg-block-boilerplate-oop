import edit from './edit';
import save from './save';
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { PREFIX } from '../../utils/config';
import './frontend/style.scss';
/**
 * Register block type definition.
 *
 * @author BoomDevs
 * @since  2.0.0
 * @see    https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
registerBlockType(`${ PREFIX }/table`, {
    title: __('MCTB Table', 'mctb'),
    description: __(
        'A Ecommerce product listing table.',
        'mctb'
    ),
    icon: 'editor-table',
    category: 'bdpct-blocks',
    attributes: {
        showPreview: {
            type: 'boolean',
            default: true,
        },
        align: {
            type: 'string',
            default: 'full',
        },
        title: {
            type: 'array',
            source: 'children',
            selector: 'h2',
        },
        contentStyle: {
            type: 'object',
            default: {
                color: '#000000',
                textAlign: 'left',
            },
        },
        backgroundStyle: {
            type: 'object',
            default: {
                backgroundColor: 'transparent',
            },
        },
    },
    supports: {
        align: ['full', 'wide', 'left', 'center', 'right'],
        anchor: true,
        html: false,
    },
    example: {
        attributes: {
            backgroundStyle: {
                backgroundColor: '#40403F',
            },
            contentStyle: {
                color: '#F47C48',
                textAlign: 'center',
            },
            title: __('MCTB Table', 'mctb'),
        },
    },
    edit,
    save,
});
