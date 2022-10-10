'use strict'
{
  const token = document.querySelector('main').dataset.token;
  const input = document.querySelector('[name="title"]');
  const ul = document.querySelector('ul');
  input.focus();


  function addTodo(id, titleValue) {
    const li = document.createElement('li');
    li.dataset.id = id;
    const title = document.createElement('span');
    title.textContent = titleValue + 'の登録に成功しました';

    li.appendChild(title);
    ul.insertBefore(li,ul.firstChild);
    input.remove();
  }

  document.querySelector('form').addEventListener('submit', e => {
    e.preventDefault();

    const title = input.value;
    const url = "?action=add";
    const options = {
      method: 'POST',
      body: new URLSearchParams({
        title: title,
        token: token,
      })
    };
    fetch(url, options)
      .then(response => {
        return response.json();
      })
      .then(json => {
        addTodo(json.id, title);
      });

    // input.value = "";
    // input.focus();
  });


}
