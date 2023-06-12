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
}

cards.forEach((card, index) => {
  card.ondragstart = onDragStart;
  card.ondragend = onDragEnd;
})