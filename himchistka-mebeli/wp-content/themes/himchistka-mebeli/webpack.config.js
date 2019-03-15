let path = require('path');
let MiniCssExtractPlugin = require('mini-css-extract-plugin');
let webpack = require('webpack');
// let isDevMode = '';


// let config = 

// if mode development - eval sourcemap
module.exports = (env, options) => {
   let isProduction = options.mode === 'production';
   
   // isDevMode = options.mode;
   
   // let devMode = isProduction ? false : 'eval-sourcemap';
   
   return {
      entry: './src/index.js',
      output: {
         path: path.resolve(__dirname, './dist'),
         filename: 'js/main.js',
         publicPath: '/dist/',
         chunkFilename: 'js/plugins.bundle.js'
      },
      devServer: {
         overlay: true,
         contentBase: [
            path.join(__dirname, 'public')
         ],
         watchContentBase: true,
         publicPath: '/dist/',
         inline: true,
         hot: true
      },
      devtool: options.mode === 'production' ? false : 'eval-sourcemap',
      module: {
         rules: [
            {
               test: /\.js$/,
               exclude: /node_modules/,
               use: {
                  loader: 'babel-loader',
                  options: {
                     presets: ['@babel/preset-env'],
                     cacheDirectory: true,
                     cacheCompression: false
                  }
               }
            },
            {
               test: /\.sass$/,
               use: [
                  options.mode !== 'production' ? 'style-loader' : MiniCssExtractPlugin.loader,
                  // 'style-loader',
                  {
                     loader: 'css-loader',
                     options: {
                        url: false
                     }
                  },
                  'sass-loader'
               ]
            },
            {
               test: /\.css$/,
               use: [
                  options.mode !== 'production' ? 'style-loader' : MiniCssExtractPlugin.loader,
                  // 'style-loader',
                  {
                     loader: 'css-loader',
                     options: {
                        url: false
                     }
                  }
               ]
            }
            // {
            //   test: /\.html$/,
            //   use: [
            //     'file-loader?name=[name].[ext]', 
            //     'extract-loader', 
            //     'html-loader'
            //   ]
            // },
            // {
            //   test: /\.(png|jpg|gif)$/,
            //   use: [
            //     {
            //       loader: 'file-loader',
            //       options: {
            //         outputPath: 'img',
            //         name: '[name].[ext]'
            //       },
            //     }
            //   ]
            // }
         ]
      },
      plugins: [
         new MiniCssExtractPlugin({
            filename: 'css/[name].css',
            chunkFilename: 'css/plugins.bundle.css'
         }),
         new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
         })
      ],
      optimization: {
         splitChunks: {
            automaticNameDelimiter: '.',
            chunks: 'all'
            // cacheGroups: {
            //   // vendors: {
            //   //   test: /\.js$/,
            //   //   filename: 'plugins.bundle.js',
            //   //   chunks: 'all'
            //   // }
            //   commons: {
            //     test: /[\\/]node_modules[\\/]/,
            //     name: 'plugins.bundle',
            //     chunks: 'all'
            //   }
         }
      }
   };
}; 
