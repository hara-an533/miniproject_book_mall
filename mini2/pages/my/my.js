// pages/my/my.js
const app = getApp()

Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    avatorUrl:'',
    nickName:'',
    bookData: [
      {photo: app.globalData.source+'images/demo.gif',
        bookname: '健康日历2019:丁香医生(团购....)',
        price: 44,
      price_dec: 56},
      {
        photo: app.globalData.source + 'images/demo.gif',
        bookname: '健康日历2019:丁香医生(团购....)',
        price: 44,
        price_dec: 56
      },
      {
        photo: app.globalData.source + 'images/demo.gif',
        bookname: '健康日历2019:丁香医生(团购....)',
        price: 44,
        price_dec: 56
      },
      {
        photo: app.globalData.source + 'images/demo.gif',
        bookname: '健康日历2019:丁香医生(团购....)',
        price: 44,
        price_dec: 56
      },
      {
        photo: app.globalData.source + 'images/demo.gif',
        bookname: '健康日历2019:丁香医生(团购....)',
        price: 44,
        price_dec: 56
      }
      , {
        photo: app.globalData.source + 'images/demo.gif',
        bookname: '健康日历2019:丁香医生(团购....)',
        price: 44,
        price_dec: 56
      }
      , {
        photo: app.globalData.source + 'images/demo.gif',
        bookname: '健康日历2019:丁香医生(团购....)',
        price: 44,
        price_dec: 56
      }
      , {
        photo: app.globalData.source + 'images/demo.gif',
        bookname: '健康日历2019:丁香医生(团购....)',
        price: 44,
        price_dec: 56
      }
      , {
        photo: app.globalData.source + 'images/demo.gif',
        bookname: '健康日历2019:丁香医生(团购....)',
        price: 44,
        price_dec: 56
      }
      ]

  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

    //清除tabBar
    this.handleTabBar()

  },
  onShow:function(){

    //获取用户信息
    this.getUserinfo()

  },
  /**
   * tabBar
   */
  handleTabBar:function(){

    let cart = wx.getStorageSync('cart');

    if (!cart){

      wx.removeTabBarBadge({
        index: 2,
      })

    }

  },
  /**
   * 用户信息
   */
  getUserinfo:function(){

    //that
    var that = this;

    //openid
    let openid = wx.getStorageSync('openid');

    //请求
    if (openid){

      wx.request({
        url: app.globalData.localhost+'api/getUserInfo.php',
        data:{
          openid
        },
        success:function(res){

          if (res.data == 'none' || res.data == 'error'){ //未注册
            wx.getUserInfo({
              success:function(res){
                that.setData({
                  avatorUrl:res.userInfo.avatarUrl,
                  nickName:res.userInfo.nickName
                })
              }
            })
          } else { //注册用户
            that.setData({
              avatorUrl:res.data.ico,
              nickName:res.data.name
            })
          }
        }
      })

    }

  },
  /**
   * 完善我的资料
   */
  myinfo:function(){

    wx.navigateTo({
      url: '../my_info/my_info',
    })

  },
  /**
   * 跳转到我的订单
   */
  goToMyOrder:function(){

    wx.navigateTo({
      url: '../myorder/myorder',
    })

  },
  /**
   * 我的评论列表
   */
  mycomment:function(){

    wx.navigateTo({
      url: '../mycomment_list/mycomment',
    })

  }

})