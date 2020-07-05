//index.js
//获取应用实例
const app = getApp()

Page({
  data: {
   source:app.globalData.source,
    indicatorDots:true,
    autoplay:true,
    imgUrl: [app.globalData.source + 'images/swiper1.jpg', app.globalData.source + 'images/swiper1.jpg', app.globalData.source + 'images/swiper1.jpg']
  },
  
})
