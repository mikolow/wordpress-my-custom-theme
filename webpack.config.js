// const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncWebpackPlugin = require('browser-sync-webpack-plugin');

module.exports = function (env) {

    console.log(`webpack in ${env.mode} mode`);

    const config = {
        // entry: "./src/js/app.js",
        entry: {
            'dist/main.js': './src/js/main.js',
            'dist/main': './src/scss/main.scss',
            'dist/editor-style': './src/scss/editor-styles.scss'
        },
        output: {
            // filename: "bundle.min.js",
            // path: path.resolve(__dirname, './'),
            filename: "[name]",
            path: __dirname
        },
        mode: env.mode,
        devtool: env.mode === 'development' ? "source-map" : false,

        plugins: [
            // new MiniCssExtractPlugin({
            //     filename: 'style.css'
            // }),
            new MiniCssExtractPlugin(),
        ],

        module: {
            rules: [
                {
                    test: /\.(jpe?g|png|gif|svg)$/i,
                    type: 'asset/resource',
                    generator: {
                        filename: 'dist/images/[name][ext]',
                    },
                },
                {
                    test: /\.(woff(2)?|ttf|otf|eot)(\?v=\d+\.\d+\.\d+)?$/,
                    type: 'asset/resource',
                    generator: {
                        filename: 'dist/fonts/[name][ext]',
                    },
                },
                {
                    test: /\.m?js$/i,
                    exclude: /(node_modules|bower_components)/,
                    use: [
                        {
                            loader: "babel-loader",
                            options: {
                                presets: ["@babel/preset-env"],
                                plugins: [
                                    ["@babel/transform-runtime"]
                                ]
                            }
                        },
                    ]
                },
                {
                    test: /\.css$/i,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader'
                    ]
                },
                {
                    test: /\.s[ac]ss$/i,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader',
                        {
                            loader: "postcss-loader",
                            options: {
                                postcssOptions: {
                                    plugins: [
                                        ['autoprefixer']
                                    ]
                                }
                            }
                        },
                        {
                            loader: 'sass-loader',
                        }
                    ]
                }
            ]
        },
    }

    if ( env.mode === 'development' ) {
        if ( env.bs ) {
            config.plugins.unshift(new BrowserSyncWebpackPlugin({
                files: "**/*.php",
                port: 3000,
                // proxy: "http://localhost",
                proxy: "http://electrum.local",
            }))
        }
    }
    return config;
}