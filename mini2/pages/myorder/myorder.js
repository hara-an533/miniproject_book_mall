const app = getApp()

Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    hasData:true,
    orderData:[]
  },
  onLoad:function(){

    //loading
    wx.showLoading({
      title: '数据加载中',
    })
  },
  onShow:function(){

    //获取我的订单数据
    this.getOrderData()
    
  },
  /**
   * 我的订单数据
   */
  getOrderData:function(){

    //openid
    let openid = wx.getStorageSync('openid')

    //this
    var that = this;


    if (openid){
      wx.request({
        url: app.globalData.localhost+'api/getMyOrder.php',
        data:{
          openid
        },success:function(res){
         
          //hideloading
          wx.hideLoading()

          if (res.data.length==0){
            that.setData({
              hasData:false
            })
          } else if (res.data == 'error'){
            wx.showToast({
              title: 'OPENID缺省',
            })
          } else if (res.data[0]){

            console.log(res.data)
            
            

            // star.setStar(res.data.comment.stars)

            that.setData({
              hasData:true,
              orderData:res.data
            })

          } else {

          }
        }
      })
    }
    

  },
  /**
   * 发表评论
   */
  sendComment:function(e){

    //获取属性
    let property = e.currentTarget.dataset;

    wx.navigateTo({
      url: '../mycomment_send/mycomment?props='+JSON.stringify(property),
    })

  },
  /**
   * 编辑评论
   */
  editComment:function(e){

    //获取属性
    let property = e.currentTarget.dataset;

    //跳转到编辑页面
    wx.navigateTo({
      url: '../mycomment_edit/mycomment?props='+JSON.stringify(property),
    })
  },
  getChild:function(){


    const star = this.selectComponent('.star');
    console.log(star);

  }


})