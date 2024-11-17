var index = 0;
function setIndex(id){
    console.log(index);
    index = id;
    console.log(index);
    chayImgs();
}
// Chạy slider
function chayImgs(){
    var imgs = ['banner1.jpg','banner2.jpg','banner3.jpg'];
    document.getElementById('img').src = './assets/imgs/'+imgs[index];
    console.log(index);
    chayNutChuyen(index);
    index++;
    if(index==3) {
        index = 0;
    }
}

// Nút chuyển slider
const nuts = document.getElementsByClassName("nut");
function chayNutChuyen(index){
    console.log(nuts[index]);
    const nutActive = document.querySelector('.active');
    nutActive.classList.remove("active");
    console.log(nutActive);
    nuts[index].classList.add("active");
}
setInterval(chayImgs,2000)