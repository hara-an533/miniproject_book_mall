const helper = {

  //加入购物车
  addToCart(item){

    //是否有购物车
    if (wx.getStorageSync('cart')){ //已经有购物车

      //判断当前购物车中是否有该产品
      let cart = wx.getStorageSync('cart');
      let hasItem = false;

      if (cart.length>0){

        for(let i=0;i<cart.length;i++){

          if (cart[i].c2id == item.c2id && cart[i].id== item.id){ //有该产品,数量+1
            hasItem = true;
            cart[i].count++;
          }
        }

        //没有该产品，则存入
        if(!hasItem){
          cart.push(item);
        }

      } else { //有购物没有产品

        cart.push(item);

      }

       //更新缓存
       wx.setStorageSync('cart', cart)

    } else { //没有创建购物车

      //空购物车
      let cart = [];

      //放入购物车
      cart.push(item)
    
      //创建缓存
      wx.setStorageSync('cart', cart)
    }

    //提示：已加入购物车
    wx.showToast({
      title: '已加入购物车！',
    })

  },
  //计算购物车数量，并渲染
  countCart:function(that){

    if (wx.getStorageSync('cart')){

      let count = wx.getStorageSync('cart').length;

      //更新模板
      that.setData({
        currentCartCounts:count
      })

      //返回数量
      return count;

    }

  },
  //计算购物车总价格
  cartTotalPrice:function(){

    let totalPrice = 0;

    let cart = wx.getStorageSync('cart')

    if (cart){

      for(let i=0;i<cart.length;i++){

        //单价
        let price = cart[i].price;

        //数量
        let count = cart[i].count;

        //小计
        let sum = price*count;

        //总计
        totalPrice += sum;

      }

    }

    //返回总价
    return totalPrice.toFixed(2);

  },
  //购物车数量增减
  option:function(index,action,that){

    //获取到购物车数据
    let cart = wx.getStorageSync('cart');

    //操作
    if (action == 'add'){ //增加
      cart[index].count++;
    }

    if (action == 'sub'){ //减少

      //1.提示删除
      if(cart[index].count == 1){

        wx.showModal({
          title: '提示',
          content: '确定要删除吗？',
          success (res) {
            if (res.confirm) {

              //删除动作
              helper.option(index,'del',that);

              //2.购物车中没有数据，则显示无产品
              let currentCount = helper.countCart(that)
              if (currentCount == 0){

                //更新hasCart
                that.setData({
                  hasCart:false
                })
                //更新tabBar
                that.setTabBar()

              }

            } else if (res.cancel) {
              console.log('用户点击取消')
            }
          }
        })
        

      } else {
        cart[index].count--;
      }

    }

    if (action == 'del'){ //直接删除
      cart.splice(index,1);
    }

    //更新缓存
    wx.setStorageSync('cart', cart)

    //购物车中没有数据，则显示无产品
    let currentCount = helper.countCart(that)
    if (currentCount == 0){
      that.setData({
        hasCart:false
      },function(){

            //更新tabBar
          that.setTabBar()

      })
    }

    //更新总价,渲染模板
    let totalPrice = this.cartTotalPrice();
    that.setData({
      totalPrice,
      cartData:cart
    })
   
    //更新tabBar
    that.setTabBar()

  }

}

module.exports = helper;