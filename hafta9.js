const duyuruPenceresi = document.getElementById('duyuruPenceresi');

function pencereyiGoster() {
  duyuruPenceresi.classList.add('goster');
}

function pencereyiKapat() {
  duyuruPenceresi.classList.remove('goster');
  duyuruPenceresi.classList.add('gizle');
}

window.onload = () => {
  pencereyiGoster();
  setTimeout(() => {
    pencereyiKapat();
  }, 5000); 
};
