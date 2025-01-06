const shuffleButton = document.getElementById('shuffleButton');
const checkOrderButton = document.getElementById('checkOrderButton');
const imagesContainer = document.getElementById('rainbowImages');
const resultMessage = document.getElementById('resultMessage');

shuffleButton.addEventListener('click', () => {
    const images = Array.from(imagesContainer.children);
    
    // Mélanger les images
    images.sort(() => Math.random() - 0.5);
    
    // Réafficher les images dans le nouvel ordre
    images.forEach(image => imagesContainer.appendChild(image));
});

// Gérer le drag and drop
let draggedImage = null;

imagesContainer.addEventListener('dragstart', (event) => {
    draggedImage = event.target;
    setTimeout(() => {
        event.target.classList.add('dragging');
    }, 0);
});

imagesContainer.addEventListener('dragend', (event) => {
    event.target.classList.remove('dragging');
});

imagesContainer.addEventListener('dragover', (event) => {
    event.preventDefault(); // Nécessaire pour permettre le drop
});

imagesContainer.addEventListener('drop', (event) => {
    event.preventDefault();
    if (event.target.classList.contains('rainbow')) {
        const images = Array.from(imagesContainer.children);
        const draggedIndex = images.indexOf(draggedImage);
        const targetIndex = images.indexOf(event.target);
        
        // Échange des images
        if (draggedIndex !== targetIndex) {
            imagesContainer.insertBefore(draggedImage, targetIndex < draggedIndex ? event.target : event.target.nextSibling);
        }
    }
});

// Vérifier l'ordre des images
checkOrderButton.addEventListener('click', () => {
    const images = document.querySelectorAll('.rainbow');
    let isCorrect = true;

    images.forEach((image, index) => {
        if (parseInt(image.dataset.order) !== index + 1) {
            isCorrect = false;
        }
    });

    if (isCorrect) {
        resultMessage.innerText = "Vous avez gagné";
        resultMessage.style.color = 'green';
    } else {
        resultMessage.innerText = "Vous avez perdu";
        resultMessage.style.color = 'red';
    }
});
