let friendlist = $('div._55wp._7om2._5pxa._8yo0')

// button._54k8._52jg._56bs._26vk._3cqr._8yzo._8yo0._56bt

// Xóa bạn bè không có bạn chung
$('div._55wp._7om2._5pxa._8yo0').each(function(){
    let localUser = $(this).find('div.notice.ellipsis').text()
    let button = $(this).find('button._54k8._52jg._56bs._26vk._3cqr._8yzo._8yo0._56bt')
    if (localUser.search('bạn chung')==-1){
        console.log('Xóa bạn',$(this).find('h3._52jh._5pxc._8yo0').text())
        button.click();
        $(this).find('a._54k8._55i1._58a0.touchable')[1].click()
    }
})

// accet friend
var soLuongXacNhan = $('button._54k8._52jg._56bs._26vk._56b_._3cqr._5uc2._8yo0._56bu')
let i = 0;
let run = setInterval(function(){
    soLuongXacNhan[i].click()
    i++;
    if(i == soLuongXacNhan.length){
        clearInterval(run)
    }
},400)