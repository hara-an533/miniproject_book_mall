const app = getApp()
const helper = require('../../utils/helper')

Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    totalPrice:0,
    count:1,
    hasCart:true,
    cartData:[]
  },
  onLoad:function(){
    // console.log(222222)
  },
  onShow:function(){

    //更新tabBar
    this.setTabBar()

    //获取购物车数据
    this.getCartData()


  },
  /**
   * 购物车数据
   */
  getCartData:function(){

    //loading
    wx.showLoading({
      title: '数据加载中',
    })

    //是否有购物车
    if (wx.getStorageSync('cart')){

      // 取消loading
      wx.hideLoading()

      //获取购物车数量
      let cartCount = helper.countCart(this)

      if (cartCount>0){ //有购物车，数量大于0
          //获取购物车数据
          let cart = wx.getStorageSync('cart');

          //购物车总金额
          let totalPrice = helper.cartTotalPrice();
        
          this.setData({
            hasCart:true,
            cartData:cart,
            totalPrice
          })
      } else { //有购物车，数量0
        this.setData({
          hasCart:false
        })
      }
     

    } else {
      // 取消loading
      wx.hideLoading()

      this.setData({
        hasCart:false
      })
    }
  },
  /**
   * 增加数量
   */
  add:function(e){

    //当前所有值
    let index = e.currentTarget.id
    
    //小助手
    helper.option(index,'add',this)

  },
  /**
   * 减少数量
   */
  minus:function(e){
    //当前所有值
    let index = e.currentTarget.id
        
    //小助手
    helper.option(index,'sub',this)
  },
  /**
   * 直接删除
   */
  del:function(e){
     //当前所有值
     let index = e.currentTarget.id
        
     //小助手
     helper.option(index,'del',this)
  },
  /**
   * 更新tabBar数量
   */
  setTabBar:function(){

    if (wx.getStorageSync('cart')){

      let count = helper.countCart(this);

      //更新tabBar
      if (count>0){
        wx.setTabBarBadge({
          index: 2,
          text: count.toString()
        })
      }

      //购物车为空时，清除掉tabBar
      if (count == 0){
        wx.removeTabBarBadge({
          index: 2,
        })
      }
      
    }

  },
  /**
   * 创建订单
   */
  createOrder:function(){

    wx.navigateTo({
      url: '../order/order',
    })

  }
})