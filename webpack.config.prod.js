const path = require('path');
var webpack = require('webpack');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
<<<<<<< HEAD
=======
const TerserPlugin = require("terser-webpack-plugin");
>>>>>>> 17a52e645aa8599c646fe47e6a23db86bcc05836

module.exports = {
    mode: "production",
    entry: ['./assets/js/index.js', './assets/scss/frontend.scss'],
    output: {
        filename: './build/app.min.js',
        path: path.resolve(__dirname)
    },
    watch: true,
    module: {
        rules: [
            {
                test: /\.js$/, exclude: /node_modules/,
                use: {
                    loader: "babel-loader", 
                    options: { presets: ['@babel/preset-env'] } 
                }
            },
            {
                test: /\.(sass|css|scss)$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader']
            },
            {
                test: /\.(png|jpg|jpeg|gif)$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            name: "[name].[ext]",
                            publicPath: "./build/img",
                            emitFile: false
                        }
                    }
                ]
            },
            {
                test: /\.(svg)$/,
                type: 'asset/resource',
                generator: {
                    filename: './build/svg/[hash][ext][query]',
                },
            },
            {
<<<<<<< HEAD
                test: /\.(woff(2)?|ttf|eot)$/,
=======
                test: /\.(woff(2)?|ttf|eot|otf)$/,
>>>>>>> 17a52e645aa8599c646fe47e6a23db86bcc05836
                type: 'asset/resource',
                generator: {
                    filename: './build/fonts/[hash][ext][query]',
                },
            },
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: './build/frontend.min.css' 
        }),
    ],
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin(),
            `...`, // webpack@5 feature: extend existing minimizers (i.e. `terser-webpack-plugin`)
            new CssMinimizerPlugin(),
        ]
    }
};

new webpack.ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
<<<<<<< HEAD
});
=======
});
>>>>>>> 17a52e645aa8599c646fe47e6a23db86bcc05836
