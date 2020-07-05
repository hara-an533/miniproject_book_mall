// pages/mycomment/mycomment.js
const app = getApp();
Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    title:'',
    starUrl:[]
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

    let props = JSON.parse(options.props)

    this.props = props

    this.setData({
      title:props.title
    })

    //星星
    this.handleStar(4)

  },
  handleStar:function(star){

    let tmpArr = []

    for(let i=0;i<5;i++){

      if (i<=star){
        tmpArr.push(this.data.source+'ico/star.png')
      } else {
        tmpArr.push(this.data.source+'ico/star-gray.png')
      }

    }

    //保存到属性中
    this.star = star+1;

    this.setData({
      starUrl:tmpArr
    })

  },
  /**
   * 选择星星
   */
  selectStar:function(e){

    //当前选择的星星数
    let currentSelect = parseInt(e.currentTarget.id)+1;

    //渲染
    this.handleStar(currentSelect-1);

  },
  /**
   * 获取评论内容
   */
  getNotes:function(e){

    this.notes = e.detail.value

  },
  /**
   * 保存评论
   */
  saveComment:function(){

    //产品信息
    let productInfo = this.props;

    //星星数
    let stars = this.star;

    //评论内容
    let notes = this.notes;

    //openid
    let openid = wx.getStorageSync('openid');

    if (openid){

      wx.request({
        url: app.globalData.localhost+'api/saveComment.php',
        data:{
          ...productInfo,
          stars,
          notes,
          openid
        },
        success:function(res){
          if(res.data == 'success'){
            wx.navigateBack({
              delta:1
            })
          }
        }
      })

    }

  }

})