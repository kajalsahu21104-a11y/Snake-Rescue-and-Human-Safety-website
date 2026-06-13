function showImagePreview(img) {
  const imagePreview = document.getElementById('imagePreview');
  imagePreview.src = img.src;
}

function showVideoPreview(video) {
  const videoPreview = document.getElementById('videoPreview');
  const source = video.querySelector('source');
  videoPreview.src = source.src;
  videoPreview.load();
  videoPreview.play();
}
