const messages = document.getElementById('messages');
const chatForm = document.forms.chatForm;

const printMsgs = (arr, container) => {
  let html = '';

  for (let item of arr) {
    html += `
      <article class="message">
        <p><small>${item.datetime}</small></p>
        <p><b>${item.author}</b></p>
        <p>${item.message}</p>
      </article>`;
  }

  container.innerHTML = html;
};

const getMsgs = () => {
  let xhr = new XMLHttpRequest();
  xhr.open('GET', '/get_msgs.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState !== 4) return;
  
    if (xhr.status !== 200) {
      console.error(xhr.status + ': ' + xhr.statusText);
    } else {
      let jsonResponse = JSON.parse(xhr.responseText);
      console.log(jsonResponse);
      printMsgs(jsonResponse.data, messages);
    }
  }
  xhr.send();
};

const submitChatForm = e => {
  e.preventDefault();

  let author = e.target.author.value.trim();
  let message = e.target.message.value.trim();

  if (!author && !message) return;

  // let formData = new FormData(chatForm);
  let body = `author=${encodeURIComponent(author)}&message=${encodeURIComponent(message)}`;

  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'post_msg.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send(body);

  e.target.message.value = '';
};

chatForm.addEventListener('submit', submitChatForm);

getMsgs();
setInterval(getMsgs, 2000);
