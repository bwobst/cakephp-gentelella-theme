// From https://jonathanmh.com/make-grunt-watch-for-lesscss-changes/

module.exports = function(grunt) {
	grunt.initConfig({
		// running `grunt less` will compile once
		less: {
			development: {
				options: {
					paths: ["./webroot/css"],
					yuicompress: true
				},
			files: {
				"./webroot/build/css/custom.css": "./webroot/css/less/custom.less"
			}
		}
	},
	// running `grunt watch` will watch for changes
	watch: {
		files: "./webroot/css/less/*.less",
		tasks: ["less"]
	}
});
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
};
