import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.min.js';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import { Modal } from 'bootstrap';
import { Toast } from 'bootstrap';
import { Popover } from 'bootstrap';
import '../sass/styles.scss';

const cards = document.querySelectorAll('.card');
let currentIndex = 0;

function openModal(element) {
    const card = element.closest('.card');
    currentIndex = Array.from(cards).indexOf(card);
    updateModalContent(currentIndex);

    const modalElement = document.getElementById('imageModal');
    if (modalElement) {
        const modal = new Modal(modalElement);
        modal.show();

        document.addEventListener('keydown', handleKeydown);

        const modalDescription = document.getElementById('imageDescription');
        const popover1 = new Popover(modalDescription, {
            trigger: 'hover',
            content: "Интересный факт из википедии",
            placement: 'right'
        });
    }
}

function updateModalContent(index) {
    const card = cards[index];
    const title = card.querySelector('.card-title').textContent;
    const description = card.querySelector('.modal-text').textContent;
    const imageUrl = card.querySelector('.card-img-top').getAttribute('src');

    document.getElementById('imageModalLabel').textContent = title;
    document.getElementById('modalImage').src = imageUrl;
    document.getElementById('imageDescription').textContent = description;
}

function handleKeydown(event) {
    const totalCards = cards.length;
    if (event.key == 'ArrowRight') {
        currentIndex = (currentIndex + 1) % totalCards;
        updateModalContent(currentIndex);
    } else if (event.key == 'ArrowLeft') {
        currentIndex = (currentIndex - 1 + totalCards) % totalCards;
        updateModalContent(currentIndex);
    } else if (event.key == 'Escape') {
        const modalElement = document.getElementById('imageModal');
        const modal = Modal.getInstance(modalElement);
        modal.hide();
        document.removeEventListener('keydown', handleKeydown);
    }
}

window.openModal = openModal;

function showLoadingToast() {
    const toastElement = document.getElementById('loadingToast');
    const toast = new Toast(toastElement);
    toast.show();
}

document.getElementById('liveToastBtn').addEventListener('click', () => {
    showLoadingToast();
});
