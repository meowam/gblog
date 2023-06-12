const rows = document.querySelectorAll('.rows');
const colors = ['rgb(255, 127, 127)', 'rgb(255, 191, 127)', 'rgb(255, 255, 127)', 'rgb(191, 255, 127)', 'rgb(127, 255, 127)'];

const onDragOver = (event) => {
  event.preventDefault();
}

const onDrop = (event) => {
  event.preventDefault();
  const draggedCardId = event.dataTransfer.getData('id');
  const draggedCard = document.getElementById(draggedCardId);
  event.target.appendChild(draggedCard);
}

rows.forEach((rows, index) => {
  const label = rows.querySelector('.label');
  label.style.backgroundColor = colors[index];
  rows.ondragover = onDragOver;
  rows.ondrop = onDrop;
})