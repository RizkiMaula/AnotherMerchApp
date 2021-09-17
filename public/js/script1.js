function previewImg1() {
    const cover = document.querySelector('#img')
    // const coverLabel = document.querySelector('.custom-file-label')
    const imgPreview = document.querySelector('.img-preview')

    // coverLabel.textContent = cover.files[0].name

    const fileCover = new FileReader()
    fileCover.readAsDataURL(cover.files[0])

    fileCover.onload = function(e) {
        imgPreview.src = e.target.result
    }
}