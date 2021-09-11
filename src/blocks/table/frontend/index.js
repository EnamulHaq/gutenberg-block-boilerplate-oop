import { PREFIX } from '../../../utils/config';

const starterClass = `wp-block-${ PREFIX }`;

/**
 * Handle functionality related to the starter block block.
 *
 * @author BoomDevs
 * @since  2.0.0
 */
const mctbBlocks = {
    /**
     * Initial mctb block setup.
     *
     * @author BoomDevs
     * @since  2.0.0
     * @return {?boolean} Return false if no the starter block found.
     */
    init: () => {
        // Target starter block elements.
        const starter = document.querySelectorAll(`.${ starterClass }`);

        // Exit if no the starter block found.
        if (!starter.length) {
            return false;
        }
    },
};

export default mctbBlocks;
