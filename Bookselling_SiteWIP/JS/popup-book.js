
function openmodal() {
const openmodal = document.querySelector('.open-button');
const modal = document.querySelector('#modal')
openmodal.addEventListener('click',()=> {
modal.showModal();
})

}


function closemodal() {
    const closemodal = document.querySelector('.close-button');
    const modal = document.querySelector('#modal')
    closemodal.addEventListener('click',()=> {
    modal.close();
    })
}