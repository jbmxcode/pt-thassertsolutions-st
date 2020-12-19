const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const fs = require("fs"); 

const generateHtmlPlugins = (templateDir) => {
    const templateFiles = fs.readdirSync(path.resolve(__dirname, templateDir))
    return templateFiles.map(item => {
        const parts = item.split('.')
        const name = parts[0]
        const extension = parts[1]

        return new HtmlWebpackPlugin({
            filename: `${name}.html`,
            template: path.resolve(__dirname, `${templateDir}/${name}.${extension}`)
        })
    })
}

const htmlPlugins = generateHtmlPlugins('./src/html/views')

module.exports = {
    entry: {
        app: './src/js/app.js',
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: '[name].js'
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: [/node_modules\/(?!(swiper|dom7)\/).*/, /\.test\.jsx?$/],
                use: {
                    loader: 'babel-loader',
                    options: {
                        "presets": [
                            ["@babel/preset-env"]
                        ],
                        plugins: ["syntax-dynamic-import"]
                    }
                }
            },
            {
                test: /\.(handlebars|hbs)$/,
                // use: 'handlebars-loader',
                // exclude: /node_modules/
                use: [
                    {
                        loader: 'handlebars-loader',
                        options: {
                            name: '[name].[ext]'
                        }
                    }
                ],
                exclude: path.join(path.resolve(__dirname, 'src'), 'index.html')
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            comments: true
                        }
                    },
                    {
                        loader: "css-loader",
                    },
                    {
                        loader: "sass-loader"
                    },
                ]
            },
            {
                test: /\.(png|jpe?g|gif|svg)$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                        outputPath: 'images'
                        }
                    }
                ]
            },
            {
                test: /\.(woff|woff2|ttf|otf|eot)$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            outputPath: 'fonts'
                        }
                    }
                ]
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].css",            
            removeComments: false
        }),
        new CopyPlugin({
            patterns: [
                { from: './src/images', to: './images' },
            ],
        }),
    ].concat(htmlPlugins),
    devServer: {
        port: 9000,
        contentBase: path.join(__dirname, 'dist'),
        // open: true
    },
    devtool: 'none',
};