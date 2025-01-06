const board = document.getElementById('gameBoard');
const resultMessage = document.getElementById('resultMessage');
const restartButton = document.getElementById('restartButton');

let tiles = [];
let emptyTileIndex = 8; // Index de la case vide (9ème case)

function initBoard() {
    tiles = [...Array(8).keys()].map(i => i + 1); // Crée un tableau [1, 2, ..., 8]
    tiles.push(null); // Ajoute la case vide
    shuffleTiles();
    renderBoard();
}

function shuffleTiles() {
    for (let i = tiles.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [tiles[i], tiles[j]] = [tiles[j], tiles[i]];
    }
}

function renderBoard() {
    board.innerHTML = '';
    tiles.forEach((tile, index) => {
        const tileElement = document.createElement('div');
        tileElement.classList.add('tile');
        
        // Chemin relatif vers les images
        tileElement.style.backgroundImage = tile ? `url('taquin/${tile}.png')` : 'none';
        tileElement.dataset.index = index;

        if (tile) {
            tileElement.addEventListener('click', () => moveTile(index));
        }

        board.appendChild(tileElement);
    });
}

function moveTile(index) {
    const adjacentIndices = getAdjacentIndices(emptyTileIndex);
    if (adjacentIndices.includes(index)) {
        tiles[emptyTileIndex] = tiles[index];
        tiles[index] = null;
        emptyTileIndex = index;
        renderBoard();
        checkWin();
    }
}

function getAdjacentIndices(index) {
    const row = Math.floor(index / 3);
    const col = index % 3;
    const indices = [];

    if (row > 0) indices.push(index - 3); // Case du dessus
    if (row < 2) indices.push(index + 3); // Case du dessous
    if (col > 0) indices.push(index - 1); // Case de gauche
    if (col < 2) indices.push(index + 1); // Case de droite

    return indices;
}

function checkWin() {
    if (tiles.slice(0, 8).every((tile, index) => tile === index + 1)) {
        resultMessage.innerText = "Vous avez gagné !";
        resultMessage.style.color = 'green';
        restartButton.style.display = 'block';
    }
}

restartButton.addEventListener('click', () => {
    resultMessage.innerText = '';
    restartButton.style.display = 'none';
    initBoard();
});

// Initialisation du jeu
initBoard();
