class Header {
	constructor() {
		this.testVariable = 'script header working';
		this.init();
	}

	init() {
		// for tests purposes only
		// eslint-disable-next-line no-console
		console.log(this.testVariable);
	}
}

export default Header;
