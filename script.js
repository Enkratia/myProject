const urlField = document.querySelector(".url-input input"),
  previewArea = document.querySelector(".preview-area"),
  imgTag = previewArea.querySelector(".thumbnail"),
  hiddenInput = document.querySelector(".hidden-input");

urlField.onkeyup = () => {
  let imgURL = urlField.value;
  previewArea.classList.add("active");


  if (imgURL.indexOf("https://www.youtube.com/watch?v=") != -1) {
    let vidId = imgURL.split("v=")[1].substring(0, 11);
    let ytThumbnailUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
    imgTag.src = ytThumbnailUrl;
  }
  else if (imgURL.indexOf("https://youtu.be/") != -1) {
    let vidId = imgURL.split("be/")[1].substring(0, 11);
    let ytThumbnailUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
    imgTag.src = ytThumbnailUrl;
  }
  else if (imgURL.match(/\.(jpeg|png|gif|bmp|webp)$/i) != -1) {
    imgTag.src = imgURL;
  } else {
    imgTag.src = "";
    previewArea.classList.remove("active");
  }

  hiddenInput.value = imgTag.src;
}

