// pages/my_info/my_info.js
const app = getApp()

Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    address: '',
    userinfo: {}
  },
  onLoad: function () {

    //获取用户信息
    this.getUserInfo()

  },
  /**
   * 选择位置
   */
  getLocation: function () {
    var that = this;

    wx.chooseLocation({
      success: function (res) {
        if (res.address) {

          that.setData({
            address: res.address
          })

        }
      }
    })
  },
  /**
   * 头像
   */
  getPhoto: function () {
    let that = this;

    wx.chooseImage({
      success: function (res) {

        //临时文件地址
        let tmpFilePath = res.tempFilePaths

        //保存到属性中
        that.tmpFilePath = tmpFilePath

      }
    })

  },
  /**
   * 表单提交
   */
  onSubmit: function (e) {
    //openid
    let openid = wx.getStorageSync('openid');

    //保存用户信息
    if (this.tmpFilePath) { //选择头像

      wx.uploadFile({
        url: app.globalData.localhost + 'api/register.php', //仅为示例，非真实的接口地址
        filePath: this.tmpFilePath[0],
        name: 'file',
        formData: {
          ...e.detail.value,
          openid
        },
        success(res) {
          const data = res.data

          if (data == 'success') {

            wx.showToast({
              title: '注册成功',
              success: function () {

                setTimeout(() => {

                  //注册成功自动返回
                  wx.navigateBack({
                    delta: 1
                  })

                }, 2000)

              }
            })

          } else {
            console.log(data)
          }

        }
      })

    } else { //没有选择头像

      wx.request({
        url: app.globalData.localhost + 'api/register.php',
        data:{
          ...e.detail.value,
          openid
        },
        success(res) {
          const data = res.data

          if (data == 'success') {

            wx.showToast({
              title: '注册成功',
              success: function () {

                setTimeout(() => {

                  //注册成功自动返回
                  wx.navigateBack({
                    delta: 1
                  })

                }, 2000)

              }
            })

          } else {
            console.log(data)
          }

        }
      })

    }

  },
  /**
   * 获取当前用户信息
   */
  getUserInfo: function () {

    //taht
    var that = this;

    //openid
    let openid = wx.getStorageSync('openid');

    if (openid) {

      wx.request({
        url: app.globalData.localhost + 'api/getUserInfo.php',
        data: {
          openid
        },
        success: function (res) {

          if (res.data.id) { //已注册
            that.setData({
              userinfo: res.data,
              address: res.data.address
            })
          }
        }
      })

    }

  }

})