const cards = document.querySelectorAll('.card_heroes');
const addCard = document.querySelector('#addCard');

/* Add Card Logic */

const addCardToBank = (event) => {
  const card_heroes = createCard();
  const bank = document.querySelector('#bank');
  bank.appendChild(card_heroes);
}

addCard.onclick = addCardToBank;

/* Card Logic */
const createCard = () => {
  const card = document.createElement('div');
  card.classList.add('card_heroes');
  card.setAttribute('draggable', 'true');
  card.id = Date.now();
  card.ondragstart = onDragStart;
  card.ondragend = onDragEnd;
  card.onclick = deleteCard;
  appendImage(card);
  return card;
}

const appendImage = (card) => {
  const input = document.createElement('input');
  input.setAttribute('type', 'file');
  input.setAttribute('accept', 'image/x-png,image/gif,image/jpeg,image/webp');
  input.style.visibility = 'hidden';
  input.onchange = () => {
    const image = new Image(100, 95);
    const file = input.files[0];
    // console.log(file);
    
    const reader = new FileReader();
    reader.onload = (event) => {
      image.src = event.target.result;
      image.style.pointerEvents = 'none';
      card.appendChild(image);
    }
    reader.readAsDataURL(file);
  }
  input.click();
}

const deleteCard = (event) => {
  const willDeleteCard = window.confirm('Ви хочете видалити даного персонажа з тірліста?');
  if (willDeleteCard) {
    event.target.remove();
  }
}

const onDragStart = (event) => {
  console.log('dragging the element');
  event.dataTransfer.setData('id', event.target.id);
  setTimeout(() => {
    event.target.style.visibility = 'hidden';
  }, 50)
}

const onDragEnd = (event) => {
  event.target.style.visibility = 'visible';
  // console.log('ended the drag');
}

cards.forEach((card, index) => {
  card.ondragstart = onDragStart;
  card.ondragend = onDragEnd;
})