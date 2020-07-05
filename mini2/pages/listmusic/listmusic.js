// pages/listmusic/listmusic.js
const app = getApp()

Page({


  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    tabList: ['中文经典', '英文歌', 'KTV必点歌', '儿歌', '存音乐', '网络红歌', '情歌对唱','DJ劲歌','影视金曲'],
  active:0
  },
  btnItem:function(e){
    this.setData({
      active:e.currentTarget.dataset.index,
    })
  }

  
  
})