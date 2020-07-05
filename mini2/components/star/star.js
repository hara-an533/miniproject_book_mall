// components/star/star.js
const app = getApp();
Component({
  /**
   * 组件的属性列表
   */
  properties: {
    nums:Number
  },

  /**
   * 组件的初始数据
   */
  data: {
    starList:[],
    source: app.globalData.source,
  },
  observers:{
    "nums":function(value1){
      console.log(value1)
      this.setStar()
    }
  },
  lifetimes:{

    attached:function(){

      this.setStar()

    }

  },
  pageLifetimes:{

    show:function(){

      this.setStar()

    }
  },

  /**
   * 组件的方法列表
   */
  methods: {
    setStar:function(nums=''){

        //初始化
        let tempArr= [];

        //星星数
        let starNums = this.properties.nums ? this.properties.nums : nums;
  
        //循环5次获取5个星星
        for(let i=1;i<6;i++){
  
          //红星地址
          let redStar = app.globalData.source + 'ico/star.png';
  
          //灰星地址
          let grayStar = app.globalData.source + 'ico/star-gray.png';
  
          //存入临时数组
          if (i <= starNums){
            tempArr.push(redStar);
          } else {
            tempArr.push(grayStar);
          }
          
  
        }
  
        //更新data
        this.setData({
          starList: tempArr
        })

    }
  }
})
