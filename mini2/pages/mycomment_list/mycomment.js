// pages/mycomment/mycomment.js
const app = getApp();
Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    DATA:[]
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

  },
  onShow:function(){

    //评论列表
    this.getCommentList()

  },
  /**
   * 我的评论
   */
  getCommentList:function(){

    //THIS
    var that = this;

    //openid
    let openid = wx.getStorageSync('openid');

    if (openid){

      wx.request({
        url: app.globalData.localhost+'api/getMyComment.php',
        data:{
          openid
        },
        success:function(res){

         that.setData({
           DATA:res.data
         })

        }
      })

    }

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
  /**
   * 删除评论
   */
  delComment:function(e){

    //that
    let that = this;
    
    //评论ID
    let id = e.currentTarget.dataset.cid

    //删除
    if (id){

      wx.request({
        url: app.globalData.localhost+'api/delComment.php?id='+id,
        success:function(res){
          
          if (res.data == 'success'){

            wx.showToast({
              title: '删除成功',
            })

            that.getCommentList()

          }

        }
      })

    }


  }

})