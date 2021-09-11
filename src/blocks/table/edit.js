import {
	RichText,
	BlockControls
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import ImportTable from "./importTable/ImportTable";
import './editor.scss';

export default function Edit( props ) {
	const {
		attributes: {
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
			</BlockControls>
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
