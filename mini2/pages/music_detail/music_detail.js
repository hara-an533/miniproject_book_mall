// pages/media/media.js
const app = getApp()

Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    indicatorDots: true,
    autoplay: true,
    videoSrc: '',
    poster: '',
    playState: false,
    audioTitle: '',
    audioAuthor: '',
    audioTime: '00:00',
    audioBtn_play: app.globalData.source+'ico/btn_play.png',
    audioBtn_pause: app.globalData.source +'ico/btn_pause.png',
    xiazai: app.globalData.source +'ico/download.png',
    bofnag: app.globalData.source + 'ico/play.png',
    shouchang: app.globalData.source + 'ico/collect.png',
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

    //创建音频实例
    this.myAudio = wx.createInnerAudioContext()

    //默认播放的音频
    this.initAudio()

    //后台音频实例
    this.backgroundAudioManager = wx.getBackgroundAudioManager()

  },
  

  
 
  /**
   * 默认的音频
   */
  initAudio: function () {

    //音频信息
    this.setData({
      poster: 'https://bkimg.cdn.bcebos.com/pic/574e9258d109b3de0ecaddd8c4bf6c81800a4c0c?x-bce-process=image/crop,x_0,y_46,w_1024,h_676/watermark,g_7,image_d2F0ZXIvYmFpa2UxMTY=,xp_5,yp_5',
      audioTitle: '记事本',
      audioAuthor: '陈慧琳',
    })

    //音频资源的地址
    this.myAudio.src = 'https://www.fuhushi.com/source/music/classic/m4.mp3'

    //自动播放
    this.myAudio.autoplay = false;

    //监听
    this.myAudio.onPlay(() => {

      console.log('音频开始播放...')

    })


  },
  /**
   * 播放剩余时间
   */
  leftTime: function () {

    //音频的长度
    if (!this.totalTime) {
      this.totalTime = parseInt(this.myAudio.duration);
    }

    //当前音频的播放位置
    let currentTime = parseInt(this.myAudio.currentTime);

    //剩余时间(秒)
    let leftedTime = this.totalTime - currentTime;

    //剩余分钟
    let leftMinuts = parseInt(leftedTime / 60);

    //剩余秒
    let leftSeconds = leftedTime % 60;

    //补0
    leftMinuts = leftMinuts < 10 ? '0' + leftMinuts : leftMinuts
    leftSeconds = leftSeconds < 10 ? '0' + leftSeconds : leftSeconds

    //渲染到模板
    this.setData({
      audioTime: leftMinuts + ':' + leftSeconds
    })
  },
  /**
   * 播放
   */
  playAudio: function () {

    console.log('播放')

    this.myAudio.play()

    //计算剩余时间(每秒计算一次)//////////////////
    this.clock = setInterval(() => {
      this.leftTime()
    }, 1000)

    this.setData({
      playState: true
    })

  },
  /**
   * 暂停
   */
  pauseAudio: function () {

    console.log('暂停')

    this.myAudio.pause()

    this.setData({
      playState: false
    })
  }
 

})