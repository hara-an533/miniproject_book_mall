// pages/listbook/listbook.js

const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    source: app.globalData.source,
    list:[],
    currentab:0,
    show:0,
    navDataList:[],
    hasData:true
  },
 
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

    //接收要加载的分类的ID
    let {c2id,tag,keywords} = options;
    this.c2id = c2id;
    this.tag = tag ? tag: '';
    this.keywords = keywords ? keywords : '';

    //导航
    this.handleNav(c2id)

    //当前分类数据
    this.getCurrentData(c2id)

  },
  /**
   *  导航
   */
  handleNav:function(c2id=''){

    var that = this;
    wx.request({
      url: app.globalData.localhost+'api/getBookNav.php',
      success:function(res){
        if (res.data.length>0){

          //三项
          let tmpArr = [{id:777,c2name:'热销图书'},{id:888,c2name:'9.9包邮'},{id:999,c2name:'新书上架'}]
          let lastList = res.data.concat(tmpArr)

          lastList = lastList.map((item) =>{

            //来源
            that.c2id = c2id ? c2id :that.c2id; 

            if (that.c2id == item.id){
              item.active = 'navactive'
            } else {
              item.active = ''
            }

            return item;

          })

          //更新并渲染
          that.setData({
            list:lastList
          })
        }
      }
    })

  },
    //切换分类
  check(e){
    //获取点击的分类
    let currentC2id=e.currentTarget.id;
    if(currentC2id){

      //清除keywords
      this.keywords = '';
      this.tag = '';

      //赋值c2id给属性
      this.c2id = currentC2id

      //切换分类导航
      this.handleNav(currentC2id)

      //清空分类数据
      this.setData({
        navDataList:[]
      })

      //获取分类数据
      this.getCurrentData(currentC2id)
    }
  },
  /**
   * 获取当前分类数据
   * 
   */
  getCurrentData:function(c2id){

    var that = this;

    //loading...
    wx.showLoading({
      title: '数据加载中',
    })

    if (c2id){

      //获取已有数据长度
      let start = this.data.navDataList.length;

      wx.request({
        url: app.globalData.localhost + 'api/getCurrentData.php',
        data:{
          tag:'book',
          c2id,
          start,
          keywords:this.keywords,
          columnName:this.tag
        },
        success:function(res){

          //hideloading
          wx.hideLoading()

          //拼接新老数据
          let lastData = that.data.navDataList.concat(res.data);

          if (res.data.length>0){
            that.setData({
              navDataList:lastData,
              hasData:true
            })
          } else {

            //获取当前总的数据,判断该分类下是否有数据
            if (that.data.navDataList.length >0){
              that.setData({
                hasData:true
              })
            } else {
              that.setData({
                hasData:false
              })
            }
          }
        }
      })

    }

  },
  /**
   * 监听触底
   */
  onReachBottom:function(){

    this.getCurrentData(this.c2id)

  },
  /**
   * 监听下来刷新
   */
  onPullDownRefresh:function(){

    //清空数据
    this.setData({
      navDataList:[]
    },()=>{

      //获取分类数据
      this.getCurrentData(this.c2id)

    })

    
  },
  /**
   * 跳转到详情页
   */
  goToBookDetail:function(e){

    //产品ID
    let id = e.currentTarget.id;
    
    //跳转
    if (id){
      wx.navigateTo({
        url: '../bookdetails/bookdetails?id='+id,
      })
    }

  }



  
})