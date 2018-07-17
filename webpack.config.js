var Encore = require('@symfony/webpack-encore');
var webpack = require('webpack');
var glob = require("glob");

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    .addEntry('js/app', './assets/js/app.js')
    .addEntry('js/jquery.justifiedGallery', './assets/js/jquery.justifiedGallery.js')
    // uncomment to define the assets of the project
    .addStyleEntry('css/app', './assets/css/app.scss')
    .addStyleEntry('css/grayscale', './assets/css/grayscale.scss')

    .addEntry('img', glob.sync('./assets/img/*'))

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
