
class General {
	constructor() {
		this.testVariable = 'script working';
		this.init();
	}

	init() {
		// for tests purposes only
		// eslint-disable-next-line no-console
		console.log(this.testVariable);
	}
}

export default General;
