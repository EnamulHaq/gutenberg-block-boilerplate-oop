import { InnerBlocks, RichText } from '@wordpress/block-editor';
import { getBlockDefaultClassName } from '@wordpress/blocks';
import { PREFIX } from '../../utils/config';

export default function Save(props) {
    const {
        attributes: { title, contentStyle, backgroundStyle },
    } = props;
    const className = getBlockDefaultClassName(`${ PREFIX }/table`);
    return ( <div className = { `${ className } starter` } style = { backgroundStyle } >
        <RichText.Content className = "block-title"
        	style = { contentStyle }
        	tagName = "h2"
        	value = { title }/>
        </div>
    );
}
