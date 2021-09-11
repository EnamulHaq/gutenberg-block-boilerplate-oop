import {
	RichText,
	BlockControls,
	useBlockProps,
	InnerBlocks,  RichTextToolbarButton
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import ImportTable from "./importTable/ImportTable";
import { INNER_BLOCKS_PROPS } from './utils/config';
import { TextControl } from '@wordpress/components';
import './editor.scss';

export default function Edit( props ) {
	const {
		attributes: {
			title,
			message,
			showModal,
		},
		setAttributes,
	} = props;
	const onChangeTitle = ( newTitle ) => {
		setAttributes( {
			title: newTitle,
		} );
	};
	const testFun = () => {
		setAttributes({showModal: !showModal})
		console.log("Hello world")
	}
	console.log(props.attributes.message);
	return (
		<>
			{showModal ?(
				<ImportTable />
			):null}
			<BlockControls>
				<button className="mctb-table-import-button" onClick={testFun}>
					<span className="dashicons dashicons-editor-table"/>
					Import Table
				</button>
				<RichTextToolbarButton/>
			</BlockControls>
			<div { ...useBlockProps() }>
				<TextControl
					label={ __( 'Message', 'gutenpride' ) }
					onChange={ ( val ) => setAttributes( { message: val } ) }
				/>
			</div>
			<div className={`mctb__table_container`}>
				<table>
					<tr>
						<th><InnerBlocks /></th>
						<th>
							<RichText
								className="block-title"
								tagName="h2"
								formattingControls={ [] }
								onChange={ onChangeTitle }
								placeholder={ __( 'Block Title', 'mctb' ) }
								keepPlaceholderOnFocus={ true }
								value={ title }
							/>
						</th>
					</tr>
					<tr>
						<td>Enamul</td>
						<td>22</td>
					</tr>
				</table>
			</div>

			{/*	{ ...INNER_BLOCKS_PROPS }*/}
			{/*	__experimentalTagName={ 'div' }*/}
			{/*	__experimentalPassedProps={ {*/}
			{/*		className: 'inner-blocks',*/}
			{/*	} }*/}
			{/*	renderAppender={ false }*/}
			{/*/>*/}
			{/*<RichText*/}
			{/*	className="block-title"*/}
			{/*	tagName="h2"*/}
			{/*	formattingControls={ [] }*/}
			{/*	onChange={ onChangeTitle }*/}
			{/*	placeholder={ __( 'Block Title', 'mctb' ) }*/}
			{/*	keepPlaceholderOnFocus={ true }*/}
			{/*	value={ title }*/}
			{/*/>*/}
		</>
	);
}
