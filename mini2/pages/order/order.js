// pages/order/order.js
const app = getApp();
const helper = require('../../utils/helper')

Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    productInfo:[],
    userInfo:{}
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

    //获取购买内容
    this.getCartContent()

  },
  onShow:function(){

    //收货人信息
    this.getUser();
    
  },
  /**
   * 购物车内容
   */
  getCartContent:function(){

    //购物车数据
    let cart = wx.getStorageSync('cart');

    //总金额
    let totalPrice = helper.cartTotalPrice();


    //更新模板
    this.setData({
      productInfo:cart,
      totalPrice
    })

  },
  /**
   * 收件人信息
   */
  getUser:function(){

    var that = this;

    let openid = wx.getStorageSync('openid');

    if (openid){

      wx.request({
        url: app.globalData.localhost+'api/checkUser.php',
        data:{
          openid
        },
        success:function(res){
          if (res.data == 'fail'){

            //提示
             wx.showToast({
               title: '请完善信息，页面跳转中...',
               icon:'loading'
             })

            setTimeout(()=>{
              wx.navigateTo({
                url: '../my_info/my_info',
              })
            },2000)

          } else if (res.data == 'OPENID ERROR!'){

            wx.showToast({
              title: 'OPENID 有误！',
              icon:'none'
            })

          } else {

            that.setData({
              userInfo:res.data
            })

          }
        }
      })

    }

  },
  /**
   * 创建订单
   */
  createOrder:function(){

    //购物车
    let cart = wx.getStorageSync('cart');

    //openid
    let openid = wx.getStorageSync('openid');

    //网络请求
    if (openid && cart){

      wx.request({
        url: app.globalData.localhost+'api/createOrder.php',
        data:{
          cart:JSON.stringify(cart),
          openid
        },
        success:function(res){
  
          if (res.data == 'success'){ //创建成功

            //清除购物车
            wx.removeStorageSync('cart');

            //清除产品
            wx.removeStorageSync('product');
            
            //提示
            wx.showToast({
              title: '下单成功！',
            })

            //跳转到我的页面
            setTimeout(()=>{
              wx.reLaunch({
                url: '../my/my',
              })
            },2000)
            

          } else { //下单失败

            //提示
            wx.showToast({
              title: '下单失败！',
            })

          }
  
        }
      })

    }
    
  }

})