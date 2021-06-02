define(function(require, exports, module) {

	var jQuery = $ = require('jquery');
	require.async('upload/own',function(a){
		a.func($("body"));
	});

});
