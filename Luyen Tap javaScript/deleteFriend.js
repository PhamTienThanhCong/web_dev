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

// delete back groud
var a = $('div._5s61._2b4m._8yo0')
for (let i = 0 ; i< a.length ; i++){
    a[i].innerHTML = '<a class="darkTouch" href="/profile.php?id=100012236171109&amp;ref=bookmarks"><i class="img _1-yc profpic" aria-label="Phạm Huyền, profile picture" role="img" style="background:#d8dce6 url(\'https\\3a //scontent.fhan3-1.fna.fbcdn.net/v/t1.6435-1/cp0/e15/q65/p100x100/124015117_1125467694537759_828783156781957919_n.jpg?_nc_cat\\3d 102\\26 ccb\\3d 1-5\\26 _nc_sid\\3d dbb9e7\\26 efg\\3d eyJpIjoidCJ9\\26 _nc_ohc\\3d WfhR2dUObbsAX8aL6Lp\\26 _nc_ht\\3d scontent.fhan3-1.fna\\26 oh\\3d 00_AT_UAsqBf611xYISOD2lJZcNosdekphsplvn_M_5j6Yb3Q\\26 oe\\3d 61F17EA3\') no-repeat center;background-size:100% 100%;-webkit-background-size:100% 100%;width:92px;height:92px" data-sigil="touchable"></i></a>'
}

// save file fplay listen

var a = $('a#video-title.yt-simple-endpoint.style-scope.ytd-playlist-video-renderer')
var names = [];
var links = [];
for (let i = 0; i < a.length; i++){
    var n = (a[i].text).trim();
    n = n.replace(/\n/g, '');
    names.push(n);
    var b = a[i].getAttribute('href').split('=');
    links.push(b[1]);
}
console.log(names);
console.log(links);