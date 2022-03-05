var video = $('span#text.style-scope.ytd-thumbnail-overlay-time-status-renderer').text()
video = video.replaceAll("\n","")
var a = video.split("  ")
var sum = 0
for (let i = 1 ; i < a.length ; i++){
    sum += parseInt(a[i].split(':')[0])
}
var hours = Math.floor(sum / 60);          
var minutes = sum % 60;
console.log("video: "+(a.length-1))
console.log(hours + "h" + minutes+"p")

// Cách dùng:
// Vào phần play list của ytb https://www.youtube.com/playlist?list= + API youtube
// tải đủ trang rồi dán code vào console