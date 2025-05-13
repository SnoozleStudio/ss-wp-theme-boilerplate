import General from './_generalScripts';
import Header from './_header';

const App = {
	/**
	 * App.init
	 */
	init() {
		// General scripts
		function initGeneral() {
			return new General();
		}
		initGeneral();

		// Header scripts
		function initHeader() {
			return new Header();
		}
		initHeader();
	},
};

document.addEventListener('DOMContentLoaded', () => {
	App.init();
});
