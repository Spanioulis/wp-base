const path = require('path');
var webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// change this variable to fit your project

const localDomain = 'http://localhost:8888/cee/';

// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

module.exports = {
   mode: 'development',
   entry: ['./assets/js/index.js', './assets/scss/frontend.scss'],
   output: {
      filename: './build/app.min.js',
      path: path.resolve(__dirname)
   },
   watch: true,
   devtool: 'source-map',
   module: {
      rules: [
         {
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
               loader: 'babel-loader',
               options: { presets: ['@babel/preset-env'] }
            }
         },
         {
            test: /\.(sass|css|scss)$/,
            use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
         },
         {
            test: /\.(png|jpg|jpeg|gif)$/,
            use: [
               {
                  loader: 'file-loader',
                  options: {
                     name: '[name].[ext]',
                     publicPath: './build/img',
                     emitFile: false
                  }
               }
            ]
         },
         {
            test: /\.(svg)$/,
            type: 'asset/resource',
            generator: {
               filename: './build/svg/[hash][ext][query]'
            }
         },
         {
            test: /\.(woff(2)?|ttf|eot)$/,
            type: 'asset/resource',
            generator: {
               filename: './build/fonts/[hash][ext][query]'
            }
         }
      ]
   },
   plugins: [
      new MiniCssExtractPlugin({
         filename: './build/frontend.min.css'
      }),
      new BrowserSyncPlugin(
         {
            proxy: localDomain,
            files: ['build/*.css', 'build/*.js'],
            injectCss: true
         },
         { reload: false }
      )
   ],
   optimization: {
      minimize: false
   }
};

new webpack.ProvidePlugin({
   $: 'jquery',
   jQuery: 'jquery'
});
