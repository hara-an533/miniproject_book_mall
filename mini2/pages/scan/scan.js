
const app = getApp()

Page({

  /**
   * 页面的初始数据
   */
  data: {
    source:app.globalData.source
  },
  /**
   * 扫码
   */
  scan:function(){

    wx.scanCode({
      success:function(res){
        if (res.result){

          wx.request({
            url: app.globalData.localhost+'api/scan.php',
            data:{
              code:res.result
            },
            success:function(res){

              if (res.data.status == 200 ){

                wx.navigateTo({
                  url: '../bookdetails/bookdetails?id='+res.data.id,
                })

              }

            }
          })

        }
      }
    })

  }

})