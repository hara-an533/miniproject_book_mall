// pages/mycomment/mycomment.js
const app = getApp();
Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    commentData:{},
    starUrl:[]
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

    //获取编辑内容
    let props = JSON.parse(options.props)

    this.props = props
    
    //渲染模板
    this.setData({
      commentData:props
    })

    //星星
    this.handleStar(props.stars-1)

    //默认评论内容
    this.notes = props.notes;

  },
  /**
   * 处理星星
   */
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
        url: app.globalData.localhost+'api/editComment.php',
        data:{
          ...productInfo,
          stars,
          notes,
          openid
        },
        success:function(res){
          // console.log(res.data)
          if(res.data == 'success'){

            //提前更新订单页（星星自定义组件）
            // let pages = getCurrentPages();
            // pages[1].getOrderData();

            wx.navigateBack({
              delta:1
            })
          }
        }
      })

    }

  }
})