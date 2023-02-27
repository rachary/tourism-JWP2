// v-focus after mounted
// --add to main.js--
// createApp(App).use(directives)
export default {
	install(app) {
		app.directive('focus', {
			mounted (el) {
			  if (el instanceof HTMLDivElement) {
				const component = el.querySelector('input, textarea')
				if ((component instanceof HTMLInputElement) || (component instanceof HTMLTextAreaElement)) {
				  component.focus()
				}
				HTMLTextAreaElement
			  } else {
				el.focus()
			  }
			},
		  });
	},
};