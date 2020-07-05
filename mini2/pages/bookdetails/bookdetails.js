// pages/bookdetails/bookdetails.js
const app = getApp()
const helper = require('../../utils/helper');

Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    indicatorDots: true,
    autoplay: true,
    imgUrl: [app.globalData.source + 'images/temp.jpg',
    app.globalData.source + 'images/swiper1.jpg',
    app.globalData.source + 'images/swiper1.jpg',
    ],
    Book:{},
    favoriteStatus:false,
    favorite1:app.globalData.host+'source/static/ico/addcollect.png',
    favorite2:app.globalData.host+'source/static/ico/addedcollect.png',
    currentCartCounts:0
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

    //产品ID
    let {id} = options;

    //id属性
    this.id = id;

    //获取图书详情
    this.getBookDetail()

    //获取购物车数量，并渲染
    this.cartCount()

  },
  /**
   * 图书详情
   */
  getBookDetail:function(){

    let that = this;

    wx.showLoading({
      title: '数据加载中',
    })

    if (this.id){

      wx.request({
        url: app.globalData.localhost+'api/getBookDetail.php',
        data:{
          id:this.id
        },
        success:function(res){

          if (res.data){

            //取消loading
            wx.hideLoading()
            
            //存储到缓存
            wx.setStorageSync('product', res.data)

            that.setData({
              Book:res.data,
              favoriteStatus:res.data.favoriteStatus
            })
          }

        }
      })

    }

  },
  /**
   * 收藏
   */
  favorite:function(){

    //this
    let that = this;

    //获取状态值
    let status = this.data.favoriteStatus ? 0 : 1;

    //c1id,c2id,pid
    let {c1id,c2id,id} = this.data.Book;

    //openid
    let openid = wx.getStorageSync('openid');

    //网络请求
    if (c1id && c2id && id && openid){
      console.log(status)
      wx.request({
        url: app.globalData.localhost+'api/setFavoriteStatus.php',
        data:{
          status,
          c1id,
          c2id,
          id,
          openid
        },
        success:function(res){
          console.log(res.data)
          if (res.data == 'success'){
            that.setData({
              favoriteStatus:!that.data.favoriteStatus
            },function(){

              if (that.data.favoriteStatus){
                wx.showToast({
                  title: '收藏成功',
                })
              } else {
                wx.showToast({
                  title: '取消收藏',
                })
              }

            })
          }
        }
      })

    }
    

  },
  /**
   * 查看作品（出版社）
   */
  moreWorks:function(e){

    //搜索词
    let keywords = e.currentTarget.id;

    //字段标记
    let tag = 'publicer';

    //c2id
    let c2id = wx.getStorageSync('product').c2id;

     //跳转到图书列表
     wx.navigateTo({
       url: '../listbook/listbook?tag=' + tag + '&keywords=' + keywords + '&c2id=' + c2id,
     })


  },
  /**
   * 加入购物车
   */
  addToCart:function(){

    // [{c1id:xxx,c2id:xxx,pid:xxxx,count:xxxx,title:xxx,poster:xxxx,price:xxxx},{}]

    //每次购买数量
    let count = 1;
    
    let {c1id,c2id,title,poster,price,id} = wx.getStorageSync('product')

    if(c1id && c2id && title && poster && price && id){

      //购物车中的产品数据结构
      let item = {c1id,c2id,title,poster,price,id,count}

      //加入购物车
      helper.addToCart(item);

      //更新购物车数量
      helper.countCart(this)

    }

  },
  /**
   * 获取购物车数量并渲染
   */
  cartCount:function(){

    helper.countCart(this)

  },
  /**
   * 跳转到首页
   */
  goToHome:function(){

    wx.switchTab({
      url: '../index/index',
    })

  },
  /**
   * 跳转到购物车
   */
  goToCart:function(){

    wx.reLaunch({
      url: '../cart/cart',
    })
    
  }

})