//index.js
//获取应用实例
const app = getApp()
const helper = require('../../utils/helper')

Page({
  data: {
    source:app.globalData.source,
    indicatorDots:true,
    autoplay:true,
    imgUrl:[app.globalData.source+'images/swiper1.jpg',
      app.globalData.source + 'images/swiper1.jpg',
      app.globalData.source + 'images/swiper1.jpg'
      ],
    fastnewslist:[
      "啊实打实大苏打",
      "撒大苏打实打实大苏打",
      "asdasdasdasda"
    ],
    bookNavList:[
      {url:'../../static/ico/loading.gif'},
      {url:'../../static/ico/loading.gif'},
      {url:'../../static/ico/loading.gif'},
      {url:'../../static/ico/loading.gif'},
      {url:'../../static/ico/loading.gif'}
    ]
  },
  onLoad:function(option){

    //获取图书二级分类
    this.getBookNav()

    //获取五星图书第一名
    this.getBookStarNo1()

  },
  onShow:function(){

    
    if (wx.getStorageSync('cart')){

      let count = helper.countCart(this);
      
      if(count >0){
        //更新tabBar
        wx.setTabBarBadge({
          index: 2,
          text: count.toString()
        })
      }
      
    }
   
  },
  /**
   * 图书二级分类
   */
  getBookNav:function(){

    let that = this;

    wx.request({
      url: app.globalData.localhost+'api/getBookNav.php',
      success:function(res){
        if (res.data.length>0){

          //更新并渲染
          that.setData({
            bookNavList:res.data
          })
        }
      }
    })

  },
  /**
   * 跳转列表
   */
  goGoBookList:function(e){

    //获取分类ID
    let c2id = e.currentTarget.dataset.c2id;
    
    //跳转页面
    if (c2id){
      wx.navigateTo({
        url: '../listbook/listbook?c2id='+c2id,
      })
    }

  },
  /**
   * 五星图书第一名
   */
  getBookStarNo1:function(){

    wx.request({
      url: app.globalData.localhost+'api/getStarNo1.php',
      success:function(res){

        console.log(res.data);
        
      }
    })

  }
})
