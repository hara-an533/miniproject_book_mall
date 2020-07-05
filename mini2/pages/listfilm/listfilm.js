// pages/listfilm/listfilm.js
//index.js
//获取应用实例
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    dataList:[
      "剧情",
      "喜剧",
      "动作",
      "爱情",
      "科幻",
      "动画",
      "悬疑",
      "惊悚",
      "犯罪",
      "同性",
      "传奇",
      "历史",
      "战争",
      "灾难"
    ],
    assList:[
      "中国大陆",
      "美国",
      "香港",
      "台湾",
      "日本",
      "加拿大"
    ],
    select:'3',
    selects:'1'
  },
  selected(e){
    this.setData({
      select : e.currentTarget.id,

    })
  },
  selecteds(e){
    this.setData({
      selects: e.currentTarget.id

    })
  }
})