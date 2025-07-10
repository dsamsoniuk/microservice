const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  filenameHashing: true,
  devServer: {
    port: "8080",
    proxy: {
      '/api-login': {
        // target: 'http://nginx:80',
        target: 'http://localhost:80',
        changeOrigin: true,
        pathRewrite: { '^/api-login': '/' } 
      },
      '/api-product': {
        target: 'http://localhost:8000',
        changeOrigin: true,
        pathRewrite: { '^/api-product': '/api' } 
      },
    }
  }
})
